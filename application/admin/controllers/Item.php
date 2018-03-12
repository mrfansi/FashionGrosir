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

    public function kategori($kat)
    {
        return json_encode($this->item->as_array()->get_many_by('kat_kode', $kat));
    }


}