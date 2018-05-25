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
        $this->soft_deletes = TRUE;
        $this->has_many['order_pengiriman'] = array(
            'foreign_model'=>'Order_pengiriman_m',
            'foreign_table'=>'orders_pengiriman',
            'foreign_key'=>'a_kode',
            'local_key'=>'a_kode');
        $this->has_many['Pengguna_alamat'] = array(
            'foreign_model'=>'Pengguna_alamat_m',
            'foreign_table'=> 'Pengguna_alamat',
            'foreign_key'=>'a_kode',
            'local_key'=>'a_kode');
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

    public function select_sum_qty()
    {

    }

    public function select_sum_qty_where($id)
    {
        $query = $this->db->query("SELECT i.i_kode, i.i_nama, i.i_hrg_reseller, i.i_hrg_vip, id.* , w.w_nama, u.u_nama, s.s_nama, SUM(iq.iq_qty) qty
                                    FROM item_detil id
                                    INNER JOIN item i ON id.i_kode = i.i_kode
                                    INNER JOIN warna w ON id.w_kode = w.w_kode
                                    INNER JOIN ukuran u ON id.u_kode = u.u_kode
                                    LEFT JOIN seri s ON id.s_kode = s.s_kode
                                    LEFT JOIN item_qty iq ON id.ide_kode = iq.ide_kode
                                    WHERE id.ide_kode = '$id'
                                    GROUP BY id.ide_kode;");

        return $query->result();
    }

    public function select_item_kategori_where_array($id)
    {
        $katitem = array();
        $query = $this->db->query("SELECT k.k_nama
                    FROM item_kategori ik
                    INNER JOIN item i ON ik.i_kode = i.i_kode
                    INNER JOIN kategori k ON ik.k_kode = k.k_kode
                    WHERE ik.i_kode = '$id';");

        foreach ($query->result() as $kat) {
            array_push($katitem, $kat->k_nama);
        }

        return $katitem;
    }

    public function select_item_kategori_where($id)
    {
        $query = $this->db->query("SELECT k.k_nama
                    FROM item_kategori ik
                    INNER JOIN item i ON ik.i_kode = i.i_kode
                    INNER JOIN kategori k ON ik.k_kode = k.k_kode
                    WHERE ik.i_kode = '$id';");


        return $query->result();
    }
}