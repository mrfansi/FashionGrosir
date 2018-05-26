<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('user_agent');
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
        $this->load->model('Pengguna_m', 'pengguna');

        // load library
        $this->load->library('form_validation');

        // buat validation
        $validation = array(
            array(
                'field' => 'email',
                'label' => 'Email',
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

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('Login');
        } else {
            // get post
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // get database
            $user = $this->pengguna->where(array(
                'p_email' => $email,
                'p_password' => $password
            ))->get();

            if ($user) {
                // Update IP Address
                $this->pengguna->where(array(
                    'p_email' => $email,
                ))->update(array(
                    'p_ipaddr' => $_SERVER['REMOTE_ADDR'],
                    'p_login_terakhir' => date('Y-m-d H:i:s')
                ));

                $sessiondata = array(
                    'id' => $user->p_kode,
                    'nama' => $user->p_nama,
                    'email' => $user->p_email,
                    'tipe' => $user->p_tipe,
                    'isonline' => true
                );
                $this->session->set_userdata($sessiondata);


                redirect('/');
            } else {
                $data->log = 'Username atau Password salah.';
                $this->load->view('Login', $data);
            }
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('tipe');
        $this->session->unset_userdata('isonline');
        redirect('/');
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */