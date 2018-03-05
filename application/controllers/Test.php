<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 04/03/2018
 * Time: 16.56
 */

class Test extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Ms_item', 'item');
    }

    public function index()
    {
        $data = new stdClass();
        $data->data = $this->item->item_by_kategori();
        $this->load->view('Test', $data);
    }

    public function itemkategori()
    {
        $data = new stdClass();
        $data->data = $this->item->item_by_kategori();
        $this->load->view('Test', $data);
    }
}