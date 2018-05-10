<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Alamat_m extends MY_Model
{
    public function __construct()
    {
        $this->table = 'alamat';
        $this->primary_key = 'a_id';
        $this->protected = array('a_id', 'created_at', 'update_at');
        $this->timestamps = TRUE;

        parent::__construct();
    }
}