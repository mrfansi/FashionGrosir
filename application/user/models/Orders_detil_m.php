<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Orders_detil_m extends MY_Model
{
    public function __construct()
    {
        $this->table = 'orders_detil';
        $this->primary_key = 'od_id';
        $this->protected = array('od_id', 'created_at', 'update_at');
        $this->timestamps = TRUE;

        parent::__construct();
    }
}