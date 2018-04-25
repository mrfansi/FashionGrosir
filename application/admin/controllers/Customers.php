<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Customers extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ms_customers', 'customers');
    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Customers';
        $data->customers = $this->customers->get_all();
        $this->load->view('Customers', $data);
    }

    public function tambah()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Customers > Tambah';
        $data->submit = 'Simpan';

        if ($this->input->server('REQUEST_METHOD') == 'GET')
        {
            $this->load->view('CRUD_Customers', $data);
        }
        else
        {
            $customer = $this->customers->from_form(NULL, array(
                'customers_id'          => $this->key->set_customers(),
                'customers_ipaddr'      => $_SERVER['REMOTE_ADDR'],
                'customers_created_by'  => $_SESSION['username'],
                'customers_created_at'  => date('Y-m-d H:i:s'),
                'customers_update_by'   => $_SESSION['username'],
                'customers_update_at'   => date('Y-m-d H:i:s')
            ))->insert();
            if ($customer)
            {
                $data->berhasil = 'Data Customer berhasil ditambahkan.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                $this->load->view('CRUD_Customers', $data);
            }
            else
            {
                $data->gagal = 'Data Customer gagal ditambahkan.';
                $this->session->set_flashdata('gagal', $data->gagal);

                $this->load->view('CRUD_Customers', $data);
            }
        }
    }

    public function detil($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Customers > Detil';
        $data->customers = $this->customers->where('customers_id', $id)->get();

        if ($this->input->server('REQUEST_METHOD') == 'GET')
        {
            $this->load->view('CRUD_Customers', $data);
        }
        else
        {

        }

    }

    public function ubah($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Customers > Ubah';
        $data->submit = 'Ubah';
        $data->customers = $this->customers->where('customers_id', $id)->get();
        if ($this->input->server('REQUEST_METHOD') == 'GET')
        {
            $this->load->view('CRUD_Customers', $data);
        }
        else
        {

        }
    }

    public  function hapus($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Customers';
        $data->customers = $this->customers->where('customers_id', $id)->get();
        if ($this->input->server('REQUEST_METHOD') == 'GET')
        {
            $this->load->view('CRUD_Customers', $data);
        }
        else
        {

        }
    }
}