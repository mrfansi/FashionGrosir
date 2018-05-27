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
    }

    public function index()
    {
        $this->load->view('Ongkir_transfer', $this->data);

    }

    public function get($order) {
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
        $this->load->view('Ongkir_transfer', $this->data);
    }

    public function simpan()
    {

    }
}