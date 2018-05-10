<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Pengguna_m extends MY_Model
{
    public function __construct()
    {
        $this->table = 'pengguna';
        $this->primary_key = 'p_id';
        $this->protected = array('p_id', 'created_at', 'update_at');
        $this->timestamps = TRUE;

        parent::__construct();
    }
}