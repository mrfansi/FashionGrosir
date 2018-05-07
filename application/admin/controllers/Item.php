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
        $this->load->model('Kategori_m', 'kategori');
        $this->load->model('Item_kategori_m', 'item_kategori');
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
        $data->items = $this->item->select_sum_qty();
        $this->load->view('Item', $data);
    }


    public function simpan()
    {
        // create object
        $data = new stdClass();

        // get guid form post
        $id = $this->input->post('id');

        // get user from database where guid
        $item = $this->item->where_p_kode($id)->get();

        if ($item) {
            $item = $this->item->where_i_kode($id)->update(array(
                'i_nama' => $this->input->post('nama'),
                'i_hrg_vip' => $this->input->post('harga_vip'),
                'i_hrg_reseller' => $this->input->post('harga_reseller'),
                'i_deskripsi' => $this->input->post('deskripsi'),
                'updated_by' => $_SESSION['username'],
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
                'i_hrg_vip' => $this->input->post('harga_vip'),
                'i_hrg_reseller' => $this->input->post('harga_reseller'),
                'i_deskripsi' => $this->input->post('deskripsi'),
//                'created_by'      => $_SESSION['username'],
            ));

            $item_kategori = $this->item_kategori->insert(array(
                'item_kategori_kode' => $this->item_kategori->guid(),
                'i_kode' => $this->input->post('id'),
                'k_kode' => $this->input->post('kategori'),
            ));

            if ($item && $item_kategori) {
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
                'is_kode' => $this->item_qty->guid(),
                'is_qty' => $this->input->post('qty'),
                'i_kode' => $this->input->post('id')
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
        $data->item = $this->item->where('p_kode', $id)->get();

        $this->load->view('CRUD_Item', $data);
    }

    public function hapus($id)
    {
        $data = new stdClass();

        $item = $this->item->where('p_kode', $id)->delete();
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