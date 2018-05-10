<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Ukuran extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ukuran_m', 'ukuran');
    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Ukuran';
        $data->title_page = 'Ukuran';
        $data->total_ukuran = $this->ukuran->count_rows();
        $data->ukurans = $this->ukuran->get_all();
        $this->load->view('Ukuran', $data);
    }

    public function tambah()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Ukuran > Tambah';
        $data->submit = 'Simpan';
        $data->kode = $this->ukuran->guid();
        $this->load->view('CRUD_Ukuran', $data);
    }

    public function ubah($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Pelanggan > Ubah';
        $data->submit = 'Ubah';
        $data->kode = $id;
        $data->ukurans = $this->ukuran->where('u_kode', $id)->get();

        $this->load->view('CRUD_Ukuran', $data);
    }

    public function simpan()
    {
        // create object
        $data = new stdClass();

        // get guid form post
        $id = $this->input->post('id');

        // get user from database where guid
        $ukuran = $this->ukuran->where_u_kode($id)->get();

        if ($ukuran)
        {
            $ukuran = $this->ukuran->where_u_kode($id)->update(array(
                'u_nama'    => $this->input->post('nama'),
                'updated_by'        => $_SESSION['username'],
            ));
            if ($ukuran)
            {
                $data->berhasil = 'Data Ukuran berhasil diperbarui.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('ukuran');
            }
            else
            {
                $data->gagal = 'Data Ukuran gagal diperbarui.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('ukuran');
            }
        }
        else
        {
            $ukuran = $this->ukuran->insert(array(
                'u_kode'          => $this->input->post('id'),
                'u_nama'          => $this->input->post('nama'),
//                'created_by'      => $_SESSION['username'],
            ));
            if ($ukuran)
            {
                $data->berhasil = 'Data Ukuran berhasil dibuat.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('ukuran');
            }
            else
            {
                $data->gagal = 'Data Ukuran gagal dibuat.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('ukuran');
            }
        }
    }

    public  function hapus($id)
    {
        $data = new stdClass();

        $ukuran = $this->ukuran->where('u_kode', $id)->delete();
        if ($ukuran)
        {
            $data->berhasil = 'Data Ukuran berhasil dihapus';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('ukuran');
        }
        else
        {
            $data->gagal = 'Data Ukuran gagal dihapus';
            $this->session->set_flashdata('berhasil', $data->gagal);

            redirect('ukuran');
        }
    }

    public function get($item)
    {
        $data = new stdClass();
        $data->members = $this->ukuran->many_to_many_where($item);
        $this->load->view('Tabel_detil', $data);
    }
}