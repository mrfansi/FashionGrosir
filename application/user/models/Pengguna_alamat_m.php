<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Pengguna_alamat_m extends MY_Model
{
    public function __construct()
    {
        $this->table = 'pengguna_alamat';
        $this->primary_key = 'pa_id';
        $this->protected = array('pa_id', 'created_at', 'update_at');
        $this->timestamps = TRUE;

        parent::__construct();
    }
}