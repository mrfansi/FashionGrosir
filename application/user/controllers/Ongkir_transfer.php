<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir_transfer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->isonline) {
            redirect('login');
        }

        $this->load->library('Ongkir', 'ongkir');
    }

    public function index()
    {
        $this->load->view('Ongkir_transfer', $this->data);

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

        $this->data->pengiriman = $this->get_biaya($order)->rajaongkir->results;
        $this->load->view('Ongkir_transfer', $this->data);
    }

    private function get_biaya($nomor_order)
    {
        $hasil = new stdClass();
        $alamat = $this->order_pengiriman->with_order('where:o_noorder = \'' . $nomor_order . '\'')->get()->a_kode;
        $dst_id = $this->alamat->where('a_kode', $alamat)->get()->a_kabupaten;
        $ori_id = $this->toko->get()->t_kabupaten;
        $dst = (string)$this->kabupaten->where('kabupaten_id', $dst_id)->get()->kabupaten_nama;
        $origin = (string)$this->kabupaten->where('kabupaten_id', $ori_id)->get()->kabupaten_nama;

        $ongkir = json_decode($this->ongkir->city(), true);
        $ongkir = $ongkir['rajaongkir']['results'];

        foreach ($ongkir as $key => $value) {

            if (strpos($dst, (string)$ongkir[$key]['city_name'])) {
                $hasil->dst_id = $ongkir[$key]['city_id'];
                $hasil->dst_name = $ongkir[$key]['city_name'];
            }

            if (strpos($origin, (string)$ongkir[$key]['city_name'])) {
                $hasil->origin_id = $ongkir[$key]['city_id'];
                $hasil->origin_name = $ongkir[$key]['city_name'];
            }

        }

        $cost = $this->ongkir->cost($hasil->origin_id, $hasil->dst_id, $this->get_berat($nomor_order), "jne");
        echo '<script>console.log(' . $cost . ')</script>';
        return json_decode($cost);
    }

    private function get_berat($nomor_order)
    {
        $orders = $this->order->with_order_detil()->where('o_noorder', $nomor_order)->get();
        foreach ($orders->order_detil as $detil) {
            $item_berat = (int)$this->item_detil->with_item()->where('ide_kode', $detil->ide_kode)->get()->item->i_berat;
            $item_qty = (int)$detil->od_qty;

            $hasil = $item_berat * $item_qty;
        }

        return $hasil;
    }

    public function simpan()
    {
        $o_kode = $this->input->post('o_kode');

        $nomor_order = $this->input->post('nomor_order');

        $order_ongkir = $this->order_ongkir->where('o_kode', $o_kode)->get();
        $order_payment = $this->order_payment->where('o_kode', $o_kode)->get();

        if ($order_ongkir && $order_payment) {
            $this->order_ongkir->where('o_kode', $o_kode)->update(array(
                'oo_kode' => $this->order_ongkir->guid(),
                'oo_nama' => $this->input->post('nama'),
                'oo_deskripsi' => $this->input->post('deskripsi'),
                'oo_estimasi' => $this->input->post('estimasi'),
                'oo_biaya' => $this->input->post('biaya')
            ));

            $this->order_payment->where('o_kode', $o_kode)->update(array(
                'b_kode' => $this->input->post('bank_id')
            ));

            $this->order->where('o_kode', $o_kode)->update(array('o_status' => 2));
        } else {
            $this->order_ongkir->insert(array(
                'oo_kode' => $this->order_ongkir->guid(),
                'oo_nama' => $this->input->post('nama'),
                'oo_deskripsi' => $this->input->post('deskripsi'),
                'oo_estimasi' => $this->input->post('estimasi'),
                'oo_biaya' => $this->input->post('biaya'),
                'o_kode' => $o_kode
            ));

            $this->order_payment->insert(array(
                'o_kode' => $o_kode,
                'b_kode' => $this->input->post('bank_id')

            ));
            $this->order->where('o_kode', $o_kode)->update(array('o_status' => 2));
        }

        redirect('checkout/' . $nomor_order . '/konfirmasi_pembayaran');
    }

}