<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Item_img_m extends MY_Model
{
    public function __construct()
    {
        $this->table = 'item_img';
        $this->primary_key = 'ii_id';
        $this->protected = array('ii_id', 'created_at', 'update_at');
        $this->timestamps = TRUE;

        $this->has_one['item'] = 'Item_m';
        parent::__construct();
    }
}