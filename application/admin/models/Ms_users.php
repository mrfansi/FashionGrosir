<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Ms_users extends MY_Model {

    public $table = 'ms_users'; // you MUST mention the table name
    public $primary_key = 'id'; // you MUST mention the primary key
//    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array('id','created_at','update_at'); // ...Or you can set an array with the fields that cannot be filled by insert/update

    public function __construct()
    {
        $this->timestamps = TRUE;
        parent::__construct();
    }
}