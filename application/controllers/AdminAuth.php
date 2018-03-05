<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 05/03/2018
 * Time: 22.21
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAuth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = new stdClass();
        $data->judul = 'Admin | Login';
        $this->tampilkan_login('admin/login', $data);
    }

    public function logout()
    {

    }
}