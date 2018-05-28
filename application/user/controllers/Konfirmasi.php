<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('Konfirmasi', $this->data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */