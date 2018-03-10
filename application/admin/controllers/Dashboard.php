<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 08/03/2018
 * Time: 01.07
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ms_item', 'item');
        $this->load->model('Ms_customer', 'cust');
        $this->load->model('Ms_kategori', 'kategori');
    }

    public function index()
    {
        $this->_show_content('Dashboard', 'Dashboard');
    }

    public function item_count()
    {
        echo $this->item->count_all();
    }

    public function cust_count()
    {
        echo $this->cust->count_all();
    }


    public function inv_count()
    {

    }

    public function list_kategori()
    {
        $hasil = $this->kategori->as_array()->get_all();
        header('Content-Type: application/json');
        echo json_encode($hasil);
    }
}