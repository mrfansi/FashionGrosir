<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Customer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ms_customer', 'customer');
    }

    public function index()
    {
        $data = new stdClass();
        $data->customers = $this->customer->get_all();
        $this->load->view('vdashboard');
    }


//    public function all()
////    {
////        if ($this->input->server('REQUEST_METHOD') == 'GET') {
////            $this->index();
////        } else {
////            echo json_encode($this->customer->as_array()->get_all());
////        }
////    }
////
////    public function index()
////    {
////        echo 'Request tidak diperbolehkan.';
////    }
////
////    public function baru()
////    {
////        if ($this->input->server('REQUEST_METHOD') == 'GET') {
////            redirect(base_url('adm.php/navigasi/CRUD_Customer'));
////        } else if ($this->input->server('REQUEST_METHOD') == 'POST') {
////            return 0;
////        }
////    }
////
////    public function hapus($id)
////    {
////        if ($this->input->server('REQUEST_METHOD') == 'GET') {
////            redirect(base_url('adm.php/navigasi/CRUD_Customer'));
////        } else if ($this->input->server('REQUEST_METHOD') == 'POST') {
////            return 0;
////        }
////    }
////
////    public function ubah($id)
////    {
////        if ($this->input->server('REQUEST_METHOD') == 'GET') {
////            redirect(base_url('adm.php/navigasi/CRUD_Customer'));
////        } else if ($this->input->server('REQUEST_METHOD') == 'POST') {
////            return 0;
////        }
////    }
}