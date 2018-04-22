<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 08/03/2018
 * Time: 00.07
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');


    }

    public function index()
    {
        redirect('auth/login');
    }

    public function login()
    {
        // model
        $this->load->model('Ms_user', 'user');


        $this->load->view('master/Login');
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url('adm.php/auth'));
    }
}
