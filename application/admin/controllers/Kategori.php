<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Kategori extends MY_User
{
    public function __construct()
    {
        parent::__construct();
        $config = array(
            'field' => 'k_nama',
            'title' => 'title',
            'table' => 'kategori',
            'id' => 'k_id',
        );
        $this->load->library('slug', $config);

        $this->load->model('Kategori_m', 'kategori');

//        $cek = $this->kategori->where_k_kode('0')->get();
//        if ($cek == null)
//        {
//            $this->kategori->insert(array(
//                'k_kode'     => 0,
//                'k_nama'     => 'Non Kategori'
//            ));
//        }
    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Kategori';
        $data->title_page = 'Kategori';
        $data->total_kategori = $this->kategori->count_rows();
        $data->kategoris = $this->kategori->get_all();
        $this->load->view('Kategori', $data);
    }

    public function tambah()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Kategori > Tambah';
        $data->submit = 'Simpan';
        $data->kode = $this->kategori->guid();
        $data->kategoris = $this->kategori->where_k_parent_kode(0)->get_all();
        $this->load->view('CRUD_Kategori', $data);
    }

    public function ubah($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Pelanggan > Ubah';
        $data->submit = 'Ubah';
        $data->kode = $id;
        $data->kategori = $this->kategori->where('k_kode', $id)->get();
        $data->kategoris = $this->kategori->where_k_parent_kode(0)->get_all();
        $this->load->view('CRUD_Kategori', $data);
    }

    public function simpan()
    {
        // create object
        $data = new stdClass();

        // get guid form post
        $id = $this->input->post('id');

        // get user from database where guid
        $kategori = $this->kategori->where_k_kode($id)->get();

        if ($kategori) {
            $kategori = $this->kategori->where_k_kode($id)->update(array(
                'k_parent_kode' => $this->input->post('parent'),
                'k_nama' => $this->input->post('nama'),
                'k_url'  => $this->slug->create_uri(array('title' => $this->input->post('nama')))
            ));
            if ($kategori) {
                $data->berhasil = 'Data Kategori berhasil diperbarui.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('kategori');
            } else {
                $data->gagal = 'Data Kategori gagal diperbarui.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('kategori');
            }
        } else {
            $kategori = $this->kategori->insert(array(
                'k_kode' => $this->input->post('id'),
                'k_parent_kode' => $this->input->post('parent'),
                'k_nama' => $this->input->post('nama'),
                'k_url'  => $this->slug->create_uri(array('title' => $this->input->post('nama')))
            ));
            if ($kategori) {
                $data->berhasil = 'Data Kategori berhasil dibuat.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('kategori');
            } else {
                $data->gagal = 'Data Kategori gagal dibuat.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('kategori');
            }
        }
    }

    public function hapus($id)
    {
        $data = new stdClass();

        $kategori = $this->kategori->where('k_kode', $id)->delete();
        if ($kategori) {
            $data->berhasil = 'Data Kategori berhasil dihapus';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('kategori');
        } else {
            $data->gagal = 'Data Kategori gagal dihapus';
            $this->session->set_flashdata('berhasil', $data->gagal);

            redirect('kategori');
        }
    }

    public function get($item)
    {
        $data = new stdClass();
        $data->members = $this->kategori->many_to_many_where($item);
        $this->load->view('Tabel_detil', $data);
    }
}