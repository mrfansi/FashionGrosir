<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        redirect('/');
    }

    public function get_item($k_url)
    {
        $this->data->kategori_s = $this->item_kategori
                ->with_kategori('where:k_url = \'' . $k_url .'\'')
                ->with_item()
                ->get_all();
        $this->data->breadcumburl = site_url('kategori/'. $k_url);
        $this->data->breadcumb = $this->kategori->where_k_url($k_url)->get()->k_nama;
        $this->load->view('Kategori', $this->data);
    }

    public function get_item_detil($k_url, $i_url)
    {
        $this->data->item = $this->item
                ->with_item_detil()
                ->where_i_url($i_url)
                ->get();
        $this->data->breadcumburl = site_url('kategori/'. $k_url);
        $this->data->breadcumburl1 = site_url('kategori/'. $k_url . '/item/' . $i_url . '/detil');
        $this->data->breadcumb = $this->kategori->where_k_url($k_url)->get()->k_nama;
        $this->data->breadcumb1 = $this->item->where_i_url($i_url)->get()->i_nama;
        $this->load->view('Detil', $this->data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */