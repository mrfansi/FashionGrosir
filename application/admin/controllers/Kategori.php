<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.11
 */

class Kategori extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ms_kategori', 'kategori');
    }

    public function all()
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->index();
        } else {
            echo json_encode($this->kategori->as_array()->get_all());
        }
    }

    public function index()
    {
        echo 'Request tidak diperbolehkan.';
    }

    public function get_key() {
        echo json_encode('KAT-' . date('Ymd') . '-' . date('His'));
    }

    public function get($id)
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            echo json_encode($this->kategori->as_array()->get($id));
        }
    }

    public function baru()
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('CRUD_Kategori');
        } else if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = array(
                'Kat_ID'        => $this->input->post('id'),
                'Kat_Nama'      => $this->input->post('nama'),
                'Kat_Parent_ID' => $this->input->post('parent')
            );

            $this->kategori->insert($data);
        }
    }

    public function hapus($id)
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            return $this->kategori->delete($id);
        }
    }

    public function ubah($id)
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            redirect(base_url('adm.php/navigasi/CRUD_Kategori'));
        } else if ($this->input->server('REQUEST_METHOD') == 'POST') {
            return 0;
        }
    }
}