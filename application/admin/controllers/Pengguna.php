<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Pengguna extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_m', 'pengguna');
    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Pengguna Admin';
        $data->total_pengguna = $this->pengguna->count_rows();
        $data->users = $this->pengguna->where_p_tipe('0')->get_all();
        $this->load->view('Pengguna', $data);
    }

    public function simpan()
    {
        // create object
        $data = new stdClass();

        // get guid form post
        $id = $this->input->post('id');

        // get user from database where guid
        $user = $this->pengguna->where_p_kode($id)->get();

        if ($user)
        {
            $user = $this->pengguna->where_p_kode($id)->update(array(
                'p_nama'    => $this->input->post('nama'),
                'p_username'    => $this->input->post('username'),
                'p_password'    => $this->input->post('password'),
                'p_email'       => $this->input->post('email'),
                'updated_by'        => $_SESSION['username'],
            ));
            if ($user)
            {
                $data->berhasil = 'Data Pengguna Admin berhasil diperbarui.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('pengguna');
            }
            else
            {
                $data->gagal = 'Data Pengguna Admin gagal diperbarui.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('pengguna');
            }
        }
        else
        {
            $user = $this->pengguna->insert(array(
                'p_kode'          => $this->input->post('id'),
                'p_nama'          => $this->input->post('nama'),
                'p_username'      => $this->input->post('username'),
                'p_password'      => $this->input->post('password'),
                'p_email'         => $this->input->post('email'),
//                'created_by'      => $_SESSION['username'],
            ));
            if ($user)
            {
                $data->berhasil = 'Data Pengguna Admin berhasil dibuat.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('pengguna');
            }
            else
            {
                $data->gagal = 'Data Pengguna Admin gagal dibuat.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('pengguna');
            }
        }
    }

    public function tambah()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Pengguna Admin > Tambah';
        $data->submit = 'Simpan';
        $data->kode = $this->pengguna->guid();
        $this->load->view('CRUD_Pengguna', $data);
    }

    public function detil($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Pengguna Admin > Detil';
        $data->users = $this->pengguna->where('p_kode', $id)->get();
        $this->load->view('CRUD_Pengguna', $data);
    }

    public function ubah($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Pengguna Admin > Ubah';
        $data->submit = 'Ubah';
        $data->kode = $id;
        $data->users = $this->pengguna->where('p_kode', $id)->get();

        $this->load->view('CRUD_Pengguna', $data);
    }

    public  function hapus($id)
    {
        $data = new stdClass();

        $customer = $this->pengguna->where('p_kode', $id)->delete();
        if ($customer)
        {
            $data->berhasil = 'Data Pengguna Admin berhasil dihapus';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('pengguna');
        }
        else
        {
            $data->gagal = 'Data Pengguna Admin gagal dihapus';
            $this->session->set_flashdata('berhasil', $data->gagal);

            redirect('pengguna');
        }
    }
}