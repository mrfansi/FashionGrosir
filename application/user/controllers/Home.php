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
        // load model
        $this->load->model('Item_m', 'item');

        $data = new stdClass();
        $data->title = 'Fashion Grosir | Item';
        $data->title_page = 'Item';
        $data->items = $this->item->get_all();
        $this->load->view('Home', $data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */