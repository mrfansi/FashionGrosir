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
        $this->data->resis = $this->artikel->where('ar_isresi', 1)->get_all();
        $this->load->view('Resi', $this->data);
    }

    public function get($id)
    {
        $this->data->resi = $this->artikel->where('ar_url', $id)->get();
        $this->load->view('Resi_detil', $this->data);

    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */