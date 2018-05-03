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
        $this->load->model('Pengguna', 'customers');
    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Pelanggan';
        $data->title_page = 'Pelanggan';
        $data->total_customers = $this->customers->count_rows();
        $data->customers = $this->customers->where('p_tipe',array('1','2'))->get_all();
        $this->load->view('Customers', $data);
    }

    public function by_vip()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Pelanggan VIP';
        $data->title_page = 'Pelanggan VIP';
        $data->total_customers = $this->customers->count_rows();
        $data->customers = $this->customers->where('p_tipe', '1')->get_all();
        $this->load->view('Customers', $data);
    }
    public function by_reseller()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Pelanggan Reseller';
        $data->title_page = 'Pelanggan Reseller';
        $data->total_customers = $this->customers->count_rows();
        $data->customers = $this->customers->where('p_tipe', '2')->get_all();
        $this->load->view('Customers', $data);
    }

    public function simpan()
    {
        // create object
        $data = new stdClass();

        // get guid form post
        $id = $this->input->post('id');

        // get user from database where guid
        $customer = $this->customers->where_p_kode($id)->get();

        if ($customer)
        {
            $customer = $this->customers->where_p_kode($id)->update(array(
                'p_tipe'    => $this->input->post('tipe'),
                'p_nama'    => $this->input->post('nama'),
                'p_username'    => $this->input->post('username'),
                'p_password'    => $this->input->post('password'),
                'p_email'       => $this->input->post('email'),
                'updated_by'        => $_SESSION['username'],
            ));
            if ($customer)
            {
                $data->berhasil = 'Data Pelaggan berhasil diperbarui.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('customers');
            }
            else
            {
                $data->gagal = 'Data Pelaggan gagal diperbarui.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('customers');
            }
        }
        else
        {
            $customer = $this->customers->insert(array(
                'p_kode'          => $this->input->post('id'),
                'p_tipe'          => $this->input->post('tipe'),
                'p_nama'          => $this->input->post('nama'),
                'p_username'      => $this->input->post('username'),
                'p_password'      => $this->input->post('password'),
                'p_email'         => $this->input->post('email'),
//                'created_by'      => $_SESSION['username'],
            ));
            if ($customer)
            {
                $data->berhasil = 'Data Pelanggan berhasil dibuat.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('customers');
            }
            else
            {
                $data->gagal = 'Data Pelanggan gagal dibuat.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('customers');
            }
        }
    }

    public function tambah()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Pelanggan > Tambah';
        $data->submit = 'Simpan';
        $data->kode = $this->customers->guid();
        $this->load->view('CRUD_Customers', $data);
    }

    public function detil($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Pelanggan > Detil';
        $data->customers = $this->customers->where('p_kode', $id)->get();
        $this->load->view('CRUD_Customers', $data);
    }

    public function ubah($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Pelanggan > Ubah';
        $data->submit = 'Ubah';
        $data->kode = $id;
        $data->customers = $this->customers->where('p_kode', $id)->get();

        $this->load->view('CRUD_Customers', $data);
    }

    public  function hapus($id)
    {
        $data = new stdClass();

        $customer = $this->customers->where('p_kode', $id)->delete();
        if ($customer)
        {
            $data->berhasil = 'Data Pelanggan berhasil dihapus';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('customers');
        }
        else
        {
            $data->gagal = 'Data Pelanggan gagal dihapus';
            $this->session->set_flashdata('berhasil', $data->gagal);

            redirect('customers');
        }
    }
}