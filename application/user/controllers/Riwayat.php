<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends MY_Controller
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
        $this->data->orders = $this->order->select_invoice(6);
        $this->load->view('Riwayat', $this->data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */