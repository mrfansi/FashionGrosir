<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Artikel extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->isonline) {
            redirect('login');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->session->set_userdata('redirect', current_url());
            }
        }

        $config = array(
            'field' => 'artikel_judul',
            'title' => 'title',
            'table' => 'artikel',
            'id' => 'artikel_id',
        );
        $this->load->library('slug', $config);
    }

    public function index()
    {
        $this->data->title = $this->data->brandname . ' | Artikel';
        $this->data->title_page = 'Artikel';
        $this->data->total_artikel = $this->artikel->count_rows();
        $this->data->artikels = $this->artikel->get_all();
        $this->load->view('Artikel', $this->data);
    }

    public function tambah()
    {
        $this->data->title = $this->data->brandname . ' | Artikel > Tambah';
        $this->data->submit = 'Simpan';
        $this->data->kode = $this->artikel->guid();
        $this->data->artikels = $this->artikel->get_all();
        $this->load->view('CRUD_Artikel', $this->data);
    }

    public function ubah($id)
    {
        $this->data->title = $this->data->brandname . ' | Artikel > Ubah';
        $this->data->submit = 'Ubah';
        $this->data->kode = $id;
        $this->data->artikel = $this->artikel->where('artikel_kode', $id)->get();
        $this->data->artikels = $this->artikel->get_all();
        $this->load->view('CRUD_Artikel', $this->data);
    }

    public function simpan()
    {
        // get guid form post
        $id = $this->input->post('id');

        // get user from database where guid
        $artikel = $this->artikel->where_ar_kode($id)->get();

        if ($artikel) {
            $artikel = $this->artikel->where_ar_kode($id)->update(array(
                'artikel_judul' => $this->input->post('judul'),
                'artikel_content' => $this->input->post('content'),
                'artikel_url' => $this->slug->create_uri(array('title' => $this->input->post('judul'))),
                'artikel_ispromo' => $this->input->post('promo'),
                'artikel_isblog' => $this->input->post('blog'),
                'artikel_isresi' => $this->input->post('resi'),
                'artikel_isnotifikasi' => $this->input->post('notikasi'),
                'artikel_isaktif' => $this->input->post('aktif')
            ));
            if ($artikel) {
                $this->data->berhasil = 'Artikel berhasil diperbarui.';
                $this->session->set_flashdata('berhasil', $this->data->berhasil);

                redirect('artikel');
            } else {
                $this->data->gagal = 'Artikel gagal diperbarui.';
                $this->session->set_flashdata('gagal', $this->data->gagal);

                redirect('artikel');
            }
        } else {
            $artikel = $this->artikel->insert(array(
                'artikel_kode' => $this->input->post('id'),
                'artikel_judul' => $this->input->post('judul'),
                'artikel_content' => $this->input->post('content'),
                'artikel_url' => $this->slug->create_uri(array('title' => $this->input->post('judul'))),
                'artikel_ispromo' => $this->input->post('promo'),
                'artikel_isblog' => $this->input->post('blog'),
                'artikel_isresi' => $this->input->post('resi'),
                'artikel_isnotifikasi' => $this->input->post('notikasi'),
                'artikel_isaktif' => $this->input->post('aktif')
            ));
            if ($artikel) {
                $this->data->berhasil = 'Artikel berhasil dibuat.';
                $this->session->set_flashdata('berhasil', $this->data->berhasil);

                redirect('artikel');
            } else {
                $this->data->gagal = 'Artikel gagal dibuat.';
                $this->session->set_flashdata('gagal', $this->data->gagal);

                redirect('artikel');
            }
        }
    }

    public function hapus($id)
    {

        $artikel = $this->artikel->where('artikel_kode', $id)->delete();
        if ($artikel) {
            $this->data->berhasil = 'Artikel berhasil dihapus';
            $this->session->set_flashdata('berhasil', $this->data->berhasil);

            redirect('artikel');
        } else {
            $this->data->gagal = 'Artikel gagal dihapus';
            $this->session->set_flashdata('berhasil', $this->data->gagal);

            redirect('artikel');
        }
    }
}