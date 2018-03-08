<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 24/02/2018
 * Time: 18.01
 */

class Ms_user extends MY_Model {
    public $_table = 'ms_user';
    public $primary_key = 'user_id';

    public function login_auth($username)
    {
        return $this->get_by('user_username', $username);
    }
}