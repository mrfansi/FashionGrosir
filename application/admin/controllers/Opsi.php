<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Opsi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Toko_m', 'toko');
    }

    public function index() {
        // null object
        $data = new stdClass();
        // set title
        $data->title = 'Fashion Grosir | Opsi';
        $data->id = $this->toko->guid();
        $data->toko = $this->toko->get();
        $this->load->view('Opsi', $data);
    }

    public function simpan()
    {
        $data = new stdClass();
        $id = $this->input->post('t_kode');

        $toko = $this->toko->where('t_kode', $id)->get();

        if ($toko) {
            $toko = $this->toko->where('t_kode', $id)->update(array(
                't_nama' => $this->input->post('nama'),
                't_singkatan' => $this->input->post('singkatan'),
                't_url' => $this->input->post('url'),
                't_provinsi' => $this->input->post('provinsi'),
                't_kabupaten' => $this->input->post('kabupaten'),
                't_kecamatan' => $this->input->post('kecamatan'),
                't_desa' => $this->input->post('kelurahan'),
                't_kodepos' => $this->input->post('kodepos'),
                't_alamat' => $this->input->post('alamat'),
                't_email' => $this->input->post('email'),
                't_fb' => $this->input->post('facebook'),
                't_insta' => $this->input->post('instagram'),
                't_wa' => $this->input->post('whatsapp')
            ));

            if ($toko) {
                $data->berhasil = 'Informasi Toko berhasil diupdate.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('opsi');
            } else {
                $data->berhasil = 'Informasi Toko gagal diupdate.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('opsi');
            }
        } else {
            $toko = $this->toko->insert(array(
                't_kode' => $id,
                't_nama' => $this->input->post('nama'),
                't_singkatan' => $this->input->post('singkatan'),
                't_url' => $this->input->post('url'),
                't_provinsi' => $this->input->post('provinsi'),
                't_kabupaten' => $this->input->post('kabupaten'),
                't_kecamatan' => $this->input->post('kecamatan'),
                't_desa' => $this->input->post('kelurahan'),
                't_kodepos' => $this->input->post('kodepos'),
                't_alamat' => $this->input->post('alamat'),
                't_email' => $this->input->post('email'),
                't_fb' => $this->input->post('facebook'),
                't_insta' => $this->input->post('instagram'),
                't_wa' => $this->input->post('whatsapp')
            ));

            if ($toko) {
                $data->berhasil = 'Informasi Toko berhasil diupdate.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('opsi');
            } else {
                $data->berhasil = 'Informasi Toko gagal diupdate.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('opsi');
            }
        }
    }
}