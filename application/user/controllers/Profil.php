<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends MY_Controller
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
        $this->data->profil = $this->pengguna->where('p_kode', $_SESSION['id'])->get();
        $this->load->view('Profil', $this->data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */