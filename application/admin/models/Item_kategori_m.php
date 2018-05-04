<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Item_kategori_m extends MY_Model {
    public function __construct()
    {
        $this->table = 'item_kategori';
        $this->primary_key = 'item_kategori_id';
//        $this->has_many_pivot['ukuran'] = array(
//            'foreign_model'=>'Ukuran_m',
//            'pivot_table'=>'item_ukuran',
//            'local_key'=>'i_kode',
//            'pivot_local_key'=>'i_kode',
//            'pivot_foreign_key'=>'u_kode',
//            'foreign_key'=>'u_kode');
//        $this->has_many_pivot['kategori'] = array(
//            'foreign_model'=>'Kategori_m',
//            'pivot_table'=>'items_kategoris',
//            'local_key'=>'i_kode',
//            'pivot_local_key'=>'i_kode',
//            'pivot_foreign_key'=>'k_kode',
//            'foreign_key'=>'k_kode');
        $this->protected = array('item_kategori_id','created_at','update_at');
        $this->timestamps = TRUE;
        parent::__construct();
    }

    public function guid()
    {
        if (function_exists('com_create_guid') === true)
            return trim(com_create_guid(), '{}');

        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}