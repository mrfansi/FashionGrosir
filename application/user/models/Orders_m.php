<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Orders_m extends MY_Model
{
    public function __construct()
    {
        $this->table = 'orders';
        $this->primary_key = 'o_id';
        $this->protected = array('o_id', 'created_at', 'update_at');
        $this->timestamps = TRUE;

        parent::__construct();
    }
}