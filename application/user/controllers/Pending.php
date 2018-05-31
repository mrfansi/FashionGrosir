<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pending extends MY_Controller
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
        $this->load->view('Pending', $this->data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */