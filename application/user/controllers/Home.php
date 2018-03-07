<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->_show_content('Jual Beli Barang harga Grosir', 'Home');
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */