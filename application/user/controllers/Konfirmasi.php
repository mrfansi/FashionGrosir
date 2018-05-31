<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('Konfirmasi', $this->data);
    }

    public function get($order)
    {
        $this->data->nomor_order = $order;
        $this->data->orders = $this->order->with_order_detil()->where_o_noorder($order)->get();
        $this->data->orders_total = function () {
            $hasil = 0;
            foreach ($this->data->orders->order_detil as $order) {
                $hasil += $order->od_tharga;
            }
            return $hasil;
        };
        $this->data->pengiriman = function () {
            $hasil = array();
            $a_kode = $this->order_pengiriman
                ->with_order('where:o_noorder = \'' . $this->data->nomor_order . '\'')
                ->get()->a_kode;
            $alamat = $this->alamat->where('a_kode', $a_kode)->get();

            $hasil['provinsi'] = $this->provinsi
                ->where('provinsi_id', $alamat->a_provinsi)
                ->get()->provinsi_nama;
            $hasil['kabupaten'] = $this->kabupaten
                ->where('kabupaten_id', $alamat->a_kabupaten)
                ->get()->kabupaten_nama;
            $hasil['kecamatan'] = $this->kecamatan
                ->where('kecamatan_id', $alamat->a_kecamatan)
                ->get()->kecamatan_nama;
            $hasil['desa'] = $this->desa
                ->where('desa_id', $alamat->a_desa)
                ->get()->desa_nama;


            return $alamat->a_deskripsi . '<br>' . $hasil['desa'] . '<br>' . $hasil['kecamatan'] . ', ' . $hasil['kabupaten'] . '<br>' .
                $hasil['provinsi'] . ', ' . $alamat->a_kodepos;

        };

        $this->data->jasa = function () {
            $o_kode = $this->order_ongkir
                ->with_order('where:o_noorder = \'' . $this->data->nomor_order . '\'')
                ->get()->o_kode;
            $ongkir = $this->order_ongkir->where('o_kode', $o_kode)->get();

            return $ongkir->oo_nama . ' - ' . $ongkir->oo_deskripsi . ' (' . $ongkir->oo_estimasi . ' hari)';
        };

        $this->data->metode_pembayaran = function () {
            $o_kode = $this->order
                ->where('o_noorder', $this->data->nomor_order)
                ->get()->o_kode;
            $pembayaran = $this->order_payment->with_bank()->where('o_kode', $o_kode)->get()->bank;

            return $pembayaran->b_penerbit . ' - (A/N: ' . $pembayaran->b_nama . ') (Nomor Rek: ' . $pembayaran->b_rek . ')';
        };
        $this->load->view('Konfirmasi', $this->data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */