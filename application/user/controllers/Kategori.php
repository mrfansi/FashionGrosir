<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_kategori_m','item_kategori');
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

    public function get($k_kode) {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Kategori';
        $data->title_page = 'Item';
        $data->items = $this->item_kategori->with_item()->with_kategori()->where_k_kode($k_kode)->get_all();
        $this->load->view('Home', $data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */