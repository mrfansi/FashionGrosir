<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // load model
        $this->load->model('Item_detil_m', 'item_detil');

        $data = new stdClass();
        $data->title = 'Fashion Grosir | Item';
        $data->title_page = 'Item';
        $data->items = $this->item_detil->with_item()->with_warna()->with_ukuran()->with_seri()->with_item_img()->get_all();
        $this->load->view('Home', $data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */