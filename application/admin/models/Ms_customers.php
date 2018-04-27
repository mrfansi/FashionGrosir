<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Ms_customers extends MY_Model
{

    public function __construct()
    {
        $this->table = 'ms_customers';
        $this->primary_key = 'id';
        $this->protected = array('id','created_at','update_at');
        $this->timestamps = TRUE;
        $this->has_one['details'] = array('local_key'=>'id', 'foreign_key'=>'user_id', 'foreign_model'=>'User_details_model');
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