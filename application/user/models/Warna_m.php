<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Warna_m extends MY_Model
{
    public function __construct()
    {
        $this->table = 'warna';
        $this->primary_key = 'w_id';
        $this->protected = array('w_id', 'created_at', 'update_at');
        $this->timestamps = TRUE;

        $this->has_many['detil'] = 'Item_detil_m';
        parent::__construct();
    }
}