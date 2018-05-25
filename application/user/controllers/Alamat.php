<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alamat extends MY_Controller
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
        $this->load->view('Alamat', $this->data);

    }

    public function get($order)
    {
        $this->data->a_kode = $this->alamat->guid();
        $this->data->nomor_order = $order;
        $this->data->orders = $this->order->with_order_detil()->where_o_noorder($order)->get();
        $this->data->orders_total = function ()
        {
            $hasil = 0;
            foreach ($this->data->orders->order_detil as $order) {
                $hasil +=  $order->od_tharga;
            }
            return $hasil;
        };
        $this->load->view('Alamat', $this->data);
    }

    public function simpan()
    {
        $check_simpan = $this->input->post('check_simpan');
        $check_dropship = $this->input->post('check_dropship');
        $simpan = $this->input->post('simpan');

        $a_kode = $this->input->post('a_kode');
        $o_kode = $this->input->post('o_kode');

        $nama_pengirim = $this->input->post('nama_pengirim');
        $kontak_pengirim = $this->input->post('kontak_pengirim');
        $nama_penerima = $this->input->post('nama_penerima');
        $kontak_penerima = $this->input->post('kontak_penerima');

        if (isset($simpan) && $simpan == true)
        {
            $pengguna_alamat = $this->pengguna_alamat->where_a_kode($a_kode)->get();
            if($pengguna_alamat) {
                $nama_pengirim = $pengguna_alamat->pa_s_nama;
                $kontak_pengirim = $pengguna_alamat->pa_s_kontak;
                $nama_penerima = $pengguna_alamat->pa_r_nama;
                $kontak_penerima = $pengguna_alamat->pa_r_kontak;
            }
            if (isset($check_dropship) && $check_dropship == true)
            {
                $this->order_pengiriman->insert(array(
                    'op_kode' => $this->order_pengiriman->guid(),
                    'o_kode' => $o_kode,
                    'a_kode' => $a_kode,
                    'op_s_nama' => $nama_pengirim,
                    'op_s_kontak' => $kontak_pengirim,
                    'op_r_nama' => $nama_penerima,
                    'op_r_kontak' => $kontak_penerima
                ));
            } else {
                $this->order_pengiriman->insert(array(
                    'op_kode' => $this->order_pengiriman->guid(),
                    'o_kode' => $o_kode,
                    'a_kode' => $a_kode,
                    'op_r_nama' => $nama_penerima,
                    'op_r_kontak' => $kontak_penerima
                ));
            }

        } else {
            if (isset($check_simpan) && $check_simpan == true)
            {
                $this->alamat->insert(array(
                    'a_kode'        => $a_kode,
                    'a_nama'        => $this->input->post('nama_alamat'),
                    'a_provinsi'        => $this->input->post('provinsi'),
                    'a_kabupaten'        => $this->input->post('kabupaten'),
                    'a_kecamatan'        => $this->input->post('kecamatan'),
                    'a_desa'        => $this->input->post('kelurahan'),
                    'a_kodepos'        => $this->input->post('kodepos'),
                    'a_deskripsi'        => $this->input->post('alamat'),
                ));
                $this->pengguna_alamat->insert(array(
                    'pa_kode'        => $this->pengguna_alamat->guid(),
                    'a_kode'         => $a_kode,
                    'p_kode'         => $_SESSION['id'],
                    'pa_s_nama'      => $nama_pengirim,
                    'pa_s_kontak'    => $kontak_pengirim,
                    'pa_r_nama'    => $nama_penerima,
                    'pa_r_kontak'    => $kontak_penerima
                ));

                if (isset($check_dropship) && $check_dropship == true)
                {
                    $this->order_pengiriman->insert(array(
                        'op_kode' => $this->order_pengiriman->guid(),
                        'o_kode' => $o_kode,
                        'a_kode' => $a_kode,
                        'op_s_nama' => $nama_pengirim,
                        'op_s_kontak' => $kontak_pengirim,
                        'op_r_nama' => $nama_penerima,
                        'op_r_kontak' => $kontak_penerima
                    ));
                } else {
                    $this->order_pengiriman->insert(array(
                        'op_kode' => $this->order_pengiriman->guid(),
                        'o_kode' => $o_kode,
                        'a_kode' => $a_kode,
                        'op_r_nama' => $nama_penerima,
                        'op_r_kontak' => $kontak_penerima
                    ));
                }
            } else {
                $this->alamat->insert(array(
                    'a_kode'        => $a_kode,
                    'a_nama'        => date('Ymd-His'),
                    'a_provinsi'        => $this->input->post('provinsi'),
                    'a_kabupaten'        => $this->input->post('kabupaten'),
                    'a_kecamatan'        => $this->input->post('kecamatan'),
                    'a_desa'        => $this->input->post('kelurahan'),
                    'a_kodepos'        => $this->input->post('kodepos'),
                    'a_deskripsi'        => $this->input->post('alamat'),
                ));

                if (isset($check_dropship) && $check_dropship == true)
                {
                    $this->order_pengiriman->insert(array(
                        'op_kode' => $this->order_pengiriman->guid(),
                        'o_kode' => $o_kode,
                        'a_kode' => $a_kode,
                        'op_s_nama' => $nama_pengirim,
                        'op_s_kontak' => $kontak_pengirim,
                        'op_r_nama' => $nama_penerima,
                        'op_r_kontak' => $kontak_penerima
                    ));
                } else {
                    $this->order_pengiriman->insert(array(
                        'op_kode' => $this->order_pengiriman->guid(),
                        'o_kode' => $o_kode,
                        'a_kode' => $a_kode,
                        'op_r_nama' => $nama_penerima,
                        'op_r_kontak' => $kontak_penerima
                    ));
                }
            }
        }




        print_r($_POST);
    }
}