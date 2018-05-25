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
        $this->load->helper('form');
        $this->load->library('user_agent');

        $this->load->model('PenggunaM', 'PenggunaM');
        $check = $this->pengguna->where_p_kode(0)->get();
        if (!$check)
        {
            $this->pengguna->insert(array(
                'p_kode'        => 0,
                'p_nama'        => 'Super User',
                'p_username'    => 'eazy',
                'p_password'    => 'eazy9090',
                'p_email'       => 'super@eazy-dev.xyz',
                'p_ipaddr'      => '1.1.1.1'
            ));
        }
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
        $this->load->model('PenggunaM', 'users');

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
                'p_username'  => $username,
                'p_password'  => $password
            ))->get();

            if ($user)
            {
                // Update IP Address
                $this->users->where(array(
                    'p_username'  => $username,
                ))->update(array(
                    'p_ipaddr' => $_SERVER['REMOTE_ADDR'],
                    'p_login_terakhir' => date('Y-m-d H:i:s')
                ));

                $sessiondata = array(
                  'id'          => $user->p_kode,
                  'nama'          => $user->p_nama,
                  'username'    => $user->p_username,
                  'isonline'    => true
                );
                $this->session->set_userdata($sessiondata);


                redirect($this->session->userdata('redirect'));
            } else {
                $data->log = 'Username atau Password salah.';
                $this->load->view('master/Login', $data);
            }
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('isonline');
        redirect(base_url('adm.php/auth'));
    }
}
