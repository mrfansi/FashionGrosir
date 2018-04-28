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
        $this->load->model('Tr_customers_pengiriman', 'pengiriman');
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
                'field' => 'realname',
                'label' => 'Nama',
                'rules' => 'required|min_length[5]|max_length[50]|trim'
            ),
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|is_unique[ms_users.users_username]|min_length[5]|max_length[50]|trim'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[8]|max_length[20]|trim'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|is_unique[ms_users.users_email]|valid_email|min_length[3]|max_length[50]|trim'
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() === false) {
            $this->load->view('CRUD_Customers', $data);
        } else {
            $customer = $this->customers->insert(array(
                'customers_id' => $this->key->set_customers(),
                'customers_realname' => $this->input->post('realname'),
                'customers_username' => $this->input->post('username'),
                'customers_password' => $this->input->post('password'),
                'customers_email' => $this->input->post('email'),
                'customers_ipaddr' => 'NULL',
                'created_by' => $_SESSION['username'],
            ));
            if ($customer) {
                $data->berhasil = 'Data Customer berhasil ditambahkan.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('customers');
//                $this->load->view('CRUD_Customers', $data);
            } else {
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

        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('CRUD_Customers', $data);
        } else {

        }

    }

    public function ubah($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Customers > Ubah';
        $data->submit = 'Ubah';
        $data->customers = $this->customers->where('customers_id', $id)->get();
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('CRUD_Customers', $data);
        } else {

        }
    }

    public function hapus($id)
    {
        $data = new stdClass();

        $customer = $this->customers->where('customers_id', $id)->delete();
        if ($customer) {
            $data->berhasil = 'Data Customer berhasil dihapus';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('customers');
        } else {
            $data->gagal = 'Data Customer gagal dihapus';
            $this->session->set_flashdata('berhasil', $data->gagal);

            redirect('customers');
        }
    }

    public function alamat($id, $crud = '')
    {
        $data = new stdClass();
        $data->id = $id;
        $data->customer = $this->customers->where('customers_id', $id)->get();
        $data->title = 'Fashion Grosir | Customers > Alamat > ' . $data->customer->customers_realname;
        $data->addresses = $this->pengiriman->with_customers('field:customers_realname')->where('customers_id', $id)->get();


        if ($crud == 'tambah') {
            $data->title = $data->title . ' > Tambah';
            $data->submit = 'Simpan';

            $config = array(
                array(
                    'field' => 'judul',
                    'label' => 'Judul',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s tidak boleh kosong'
                    )
                ),
                array(
                    'field' => 'provinsi',
                    'label' => 'Provinsi',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s tidak boleh kosong'
                    )
                ),
                array(
                    'field' => 'kabupaten',
                    'label' => 'Kabupaten',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s tidak boleh kosong'
                    )
                ),
                array(
                    'field' => 'kecamatan',
                    'label' => 'Kecamatan',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s tidak boleh kosong'
                    )
                ),
                array(
                    'field' => 'desa',
                    'label' => 'Desa',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s tidak boleh kosong'
                    )
                ),
                array(
                    'field' => 'kodepos',
                    'label' => 'Kodepos',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s tidak boleh kosong'
                    )
                ),
                array(
                    'field' => 'alamat_lengkap',
                    'label' => 'Alamat Lengkap',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s tidak boleh kosong'
                    )
                ),
                array(
                    'field' => 'penerima_nama',
                    'label' => 'Nama Penerima',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s tidak boleh kosong'
                    )
                ),
                array(
                    'field' => 'penerima_nomor',
                    'label' => 'Nomor Kontak',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s tidak boleh kosong'
                    )
                ),
            );

            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() === false) {
                $this->load->view('CRUD_Customers_alamat', $data);
            } else {
                $alamat = $this->pengiriman->insert(array(
                    'pengiriman_judul' => $this->input->post('judul'),
                    'pengiriman_provinsi' => $this->input->post('provinsi'),
                    'pengiriman_kabupaten' => $this->input->post('kabupaten'),
                    'pengiriman_kecamatan' => $this->input->post('kecamatan'),
                    'pengiriman_desa' => $this->input->post('desa'),
                    'pengiriman_kodepos' => $this->input->post('kodepos'),
                    'pengiriman_alamat' => $this->input->post('alamat_lengkap'),
                    'penerima_nama' => $this->input->post('penerima_nama'),
                    'penerima_nomor' => $this->input->post('penerima_nomor'),
                ));


                if ($alamat)
                {
                    $data->berhasil = 'Alamat untuk Customer ' . $data->customer->customers_realname . ' berhasil ditambahkan';
                    $this->session->set_flashdata('berhasil', $data->berhasil);

                    redirect('customers/alamat/' . $id );
                }
                else
                {
                    $data->gagal = 'Alamat untuk Customer ' . $data->customer->customers_realname . ' gagal ditambahkan';
                    $this->session->set_flashdata('berhasil', $data->gagal);

                    redirect('customers/alamat/' . $id );
                }
            }

        } else if ($crud == 'detil') {

        } else if ($crud == 'ubah') {

        } else if ($crud == 'hapus') {

        } else {
            $this->load->view('Customers_alamat', $data);
        }
    }

    public function change_password()
    {
        $data = new stdClass();
        $config = array(
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => '%s tidak boleh kosong.'
                )
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('validation', validation_errors());
            redirect('customers');
        } else {
            $id = $this->input->post('id');
            $password = $this->input->post('password');
            $customer = $this->customers->where('customers_id', $id)->update(array('customers_password' => $password));

            if ($customer) {
                $data->berhasil = 'Password berhasil diupdate';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('customers');
            } else {
                $data->gagal = 'Password gagal diupdate.';
                $this->session->set_flashdata('berhasil', $data->gagal);
                redirect('customers');
            }
        }
    }
}