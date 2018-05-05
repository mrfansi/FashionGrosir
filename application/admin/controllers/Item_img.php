<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 11/03/2018
 * Time: 02.54
 */

class Item_img extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_img_m', 'item_img');
    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Foto';
        $data->title_page = 'Foto';
        $data->total_item_img = $this->item_img->count_rows();
        $data->item_imgs = $this->item_img->get_all();
        $this->load->view('Foto', $data);
    }


    public function simpan()
    {
        // create object
        $data = new stdClass();

        // get guid form post
        $id = $this->input->post('id');

        // get user from database where guid
        $item_img = $this->item_img->where_p_kode($id)->get();

        if ($item_img) {
            $item_img = $this->item_img->where_i_kode($id)->update(array(
                'ii_nama' => $this->input->post('nama'),
                'ii_url' => $this->input->post('url'),
            ));

            $item_img_kategori = $this->item_img_kategori->where_i_kode($id)->update(array(
                'k_kode' => $this->input->post('kategori'),
            ));
            if ($item_img && $item_img_kategori) {
                $data->berhasil = 'Data Foto berhasil diperbarui.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('item_img');
            } else {
                $data->gagal = 'Data Foto gagal diperbarui.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('item_img');
            }
        } else {
            $item_img = $this->item_img->insert(array(
                'i_kode' => $this->input->post('id'),
                'i_nama' => $this->input->post('nama'),
                'i_hrg_vip' => $this->input->post('harga_vip'),
                'i_hrg_reseller' => $this->input->post('harga_reseller'),
                'i_deskripsi' => $this->input->post('deskripsi'),
//                'created_by'      => $_SESSION['username'],
            ));

            $item_img_kategori = $this->item_img_kategori->insert(array(
                'item_img_kategori_kode' => $this->item_img_kategori->guid(),
                'i_kode' => $this->input->post('id'),
                'k_kode' => $this->input->post('kategori'),
            ));

            if ($item_img && $item_img_kategori) {
                $data->berhasil = 'Data Foto berhasil dibuat.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('item_img');
            } else {
                $data->gagal = 'Data Foto gagal dibuat.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('item_img');
            }
        }
    }

    public function tambah()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Foto > Tambah Foto';
        $data->submit = 'Simpan';
        $data->kode = $this->item_img->guid();
        $this->load->view('CRUD_Foto', $data);
    }

    public function detil($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Foto > Detil';
        $data->item_img = $this->item_img->where('p_kode', $id)->get();
        $this->load->view('CRUD_Foto', $data);
    }

    public function ubah($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Foto > Ubah';
        $data->submit = 'Ubah';
        $data->kode = $id;
        $data->item_img = $this->item_img->where('p_kode', $id)->get();

        $this->load->view('CRUD_Foto', $data);
    }

    public function hapus($id)
    {
        $data = new stdClass();

        $item_img = $this->item_img->where('p_kode', $id)->delete();
        if ($item_img) {
            $data->berhasil = 'Data Foto berhasil dihapus';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('item_img');
        } else {
            $data->gagal = 'Data Foto gagal dihapus';
            $this->session->set_flashdata('berhasil', $data->gagal);

            redirect('item_img');
        }
    }


}