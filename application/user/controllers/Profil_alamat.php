<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_alamat extends MY_Controller
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
        $this->load->view('Profil_alamat', $this->data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */