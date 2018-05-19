<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public $menu_kategori;
    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('Item_m', 'item');
        $this->load->model('Item_detil_m', 'item_detil');
        $this->load->model('Item_img_m', 'item_img');
        $this->load->model('Item_kategori_m', 'item_kategori');
        $this->load->model('Item_qty_m', 'item_qty');
        $this->load->model('Warna_m', 'warna');
        $this->load->model('Ukuran_m', 'ukuran');

        // load model
        $this->load->model('Kategori_m','kategori');
        $this->menu_kategori = $this->kategori->get_all();
    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Produk Terbaru | Fashion Grosir';
        $data->title_page = 'Item';
        $data->items = $this->item->with_item_detil()->get_all();
        $data->qty = function ($i_kode) {
            $hasil = 0;
            $stoks = $this->item_qty->fields('iq_qty')->with_item_detil('where:i_kode = \'' . $i_kode . '\'')->get_all();
            foreach ($stoks as $stok) {
                $hasil += $stok->iq_qty;
            }

            return $hasil;
        };

        $data->item_img = function ($i_kode) {
            return $this->item_img->where(array('i_kode' => $i_kode, 'ii_default' => 1))->get();
        };
        $this->load->view('Home', $data);
    }

    public function item($i_url)
    {
        $data = new stdClass();
        $data->title = '';
        $data->item = $this->item
            ->with_item_detil()
            ->where_i_url($i_url)
            ->get();
        $data->item_detil = function ($i_kode) {
            return $this->item_detil
                ->with_item()
                ->with_warna()
                ->with_ukuran()
                ->with_seri()
                ->with_item_img()
                ->where_i_kode($i_kode)
                ->get_all();
        };

        $data->warna = function ($i_kode) {
            return $this->warna
                ->with_item_detil('where:i_kode = \'' . $i_kode . '\'')
                ->get_all();
        };

        $data->ukuran = function ($i_kode) {
            return $this->ukuran
                ->with_item_detil('where:i_kode = \'' . $i_kode . '\'')
                ->get_all();
        };

        $data->qty = function ($i_kode) {
            $hasil = 0;
            $stoks = $this->item_qty->fields('iq_qty')->with_item_detil('where:i_kode = \'' . $i_kode . '\'')->get_all();
            foreach ($stoks as $stok) {
                $hasil += $stok->iq_qty;
            }

            return $hasil;
        };

        $data->item_img = function ($i_kode) {
            return $this->item_img
                ->where(array('i_kode' => $i_kode, 'ii_default' => 1))
                ->get_all();
        };

        $data->item_img_all = function ($i_kode) {
            return $this->item_img->where(array('i_kode' => $i_kode))->get_all();
        };

        $data->breadcumburl = site_url('produk-tebaru');
        $data->breadcumburl1 = site_url('produk-tebaru/item/' . $i_url . '/detil');
        $data->breadcumb = 'Produk Terbaru';
        $data->breadcumb1 = $this->item->where_i_url($i_url)->get()->i_nama;

        $this->load->view('Detil', $data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */