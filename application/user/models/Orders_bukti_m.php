<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Orders_bukti_m extends MY_Model
{
    public function __construct()
    {
        $this->table = 'orders_bukti';
        $this->primary_key = 'ob_id';
        $this->protected = array('ob_id', 'created_at', 'update_at');
        $this->timestamps = TRUE;

        parent::__construct();
    }
}