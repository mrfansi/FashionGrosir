<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Item_m extends MY_Model
{
    public function __construct()
    {
        $this->table = 'item';
        $this->primary_key = 'i_id';
        $this->protected = array('i_id', 'created_at', 'update_at');
        $this->timestamps = TRUE;

        $this->has_many['detil'] = 'Item_detil_m';
        parent::__construct();
    }

    public function select_sum_qty()
    {
        $query = $this->db->query("SELECT 
                                    i.i_kode, 
                                    i.i_nama,
                                    i.i_hrg_reseller, 
                                    i.i_hrg_vip, 
                                    i.i_deskripsi,  
                                    img.ii_nama, 
                                    img.ii_url, 
                                    id.ide_kode, 
                                    w.w_nama, 
                                    u.u_nama, 
                                    s.s_nama, 
                                    SUM(iq.iq_qty) qty
                                    FROM item_detil id
                                    INNER JOIN item i ON id.i_kode = i.i_kode
                                    INNER JOIN warna w ON id.w_kode = w.w_kode
                                    INNER JOIN ukuran u ON id.u_kode = u.u_kode
                                    LEFT JOIN seri s ON id.s_kode = s.s_kode
                                    LEFT JOIN item_qty iq ON id.ide_kode = iq.ide_kode
                                    LEFT JOIN (
                                        SELECT *
                                        FROM item_img ii
                                        WHERE ii.ii_default = 1 ) img
                                    ON i.i_kode = img.i_kode
                                    WHERE DATE(i.created_at) > DATE(NOW()) - INTERVAL 15 DAY
                                    GROUP BY id.ide_kode
                                    ORDER BY DATE(i.created_at) DESC;");

        return $query->result();
    }

    public function select_img_where($id)
    {
        $query = $this->db->query("SELECT ii.* FROM item_img ii
                                    INNER JOIN item i ON ii.i_kode = i.i_kode
                                    WHERE ii.ii_default = 1
                                    AND ii.i_kode = '$id';");
        return $query->result();
    }

}