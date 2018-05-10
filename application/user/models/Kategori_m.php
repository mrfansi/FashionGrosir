<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Kategori_m extends MY_Model {
    public function __construct()
    {
        $this->table = 'kategori';
        $this->primary_key = 'k_id';
        $this->protected = array('k_id','created_at','update_at');
        $this->timestamps = TRUE;
        parent::__construct();
    }
}