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
        $this->load->helper('form');
    }

    public function index()
    {
        redirect('auth/login');
    }

    public function login()
    {
        // null object
        $data = new stdClass();

        // model
        $this->load->model('Ms_users', 'users');

        // load library
        $this->load->library('form_validation');

        // buat validation
        $validation = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s tidak boleh kosong'
                )
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s tidak boleh kosong'
                )
            )
        );

        // set validation
        $this->form_validation->set_rules($validation);

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('master/Login');
        } else {
            // get post
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // get database
            $user = $this->users->where(array(
                'users_username'  => $username,
                'users_password'  => $password
            ))->get();

            if ($user)
            {
                $sessiondata = array(
                  'id'          => $user->users_id,
                  'username'    => $user->users_username,
                  'isonline'    => true
                );
                $this->session->set_userdata($sessiondata);

                redirect('dashboard');
            } else {
                $data->log = 'Username atau Password salah.';
                $this->load->view('master/Login', $data);
            }
        }

    }

    public function logout()
    {
        session_destroy();
        redirect(base_url('adm.php/auth'));
    }
}
