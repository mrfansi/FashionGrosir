<?php

class Ms_kategori extends MY_Model
{
    public function __construct()
    {
        $this->table = 'ms_kategori';
        $this->primary_key = 'kategori_id';
        $this->protected = array('kategori_id','created_at','updated_at');
        $this->timestamps = TRUE;

        parent::__construct();
    }
}

?>