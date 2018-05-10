<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Item_m extends MY_Model
{
    public function __construct()
    {
        $this->table = 'item';
        $this->primary_key = 'i_id';
        $this->protected = array('i_id', 'created_at', 'update_at');
        $this->timestamps = TRUE;

        $this->has_many['detil'] = 'Item_detil_m';
        parent::__construct();
    }
}