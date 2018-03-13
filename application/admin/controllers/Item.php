<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 11/03/2018
 * Time: 02.54
 */

class Item extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ms_item', 'item');
    }

    public function index()
    {
        $this->_show_content('Items', 'Items');
    }

    public function baru()
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('CRUD_Item');
        } else if ($this->input->server('REQUEST_METHOD') == 'POST') {
            return 0;
        }
    }


    public function kategori($kat)
    {
        return json_encode($this->item->as_array()->get_many_by('kat_kode', $kat));
    }

    public function range_harga() {
        $array_data = [];
        $array_data['min'] = $this->item->get_min();
        $array_data['max'] = $this->item->get_max();
        echo json_encode($array_data);
    }


}