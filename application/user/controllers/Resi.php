<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data->breadcumb = 'Resi';
        $this->data->breadcumburl = site_url('resi');
        $this->load->view('Resi', $this->data);
    }

    public function detail()
    {
        $this->data->breadcumb = 'Detail Resi';
        $this->data->breadcumburl = site_url('resi/detail');
        $this->load->view('Resi_detail', $this->data);

    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */