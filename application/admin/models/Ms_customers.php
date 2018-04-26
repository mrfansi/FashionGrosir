<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Ms_customers extends MY_Model
{
    public $table = 'ms_customers';
    public $primary_key = 'customers_id';
//    public $fillable = array('customers_id','customers_username','customers_password','customers_email','customers_ipaddr','created_by','update_by','created_at','update_at');
    public $protected = array('created_at','update_at');

    public function __construct()
    {
        $this->timestamps = TRUE;
        parent::__construct();
    }

    public $rules = array(
        'insert'    => array(
            'customers_username'  => array(
                'field'     => 'username',
                'label'     => 'Username',
                'rules'     => 'required|is_unique[ms_customers.customers_username]|trim'
            ),
            'customers_password'  => array(
                'field'     => 'password',
                'label'     => 'Password',
                'rules'     => 'required|trim'
            ),
            'customers_email'     => array(
                'field'     => 'email',
                'label'     => 'Email',
                'rules'     => 'required|is_unique[ms_customers.customers_email]|valid_email|trim'
            )
        )
    );
}