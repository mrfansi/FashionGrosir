<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Item_kategori_m extends MY_Model {
    public function __construct()
    {
        $this->table = 'item_kategori';
        $this->primary_key = 'ik_id';
        $this->protected = array('ik_id','created_at','update_at');
        $this->timestamps = TRUE;
        parent::__construct();
    }
}