<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir_Transfer extends MY_Controller
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
        $this->load->view('Ongkir_Transfer', $this->data);

    }
}