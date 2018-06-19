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
        $this->data->alamat_kode = $this->alamat->guid();
        $this->data->nomor_order = $order;
        $this->data->orders = $this->order->with_order_detil()->where_o_nomor($order)->get();
        $this->data->orders_total = function () {
            $hasil = 0;
            foreach ($this->data->orders->order_detil as $order) {
                $hasil += $order->orders_detil_tharga;
            }
            return $hasil;
        };
        $this->load->view('Alamat', $this->data);
    }

    public function simpan()
    {
        $check_dropship = $this->input->post('check_dropship');
        $alamat_exist = $this->input->post('alamat_exist');
        $no_order = $this->input->post('nomor_order');

        $a_kode = $this->input->post('alamat_kode');
        $orders_noid = $this->get_o_kode($no_order);

        $nama_pengirim = $this->input->post('nama_pengirim');
        $kontak_pengirim = $this->input->post('kontak_pengirim');
        $nama_penerima = $this->input->post('nama_penerima');
        $kontak_penerima = $this->input->post('kontak_penerima');

        if (isset($alamat_exist) && $alamat_exist == true) {
            $pengguna_alamat = $this->pengguna_alamat->where_a_kode($a_kode)->get();
            if ($pengguna_alamat) {
                $nama_pengirim = $pengguna_alamat->pa_s_nama;
                $kontak_pengirim = $pengguna_alamat->pa_s_kontak;
                $nama_penerima = $pengguna_alamat->pa_r_nama;
                $kontak_penerima = $pengguna_alamat->pa_r_kontak;
            }
            if (isset($check_dropship) && $check_dropship == true) {
                $this->order_pengiriman->insert(array(
                    'orders_noid' => $orders_noid,
                    'alamat_kode' => $a_kode,
                    'orders_pengiriman_s_nama' => $nama_pengirim,
                    'orders_pengiriman_s_kontak' => $kontak_pengirim,
                    'orders_pengiriman_r_nama' => $nama_penerima,
                    'orders_pengiriman_r_kontak' => $kontak_penerima
                ));

                $this->order->where('orders_noid', $orders_noid)->update(array('orders_status' => 1));
            } else {
                $this->order_pengiriman->insert(array(
                    'orders_noid' => $orders_noid,
                    'alamat_kode' => $a_kode,
                    'orders_pengiriman_r_nama' => $nama_penerima,
                    'orders_pengiriman_r_kontak' => $kontak_penerima
                ));
                $this->order->where('orders_noid', $orders_noid)->update(array('orders_status' => 1));
            }

        } else {

            $this->alamat->insert(array(
                'alamat_kode' => $a_kode,
                'alamat_provinsi' => $this->input->post('provinsi'),
                'alamat_kabupaten' => $this->input->post('kabupaten'),
                'alamat_kecamatan' => $this->input->post('kecamatan'),
                'alamat_desa' => $this->input->post('kelurahan'),
                'alamat_kodepos' => $this->input->post('kodepos'),
                'alamat_deskripsi' => $this->input->post('alamat'),
            ));
            $this->pengguna_alamat->insert(array(
                'pa_kode' => $this->pengguna_alamat->guid(),
                'alamat_kode' => $a_kode,
                'pengguna_kode' => $_SESSION['id'],
                'pa_s_nama' => $nama_pengirim,
                'pa_s_kontak' => $kontak_pengirim,
                'pa_r_nama' => $nama_penerima,
                'pa_r_kontak' => $kontak_penerima
            ));

            if (isset($check_dropship) && $check_dropship == true) {
                $this->order_pengiriman->insert(array(
                    'orders_noid' => $orders_noid,
                    'alamat_kode' => $a_kode,
                    'orders_pengiriman_s_nama' => $nama_pengirim,
                    'orders_pengiriman_s_kontak' => $kontak_pengirim,
                    'orders_pengiriman_r_nama' => $nama_penerima,
                    'orders_pengiriman_r_kontak' => $kontak_penerima
                ));
                $this->order->where('orders_noid', $orders_noid)->update(array('orders_status' => 1));
            } else {
                $this->order_pengiriman->insert(array(
                    'orders_noid' => $orders_noid,
                    'alamat_kode' => $a_kode,
                    'orders_pengiriman_r_nama' => $nama_penerima,
                    'orders_pengiriman_r_kontak' => $kontak_penerima
                ));
                $this->order->where('orders_noid', $orders_noid)->update(array('orders_status' => 1));
            }

        }


        redirect('checkout/' . $no_order . '/ongkir_transfer');
    }

    private function get_o_kode($no_order)
    {
        $hasil = $this->order->where_o_nomor($no_order)->get();
        return $hasil->orders_noid;
    }
}