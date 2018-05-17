<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public $menu_kategori;
    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('Item_detil_m', 'item_detil');
        $this->load->model('Item_kategori_m', 'item_kategori');
        $this->load->model('Item_qty_m', 'item_qty');

        // load model
        $this->load->model('Kategori_m','kategori');
        $this->menu_kategori = $this->kategori->get_all();
    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Produk Terbaru | Fashion Grosir';
        $data->title_page = 'Item';
        $data->items = $this->item_detil->with_item()->with_warna()->with_ukuran()->with_seri()->with_item_img()->get_all();
        $this->load->view('Home', $data);
    }

    public function item($ide_detil)
    {
        $data = new stdClass();
        $data->title = '';
        $data->item = $this->item_detil
            ->with_item()
            ->with_warna()
            ->with_ukuran()
            ->with_seri()
            ->with_item_img()
            ->where_ide_kode($ide_detil)
            ->get();
        $data->qty = function ($ide_kode) {
            $hasil = 0;
            $stoks = $this->item_qty->fields('iq_qty')->with_item_detil('where:ide_kode = \'' . $ide_kode . '\'')->get_all();
            foreach ($stoks as $stok) {
                $hasil += $stok->iq_qty;
            }

            return $hasil;
        };

        $this->load->view('Detil', $data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */