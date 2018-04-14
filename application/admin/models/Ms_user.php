<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Ms_user extends MY_Model {
    public $_table = 'ms_User';
    public $primary_key = 'rowid';

    public function login_auth($username)
    {
        return $this->get_by('User_Name', $username);
    }

    public function get_password($username)
    {
        return $this->get_by('User_Name', $username)->User_Pass;
    }

}