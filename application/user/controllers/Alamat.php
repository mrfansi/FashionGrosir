<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alamat extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->isonline) {
            redirect('login');
        }
    }

    public function index()
    {
        $this->load->view('Alamat', $this->data);

    }

    public function get($order)
    {
        $this->data->nomor_order = $order;
        $this->load->view('Alamat', $this->data);
    }

    public function simpan()
    {

    }
}