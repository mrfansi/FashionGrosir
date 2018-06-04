<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        redirect('/');
    }

    public function get($url)
    {
        $this->data->artikel = $this->artikel->where('ar_url', $url)->get();
        $this->data->breadcumburl = site_url('artikel/' . $this->data->artikel->ar_url);
        $this->data->breadcumb = $this->data->artikel->ar_judul;
        $this->load->view('Artikel', $this->data);
    }
}