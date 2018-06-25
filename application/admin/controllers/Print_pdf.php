<?php
/**
 * Created by PhpStorm.
 * User: Muhammad Irfan
 * Date: 6/25/2018
 * Time: 8:28 PM
 */

class Print_pdf extends MY_Controller
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

        $this->load->library('html2pdf');
    }

    public function slip_pengiriman($orders_noid)
    {
        $this->data->orders_noid = $orders_noid;
        $this->data->nama_nomor = function () {
            $order_pengiriman = $this->order_pengiriman->where('orders_noid', $this->data->orders_noid)->get();
            $hasil = new stdClass();
            $hasil->nama = $order_pengiriman->orders_pengiriman_r_nama;
            $hasil->kontak = $order_pengiriman->orders_pengiriman_r_kontak;

            return $hasil;
        };
        $this->data->pengiriman = function () {
            $hasil = new stdClass();
            $order_pengiriman = $this->order_pengiriman->where('orders_noid', $this->data->orders_noid)->get();
            $hasil->provinsi = $this->provinsi
                ->where('provinsi_id', $order_pengiriman->orders_pengiriman_provinsi)
                ->get()->provinsi_nama;
            $hasil->kabupaten = $this->kabupaten
                ->where('kabupaten_id', $order_pengiriman->orders_pengiriman_kabupaten)
                ->get()->kabupaten_nama;
            $hasil->kecamatan = $this->kecamatan
                ->where('kecamatan_id', $order_pengiriman->orders_pengiriman_kecamatan)
                ->get()->kecamatan_nama;
            $hasil->desa = $this->desa
                ->where('desa_id', $order_pengiriman->orders_pengiriman_desa)
                ->get()->desa_nama;


            return $order_pengiriman->orders_pengiriman_deskripsi . '<br>' . $hasil->desa . '<br>' . $hasil->kecamatan . ', ' . $hasil->kabupaten . '<br>' .
                $hasil->provinsi . ', ' . $order_pengiriman->orders_pengiriman_kodepos;

        };

        //Set folder to save PDF to
        $this->html2pdf->folder('./file/slip_pengiriman');

        //Set the filename to save/download as
        $this->html2pdf->filename('slip_pengiriman-' . $this->data->orders_noid . '.pdf');

        //Set the paper defaults
        $this->html2pdf->paper('a5', 'lanscape');

        // view
        $view = $this->load->view('Slip_pengiriman', $this->data);;

        //Load html view
        $this->html2pdf->html($view);
    }

    public function invoice($orders_noid)
    {


        //Set folder to save PDF to
        $this->html2pdf->folder('./file/slip_pengiriman');

        //Set the filename to save/download as
        $this->html2pdf->filename('test.pdf');

        //Set the paper defaults
        $this->html2pdf->paper('a5', 'landscape');

        // view
        $view = '';

        //Load html view
        $this->html2pdf->html($view);
    }

}