<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 17.48
 */

class Ms_item extends MY_Model {

    public $table = 'Ms_Item'; // you MUST mention the table name
    public $primary_key = 'rowid'; // you MUST mention the primary key
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array('rowid'); // ...Or you can set an array with the fields that cannot be filled by insert/update
    public function __construct()
    {
        parent::__construct();
    }
}