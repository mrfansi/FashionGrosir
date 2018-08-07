<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Seri_m extends MY_Model {
    public function __construct()
    {
        $this->table = 'seri';
        $this->primary_key = 'seri_id';
        $this->protected = array('seri_id', 'created_at', 'update_at');
        $this->timestamps = TRUE;
        $this->soft_deletes = FALSE;
        $this->has_many['seri_detil'] = array(
            'foreign_model' => 'Seri_detil_m',
            'foreign_table' => 'seri_detil',
            'foreign_key' => 'seri_kode',
            'local_key' => 'seri_kode'
        );
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

    public function many_to_many_where($item)
    {
        $query = $this->db->query("SELECT s.s_nama nama
                                    FROM item_seri ise
                                    INNER JOIN item i ON ise.i_kode = i.i_kode
                                    INNER JOIN seri s ON ise.s_kode = s.s_kode
                                    WHERE i.i_kode = '$item';");

        return $query->result();
    }
}