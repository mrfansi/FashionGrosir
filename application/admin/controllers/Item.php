<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 11/03/2018
 * Time: 02.54
 */

class Item extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_m', 'item');
        $this->load->model('Item_qty_m', 'item_qty');
        $this->load->model('Item_detil_m', 'item_detil');
        $this->load->model('Item_kategori_m', 'item_kategori');
        $this->load->model('Kategori_m', 'kategori');
        $this->load->model('Seri_m', 'seri');
        $this->load->model('Ukuran_m', 'ukuran');
        $this->load->model('Warna_m', 'warna');


    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Item';
        $data->title_page = 'Item';

        $data->total_item = $this->item->count_rows();
        $data->items = $this->item->with_item_detil()->with_item_kategori()->get_all();
        $data->warna = function ($ide_kode, $w_kode) {
            return $this->warna->fields('w_nama')->with_item_detil('where:ide_kode = \'' . $ide_kode . '\'')->where_w_kode($w_kode)->get();
        };

        $data->ukuran = function ($ide_kode, $u_kode) {
            return $this->ukuran->fields('u_nama')->with_item_detil('where:ide_kode = \'' . $ide_kode . '\'')->where_u_kode($u_kode)->get();
        };

        $data->seri = function ($ide_kode, $s_kode) {
            return $this->seri->fields('s_nama')->with_item_detil('where:ide_kode = \'' . $ide_kode . '\'')->where_s_kode($s_kode)->get();
        };

        $data->qty = function ($ide_kode) {
            $hasil = 0;
            $stoks = $this->item_qty->fields('iq_qty')->with_item_detil('where:ide_kode = \'' . $ide_kode . '\'')->get_all();
            foreach ($stoks as $stok) {
                $hasil += $stok->iq_qty;
            }

            return $hasil;
        };

        $this->load->view('Item', $data);
    }

    public function by($kategori_kode)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Item';
        $data->title_page = 'Item';
        $data->total_item = $this->item->count_rows();
        $data->items = $this->item->select_sum_qty_where($kategori_kode);
        $this->load->view('Item', $data);
    }


    public function simpan()
    {
        // create object
        $data = new stdClass();

        // get guid form post
        $id = $this->input->post('id');
        $counter = (int)$this->input->post('counter');

        // get user from database where guid
        $item = $this->item->where_i_kode($id)->get();

        if ($item) {
            $item = $this->item->where_i_kode($id)->update(array(
                'i_nama' => $this->input->post('nama'),
                'i_hrg_vip' => $this->input->post('hrg_vip'),
                'i_hrg_reseller' => $this->input->post('hrg_reseller'),
                'i_deskripsi' => $this->input->post('deskripsi'),
            ));

            $item_kategori = $this->item_kategori->where_i_kode($id)->update(array(
                'k_kode' => $this->input->post('kategori'),
            ));
            if ($item && $item_kategori) {
                $data->berhasil = 'Data Item berhasil diperbarui.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('item');
            } else {
                $data->gagal = 'Data Item gagal diperbarui.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('item');
            }
        } else {
            $item = $this->item->insert(array(
                'i_kode' => $this->input->post('id'),
                'i_nama' => $this->input->post('nama'),
                'i_hrg_vip' => $this->input->post('hrg_vip'),
                'i_hrg_reseller' => $this->input->post('hrg_reseller'),
                'i_deskripsi' => $this->input->post('deskripsi'),
            ));


            foreach ($this->input->post('kategori') as $kategori) {
                $item_kategori = $this->item_kategori->insert(array(
                    'ik_kode' => $this->item_kategori->guid(),
                    'i_kode' => $this->input->post('id'),
                    'k_kode' => $kategori,
                ));
            }

            for ($i = 0; $i < $counter; $i++) {
                $id_detil = $this->item_detil->guid();
                $item_detil = $this->item_detil->insert(array(
                    'ide_kode' => $id_detil,
                    'i_kode' => $this->input->post('id'),
                    'w_kode' => $_POST['warna'][$i],
                    's_kode' => $_POST['seri'][$i],
                    'u_kode' => $_POST['ukuran'][$i],
                ));

                $item_qty = $this->item_qty->insert(array(
                    'iq_kode' => $this->item_qty->guid(),
                    'ide_kode' => $id_detil,
                    'iq_qty' => $_POST['qty'][$i]
                ));
            }


            if ($item && $item_kategori && $item_detil && $item_qty) {
                $data->berhasil = 'Data Item berhasil dibuat.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('item');
            } else {
                $data->gagal = 'Data Item gagal dibuat.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('item');
            }
        }
    }

    public function tambah()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Item > Tambah';
        $data->submit = 'Simpan';
        $data->kode = $this->item->guid();
        $this->load->view('CRUD_Item', $data);
    }

    public function tambah_qty($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Item > Tambah QTY';
        $data->submit = 'Tambah QTY';
        $data->kode = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->view('CRUD_Item_QTY', $data);
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $qty = $this->item_qty->insert(array(
                'iq_kode' => $this->item_qty->guid(),
                'iq_qty' => $this->input->post('qty'),
                'ide_kode' => $this->input->post('id')
            ));

            if ($qty) {
                $data->berhasil = 'Stok telah berhasil ditambahkan.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('item');
            } else {
                $data->gagal = 'Stok telah gagal ditambahkan.';
                $this->session->set_flashdata('berhasil', $data->gagal);

                redirect('item');
            }
        }

    }

    public function detil($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Item > Detil';
        $data->item = $this->item->where('p_kode', $id)->get();
        $this->load->view('CRUD_Item', $data);
    }

    public function ubah($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Item > Ubah';
        $data->submit = 'Ubah';
        $data->kode = $id;
        $data->item = $this->item->where('i_kode', $id)->get();

        $this->load->view('CRUD_Item', $data);
    }

    public function hapus($id)
    {
        $data = new stdClass();

        $item_detil = $this->item_detil->where('ide_kode', $id)->delete();
        if ($item_detil) {
            $data->berhasil = 'Data Item berhasil dihapus';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('item');
        } else {
            $data->gagal = 'Data Item gagal dihapus';
            $this->session->set_flashdata('berhasil', $data->gagal);

            redirect('item');
        }
    }

    public function hapus_item($id)
    {
        $data = new stdClass();

        $item = $this->item->where('i_kode', $id)->delete();
        if ($item) {
            $data->berhasil = 'Data Item berhasil dihapus';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('item');
        } else {
            $data->gagal = 'Data Item gagal dihapus';
            $this->session->set_flashdata('berhasil', $data->gagal);

            redirect('item');
        }
    }

}