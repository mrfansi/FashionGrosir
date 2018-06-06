<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
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

    public function forgot()
    {
        $this->load->view('Forgot', $this->data);
    }

    public function register()
    {
        $this->load->view('Register', $this->data);
    }

    public function forgot_post()
    {
        $this->data->email = $this->input->post('email');

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.fashiongrosir-ind.com',
            'smtp_port' => 465,
            'smtp_user' => 'dont-reply@fashiongrosir-ind.com',
            'smtp_pass' => 'p1nacate88',
            'smtp_timeout' => '4',
            'mailtype' => 'html',
            'newline' => "\r\n",
            'charset' => 'utf-8',
            'validation' => TRUE
        );
        $this->email->initialize($config);
        $this->email->from('dont-reply@fashiongrosir-ind.com', 'Fashion Grosir');
        $this->email->to($this->data->email);
        $this->email->subject('Testing');

//        $body = $this->load->view('email/template', $this->data);

        $this->email->message('Testing');

        $this->email->send(FALSE);

        $hasil = $this->email->print_debugger();
        echo '<script>console.log(' . $hasil . ')</script>';

    }

    public function register_post()
    {
        $this->data->nama = $this->input->post('nama');
        $this->data->email = $this->input->post('email');
        $this->data->telp = $this->input->post('notelp');
        $this->data->guid = $this->pengguna->guid();

        $register = $this->pengguna->insert(array(
            'p_kode' => $this->data->guid,
            'p_username' => $this->data->email,
            'p_nama' => $this->data->nama,
            'p_email' => $this->data->email,
            'p_password' => 'dasdasjghfhrneb',
            'p_tipe' => 2,
            'p_telp' => $this->data->telp
        ));

        if ($register) {
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://mail.fashiongrosir-ind.com',
                'smtp_port' => 465,
                'smtp_user' => 'dont-reply@fashiongrosir-ind.com',
                'smtp_pass' => 'p1nacate88',
                'smtp_timeout' => '4',
                'mailtype' => 'html',
                'newline' => "\r\n",
                'charset' => 'utf-8',
                'validation' => TRUE
            );
            $this->email->initialize($config);
            $this->email->from('dont-reply@fashiongrosir-ind.com', 'Fashion Grosir');
            $this->email->to($this->data->email);
            $this->email->subject('Aktivasi Akun Pengguna Fashion Grosir');

            $body = $this->load->view('email/template', $this->data);

            $this->email->message($body);

            $this->email->send(FALSE);

            $hasil = $this->email->print_debugger();
            echo '<script>console.log(' . $hasil . ')</script>';
            echo $body;
//            $this->data->berhasil = 'Silahkan cek email untuk aktivasi akun anda.';
//            $this->session->set_flashdata('berhasil', $this->data->berhasil);
//
//            redirect('register');
        }

    }

    public function login()
    {
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
            $this->load->view('Login', $this->data);
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
                $this->data->log = 'Username atau Password salah.';
                $this->load->view('Login', $this->data);
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