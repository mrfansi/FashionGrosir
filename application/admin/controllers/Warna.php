<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Warna extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Warna_m', 'warna');
    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Warna';
        $data->title_page = 'Warna';
        $data->total_warna = $this->warna->count_rows();
        $data->warnas = $this->warna->get_all();
        $this->load->view('Warna', $data);
    }

    public function tambah()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Warna > Tambah';
        $data->submit = 'Simpan';
        $data->kode = $this->warna->guid();
        $this->load->view('CRUD_Warna', $data);
    }

    public function ubah($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Warna > Ubah';
        $data->submit = 'Ubah';
        $data->kode = $id;
        $data->warnas = $this->warna->where('w_kode', $id)->get();

        $this->load->view('CRUD_Warna', $data);
    }

    public function simpan()
    {
        // create object
        $data = new stdClass();

        // get guid form post
        $id = $this->input->post('id');

        // get user from database where guid
        $warna = $this->warna->where_w_kode($id)->get();

        if ($warna)
        {
            $warna = $this->warna->where_w_kode($id)->update(array(
                'w_nama'    => $this->input->post('nama'),
            ));
            if ($warna)
            {
                $data->berhasil = 'Data Warna berhasil diperbarui.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('warna');
            }
            else
            {
                $data->gagal = 'Data Warna gagal diperbarui.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('warna');
            }
        }
        else
        {
            $warna = $this->warna->insert(array(
                'w_kode'          => $this->input->post('id'),
                'w_nama'          => $this->input->post('nama'),
//                'created_by'      => $_SESSION['username'],
            ));
            if ($warna)
            {
                $data->berhasil = 'Data Warna berhasil dibuat.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('warna');
            }
            else
            {
                $data->gagal = 'Data Warna gagal dibuat.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('warna');
            }
        }
    }

    public  function hapus($id)
    {
        $data = new stdClass();

        $warna = $this->warna->where('w_kode', $id)->delete();
        if ($warna)
        {
            $data->berhasil = 'Data Warna berhasil dihapus';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('warna');
        }
        else
        {
            $data->gagal = 'Data Warna gagal dihapus';
            $this->session->set_flashdata('berhasil', $data->gagal);

            redirect('warna');
        }
    }

    public function get($item)
    {
        $data = new stdClass();
        $data->members = $this->warna->many_to_many_where($item);
        $this->load->view('Tabel_detil', $data);
    }
}