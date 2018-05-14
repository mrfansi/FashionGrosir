<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Seri extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Seri_m', 'seri');
    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Nomor Seri';
        $data->title_page = 'Nomor Seri';
        $data->total_seri = $this->seri->count_rows();
        $data->seris = $this->seri->get_all();
        $this->load->view('Seri', $data);
    }

    public function tambah()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Nomor Seri > Tambah';
        $data->submit = 'Simpan';
        $data->kode = $this->seri->guid();
        $this->load->view('CRUD_Seri', $data);
    }

    public function ubah($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Nomor Seri > Ubah';
        $data->submit = 'Ubah';
        $data->kode = $id;
        $data->seris = $this->seri->where('s_kode', $id)->get();

        $this->load->view('CRUD_Seri', $data);
    }

    public function simpan()
    {
        // create object
        $data = new stdClass();

        // get guid form post
        $id = $this->input->post('id');

        // get user from database where guid
        $seri = $this->seri->where_s_kode($id)->get();

        if ($seri)
        {
            $seri = $this->seri->where_s_kode($id)->update(array(
                's_nama'    => $this->input->post('nama'),
                'updated_by'        => $_SESSION['username'],
            ));
            if ($seri)
            {
                $data->berhasil = 'Nomor Seri berhasil diperbarui.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('seri');
            }
            else
            {
                $data->gagal = 'Nomor Seri gagal diperbarui.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('seri');
            }
        }
        else
        {
            $seri = $this->seri->insert(array(
                's_kode'          => $this->input->post('id'),
                's_nama'          => $this->input->post('nama'),
//                'created_by'      => $_SESSION['username'],
            ));
            if ($seri)
            {
                $data->berhasil = 'Nomor Seri berhasil dibuat.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('seri');
            }
            else
            {
                $data->gagal = 'Nomor Seri gagal dibuat.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('seri');
            }
        }
    }

    public  function hapus($id)
    {
        $data = new stdClass();

        $seri = $this->seri->where('s_kode', $id)->delete();
        if ($seri)
        {
            $data->berhasil = 'Nomor Seri berhasil dihapus';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('seri');
        }
        else
        {
            $data->gagal = 'Nomor Seri gagal dihapus';
            $this->session->set_flashdata('berhasil', $data->gagal);

            redirect('seri');
        }
    }

    public function get($item)
    {
        $data = new stdClass();
        $data->members = $this->seri->many_to_many_where($item);
        $this->load->view('Tabel_detil', $data);
    }
}