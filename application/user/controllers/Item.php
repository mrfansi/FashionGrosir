<?php
/**
 * Created by PhpStorm.
 * User: Muhammad Irfan
 * Date: 06/07/2018
 * Time: 11:16
 */

class Item extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($i_url)
    {
        $this->data->item = $this->item
            ->with_item_detil()
            ->where('i_url', $i_url)
            ->get();

        $this->data->kategori = function ($i_kode) {
            $data = array();
            $k = $this->item_kategori->with_kategori()->where('i_kode', $i_kode)->get_all();

            foreach ($k as $value) {
                array_push($data, $value->kategori->k_nama);
            }

            $hasil = implode(', ', $data);

            return $hasil;
        };

        $this->data->breadcumburl = site_url('produk-terbaru');
        $this->data->breadcumburl1 = site_url('item/' . $i_url . '/detil');
        $this->data->breadcumb = 'Produk Terbaru';
        $this->data->breadcumb1 = $this->item->where('i_url', $i_url)->get()->i_nama;

        $this->load->view('Detil', $this->data);
    }

    public function get_with_hotitem($i_url)
    {
        $this->data->item = $this->item
            ->with_item_detil()
            ->where('i_url', $i_url)
            ->get();

        $this->data->kategori = function ($i_kode) {
            $data = array();
            $k = $this->item_kategori->with_kategori()->where('i_kode', $i_kode)->get_all();

            foreach ($k as $value) {
                array_push($data, $value->kategori->k_nama);
            }

            $hasil = implode(', ', $data);

            return $hasil;
        };

        $this->data->breadcumburl = site_url('hot-item');
        $this->data->breadcumburl1 = site_url('hot-item/' . $i_url . '/detil');
        $this->data->breadcumb = 'Hot Item';
        $this->data->breadcumb1 = $this->item->where('i_url', $i_url)->get()->i_nama;
        $this->load->view('Detil', $this->data);
    }

    public function get_with_produkterbaru($i_url)
    {
        $this->data->item = $this->item
            ->with_item_detil()
            ->where('i_url', $i_url)
            ->get();

        $this->data->kategori = function ($i_kode) {
            $data = array();
            $k = $this->item_kategori->with_kategori()->where('i_kode', $i_kode)->get_all();

            foreach ($k as $value) {
                array_push($data, $value->kategori->k_nama);
            }

            $hasil = implode(', ', $data);

            return $hasil;
        };

        $this->data->breadcumburl = site_url('produk-terbaru');
        $this->data->breadcumburl1 = site_url('produk-terbaru/' . $i_url . '/detil');
        $this->data->breadcumb = 'Produk Terbaru';
        $this->data->breadcumb1 = $this->item->where('i_url', $i_url)->get()->i_nama;
        $this->load->view('Detil', $this->data);
    }

    public function get_with_kategori($k_url, $i_url)
    {
        $this->data->item = $this->item
            ->with_item_detil()
            ->where('i_url', $i_url)
            ->get();

        $this->data->kategori = function ($i_kode) {
            $data = array();
            $k = $this->item_kategori->with_kategori()->where('i_kode', $i_kode)->get_all();

            foreach ($k as $value) {
                array_push($data, $value->kategori->k_nama);
            }

            $hasil = implode(', ', $data);

            return $hasil;
        };

        $this->data->breadcumburl = site_url('kategori/' . $k_url);
        $this->data->breadcumburl1 = site_url('kategori/' . $k_url . '/' . $i_url . '/detil');
        $this->data->breadcumb = $this->kategori->where('k_url', $k_url)->get()->k_nama;
        $this->data->breadcumb1 = $this->item->where('i_url', $i_url)->get()->i_nama;
        $this->load->view('Detil', $this->data);
    }
}