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

    public function edit($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Customers > Edit';
        $data->customers = $this->customers->where('customers_id', $id)->get();
        if ($this->input->server('REQUEST_METHOD') == 'GET')
        {
            $this->load->view('CRUD_Customers', $data);
        }
        else
        {

        }
    }

    public  function delete($id)
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