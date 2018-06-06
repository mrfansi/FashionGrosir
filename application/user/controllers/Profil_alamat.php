<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_alamat extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->isonline) {
            redirect('login');
        }
    }

    public function index()
    {
        $this->load->view('Profil_alamat', $this->data);
    }

    public function simpan()
    {
        $a_kode = $this->input->post('a_kode');

        $alamat = $this->alamat->where('a_kode', $a_kode)->get();

        if ($alamat) {
            $alamat = $this->alamat->where('a_kode', $a_kode)->update(array(
                'a_provinsi' => $this->input->post('provinsi'),
                'a_kabupaten' => $this->input->post('kabupaten'),
                'a_kecamatan' => $this->input->post('kecamatan'),
                'a_desa' => $this->input->post('kelurahan'),
                'a_kodepos' => $this->input->post('kodepos'),
                'a_deskripsi' => $this->input->post('alamat')
            ));

            $alamat_pengguna = $this->pengguna_alamat->where('a_kode', $a_kode)->update(array(
                'p_kode' => $_SESSION['id'],
                'pa_r_nama' => $this->input->post('nama_penerima'),
                'pa_r_kontak' => $this->input->post('kontak_penerima'),
                'pa_s_nama' => $this->input->post('nama_pengirim'),
                'pa_s_kontak' => $this->input->post('kontak_pengirim'),
            ));

            if ($alamat && $alamat_pengguna) {
                $this->data->berhasil = 'Alamat berhasil diupdate.';
                $this->session->set_flashdata('berhasil', $this->data->berhasil);

                redirect('profil_alamat');
            } else {
                $this->data->gagal = 'Alamat gagal diupdate.';
                $this->session->set_flashdata('gagal', $this->data->gagal);

                redirect('profil_alamat');
            }
        }
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */