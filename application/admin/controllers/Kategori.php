<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Kategori extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ms_kategori', 'kategori');
    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Kategori';
        $data->total_kategori = $this->kategori->count_rows();
        $data->kategori = $this->kategori->get_all();
        $this->load->view('Kategori', $data);
    }

    public function tambah()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Kategori > Tambah';
        $data->submit = 'Simpan';

        $kategori = $this->kategori->insert(array(
            'kategori_name' => $this->input->post('kategori_name'),
            'kategori_parentid' => $this->input->post('kategori_parentid'),
            'created_by' => $_SESSION['username']
        ));

        if ($kategori) {
            $data->berhasil = 'Data Kategori berhasil ditambahkan.';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('kategori');
//                $this->load->view('CRUD_Customers', $data);
        } else {
            $data->gagal = 'Data Kategori gagal ditambahkan.';
            $this->session->set_flashdata('gagal', $data->gagal);

            redirect('kategori');
//                $this->load->view('CRUD_Customers', $data);
        }
    }

    public function detil($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Kategori > Detil';
        $data->kategori = $this->kategori->where('kategori_id', $id)->get();

        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('CRUD_Kategori', $data);
        } else {
            redirect('kategori');
        }
    }

    public function ubah($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Kategori > Ubah';
        $data->submit = 'Ubah';
        $data->kategori = $this->kategori->where('kategori_id', $id)->get();
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('CRUD_Kategori', $data);
        } else {

        }
    }

    public function hapus($id)
    {
        $data = new stdClass();

        $kategori = $this->kategori->where('kategori_id', $id)->delete();
        if ($kategori) {
            $data->berhasil = 'Data Kategori  berhasil dihapus';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('kategori');
        } else {
            $data->gagal = 'Data Kategori  gagal dihapus';
            $this->session->set_flashdata('berhasil', $data->gagal);

            redirect('kategori');
        }
    }
}