<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ms_users', 'users');
    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | users';
        $data->total_users = $this->users->count_rows();
        $data->users = $this->users->get_all();
        $this->load->view('Users', $data);
    }

    public function tambah()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Users > Tambah';
        $data->submit = 'Simpan';

        $config = array(
            array(
                'field'     => 'username',
                'label'     => 'Username',
                'rules'     => 'required|is_unique[ms_users.users_username]|min_length[5]|max_length[50]|trim|xss_clean',
                'errors'    => array(
                    'xss_clean'     => 'Karakter tidak diperbolehkan.'
                )
            ),
            array(
                'field'     => 'password',
                'label'     => 'Password',
                'rules'     => 'required|min_length[8]|max_length[20]|trim|xss_clean',
                'errors'    => array(
                    'xss_clean'     => 'Karakter tidak diperbolehkan.'
                )
            ),
            array(
                'field'     => 'email',
                'label'     => 'Email',
                'rules'     => 'required|is_unique[ms_users.users_email]|valid_email|min_length[3]|max_length[50]|trim'
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() === false)
        {
            $this->load->view('CRUD_Users', $data);
        }
        else
        {
            $user = $this->users->insert(array(
                'users_id'          => $this->key->set_users(),
                'users_username'    => $this->input->post('username'),
                'users_password'    => $this->input->post('password'),
                'users_email'       => $this->input->post('email'),
                'created_by'        => $_SESSION['username'],
            ));
            if ($user)
            {
                $data->berhasil = 'Data user berhasil ditambahkan.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('users');
//                $this->load->view('CRUD_Users', $data);
            }
            else
            {
                $data->gagal = 'Data user gagal ditambahkan.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('users');
//                $this->load->view('CRUD_Users', $data);
            }
        }
    }

    public function detil($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Users > Detil';
        $data->users = $this->users->where('users_id', $id)->get();

        if ($this->input->server('REQUEST_METHOD') == 'GET')
        {
            $this->load->view('CRUD_Users', $data);
        }
        else
        {

        }

    }

    public function ubah($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Users > Ubah';
        $data->submit = 'Ubah';
        $data->users = $this->users->where('users_id', $id)->get();
        if ($this->input->server('REQUEST_METHOD') == 'GET')
        {
            $this->load->view('CRUD_Users', $data);
        }
        else
        {

        }
    }

    public  function hapus($id)
    {
        $data = new stdClass();

        $customer = $this->customers->where('users_id', $id)->delete();
        if ($customer)
        {
            $data->berhasil = 'Data User berhasil dihapus';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('users');
        }
        else
        {
            $data->gagal = 'Data User gagal dihapus';
            $this->session->set_flashdata('berhasil', $data->gagal);

            redirect('users');
        }
    }

    public function change_password()
    {
        $data = new stdClass();
        $config = array(
            array(
                'field'     => 'password',
                'label'     => 'Password',
                'rules'     => 'required|trim',
                'errors'    => array(
                    'required'      => '%s tidak boleh kosong.'
                )
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() === false)
        {
            $this->session->set_flashdata('validation', validation_errors());
            redirect('users');

        }
        else
        {
            $id = $this->input->post('id');
            $password = $this->input->post('password');
            $user = $this->users->where('users_id', $id)->update(array('users_password' => $password));

            if ($user)
            {
                $data->berhasil = 'Password berhasil diupdate';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('users');
            }
            else
            {
                $data->gagal = 'Password gagal diupdate.';
                $this->session->set_flashdata('berhasil', $data->gagal);
                redirect('users');
            }
        }
    }
}