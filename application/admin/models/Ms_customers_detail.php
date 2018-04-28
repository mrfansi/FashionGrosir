<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Ms_customers_detail extends MY_Model {



    public function __construct()
    {
        $this->table = 'ms_customers_detail'; // you MUST mention the table name
        $this->primary_key = 'customers_id'; // you MUST mention the primary key
        $this->protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
        parent::__construct();
    }
}