<?php

class Ms_item_kategori extends MY_Model
{
    public $table = 'Ms_Item_Kategori'; // you MUST mention the table name
    public $primary_key = 'id'; // you MUST mention the primary key
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array('id'); // ...Or you can set an array with the fields that cannot be filled by insert/update
    public function __construct()
    {
        parent::__construct();
    }
}