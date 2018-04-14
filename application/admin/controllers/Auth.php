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

        // model
        $this->load->model('Ms_user', 'user');
    }

    public function index()
    {
        $data = new stdClass();
        $data->current_url = base_url('adm.php/auth/login');
        $this->load->view('Login', $data);
    }

    public function login()
    {
        $data = new stdClass();
        $data->status_code = '';

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $username = $this->input->post('loginUsername');
            $password = $this->input->post('loginPassword');

            $user = $this->user->login_auth($username);

            if ($user != null && $user->User_Pass == $password) {
                $data_array = array(
                    'User_Code' => $user->User_Code,
                    'User_Name' => $user->User_Name,
                    'loggedin' => 'true'
                );

                $this->session->set_userdata($data_array);

                echo json_encode(array(
                    'status_code' => '200',
                    'status_msg' => 'Login berhasil.'
                ));
            } else {
                echo json_encode(array(
                    'status_code' => '401',
                    'status_msg' => 'Mohon maaf password anda salah.'
                ));
            }
        } else if ($this->input->server('REQUEST_METHOD') == 'GET') {
            redirect(base_url('adm.php/auth'));
        }
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url('adm.php/auth'));
    }
}
