<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Tr_customers_pengiriman extends MY_Model
{

    public function __construct()
    {
        $this->table = 'tr_customers_pengiriman';
        $this->primary_key = 'id';
        $this->protected = array('id','created_at','update_at');
        $this->timestamps = TRUE;
        $this->has_one['customers'] = array('local_key'=>'customers_id', 'foreign_key'=>'customers_id', 'foreign_model'=>'Ms_customers');
        parent::__construct();
    }
}