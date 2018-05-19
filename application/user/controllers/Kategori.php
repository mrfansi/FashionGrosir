<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public $menu_kategori;
    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('Kategori_m','kategori');
        $this->load->model('Warna_m','warna');
        $this->load->model('Ukuran_m','ukuran');
        $this->load->model('Item_m','item');
        $this->load->model('Item_detil_m','item_detil');
        $this->load->model('Item_qty_m','item_qty');
        $this->load->model('Item_img_m','item_img');
        $this->load->model('Item_kategori_m','item_kategori');
        $this->menu_kategori = $this->kategori->get_all();
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

    public function get_item($k_url) {
        $data = new stdClass();
        $data->kats = $this->item_kategori->with_kategori('where:k_url = \'' . $k_url .'\'')->with_item()->get_all();
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

        $data->breadcumburl = site_url('kategori/'. $k_url);
        $data->breadcumb = $this->kategori->where_k_url($k_url)->get()->k_nama;
        $this->load->view('Kategori', $data);
    }

    public function get_item_detil($k_url, $i_url)
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
        $data->breadcumburl = site_url('kategori/'. $k_url);
        $data->breadcumburl1 = site_url('kategori/'. $k_url . '/item/' . $i_url . '/detil');
        $data->breadcumb = $this->kategori->where_k_url($k_url)->get()->k_nama;
        $data->breadcumb1 = $this->item->where_i_url($i_url)->get()->i_nama;
        $this->load->view('Detil', $data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */