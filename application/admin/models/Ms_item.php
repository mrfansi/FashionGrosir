<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 17.48
 */

class Ms_item extends MY_Model {

    protected $_table = 'ms_item';
    protected $primary_key = 'rowid';
    protected $soft_delete = TRUE;
    protected $soft_delete_key = 'item_del';

    public function item_terbaru()
    {
        $hasil = $this->order_by('item_input')->limit(8)->get_all();
        return $hasil;
    }

    public function item_by_kategori($limit = 10)
    {
        $hasil = $this->group_by('kat_kode')->limit($limit)->get_all();
        return $hasil;
    }

    public function get_max() {
        $hasil = $this->db->select_max('item_harga1')->get($this->_table)->result();
        return $hasil;
    }

    public function get_min() {
        $hasil = $this->db->select_min('item_harga1')->get($this->_table)->result();
        return $hasil;
    }
}