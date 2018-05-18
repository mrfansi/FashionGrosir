<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller
{
    public function __construct()
    {

        parent::__construct();
        // load model
        $this->load->model('Item_detil_m', 'item_detil');
        $this->load->model('Cart_m', 'cart');
        $this->load->model('Order_m', 'order');
        $this->load->model('Order_detil_m', 'order_detil');
    }

    public function index()
    {
        $data = new stdClass();
        $data->item = function ($ide_kode) {
            $item = $this->item_detil->with_item()->where_ide_kode($ide_kode)->get();
            return $item->item;
        };
        $data->carts = $this->cart->get_all();


        $this->load->view('Cart', $data);

    }

    public function add($ide_kode)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Cart';
        $data->item = $this->item_detil->with_item()->where_ide_kode($ide_kode)->get();

        $cart = $this->cart->where_ide_kode($ide_kode)->get();
        if ($cart) {
            $cart = $this->cart->where_ide_kode($ide_kode)->update(array(
                'ca_qty' => (int)$cart->ca_qty + (int)$this->input->post('qty'),
                'ca_tharga' => ((int)$cart->ca_qty + (int)$this->input->post('qty')) * (int)$this->input->post('harga'),
                'p_kode' => $_SESSION['id']
            ));

            if ($cart) {
                $data->berhasil = 'Berhasil menambah item ke keranjanng';
                $this->session->set_userdata('berhasil', $data->berhasil);
                redirect('cart');
            }
        } else {
            $cart = $this->cart->insert(array(
                'ca_kode' => $this->cart->guid(),
                'ca_qty' => (int)$this->input->post('qty'),
                'ca_tharga' => (int)$this->input->post('qty') * (int)$this->input->post('harga'),
                'ide_kode' => $ide_kode,
                'p_kode' => $_SESSION['id']
            ));

            if ($cart) {
                $data->berhasil = 'Berhasil menambah item ke keranjanng';
                $this->session->set_userdata('berhasil', $data->berhasil);
                redirect('cart');
            }
        }
    }

    public function checkout()
    {
        $p_kode = $_SESSION['id'];
        $carts = $this->cart->where_p_kode($p_kode)->get_all();
        $o_kode = $this->order->guid();
        $o_noorder = date('ymd') . (int)$this->order->count_rows() + 1;
        $this->order->insert(array(
            'o_kode' => $o_kode,
            'o_noorder' => $o_noorder,
            'p_kode' => $p_kode
        ));

        foreach ($carts as $cart) {
            $this->order_detil->insert(array(
                'od_kode'        => $this->order_detil->guid(),
                'od_qty'        => (int)$cart->ca_qty,
                'od_tharga'     => (int)$cart->ca_tharga,
                'o_kode'     => $o_kode,
                'ide_kode'      => $cart->ide_kode
            ));


        }

        $this->cart->where_p_kode($p_kode)->delete();

        redirect('cart/' . $o_noorder . '/alamat_pengiriman');
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */