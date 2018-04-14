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
        $this->load->model('Ms_item_kategori', 'kat_item');
    }

    public function index()
    {
        $this->_show_content('Items', 'Items');
    }

    public function baru()
    {
        $msg = array();
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('CRUD_Item');
        } else if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $data = array(
                'Kat_Nama'      => $this->input->post('nama'),
                'Kat_Parent_ID' => $this->input->post('parent')
            );

            if ($this->kat_item->insert($data))
            {
                $msg['status'] = true;
            }
            else{
                $msg['status'] = false;
            }

            echo $msg['status'];
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