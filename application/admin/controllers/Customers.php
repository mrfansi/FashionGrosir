<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Customers extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ms_customers', 'customers');
    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Customers';
        $data->total_customers = $this->customers->count_rows();
        $data->customers = $this->customers->get_all();
        $this->load->view('Customers', $data);
    }

    public function tambah()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Customers > Tambah';
        $data->submit = 'Simpan';

        $config = array(
            array(
                'field'     => 'username',
                'label'     => 'Username',
                'rules'     => 'required|is_unique[ms_users.users_username]|min_length[5]|max_length[20]|trim'
            ),
            array(
                'field'     => 'password',
                'label'     => 'Password',
                'rules'     => 'required|min_length[8]|max_length[20]|trim'
            ),
            array(
                'field'     => 'email',
                'label'     => 'Email',
                'rules'     => 'required|is_unique[ms_users.users_email]|valid_email|min_length[3]|max_length[20]|trim'
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() === false)
        {
            $this->load->view('CRUD_Customers', $data);
        }
        else
        {
            $customer = $this->customers->insert(array(
                'customers_id'          => $this->key->set_customers(),
                'customers_username'    => $this->input->post('username'),
                'customers_password'    => $this->input->post('password'),
                'customers_email'       => $this->input->post('email'),
                'customers_ipaddr'      => 'NULL',
                'created_by'            => $_SESSION['username'],
            ));
            if ($customer)
            {
                $data->berhasil = 'Data Customer berhasil ditambahkan.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('customers');
//                $this->load->view('CRUD_Customers', $data);
            }
            else
            {
                $data->gagal = 'Data Customer gagal ditambahkan.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('customers');
//                $this->load->view('CRUD_Customers', $data);
            }
        }
    }

    public function detil($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Customers > Detil';
        $data->customers = $this->customers->where('customers_id', $id)->get();

        if ($this->input->server('REQUEST_METHOD') == 'GET')
        {
            $this->load->view('CRUD_Customers', $data);
        }
        else
        {

        }

    }

    public function ubah($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Customers > Ubah';
        $data->submit = 'Ubah';
        $data->customers = $this->customers->where('customers_id', $id)->get();
        if ($this->input->server('REQUEST_METHOD') == 'GET')
        {
            $this->load->view('CRUD_Customers', $data);
        }
        else
        {

        }
    }

    public  function hapus($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Customers';
        $data->customers = $this->customers->where('customers_id', $id)->get();
        if ($this->input->server('REQUEST_METHOD') == 'GET')
        {
            $this->load->view('CRUD_Customers', $data);
        }
        else
        {

        }
    }

    public function change_password()
    {
        $data = new stdClass();
        $config = array(
            array(
                'field'     => 'password',
                'label'     => 'Password',
                'rules'     => 'required|trim'
            ),
            array(
                'field'     => 'kopassword',
                'label'     => 'Konfirmasi Password',
                'rules'     => 'required|matches[password]|trim'
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() === false)
        {
            $this->session->set_flashdata('validation', validation_errors());
            redirect('customers');

        }
        else
        {
            $id = $this->input->post('id');
            $password = $this->input->post('kopassword');
            $customer = $this->customers->where('customers_id', $id)->update(array('customers_password' => $password));

            if ($customer)
            {
                $data->berhasil = 'Password berhasil diupdate';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('customers');
            }
            else
            {
                $data->gagal = 'Password gagal diupdate.';
                $this->session->set_flashdata('berhasil', $data->gagal);
                redirect('customers');
            }
        }
    }
}