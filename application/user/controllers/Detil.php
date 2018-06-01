<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detil extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $order_id = $this->uri->segment(2);

    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */