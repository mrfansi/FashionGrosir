<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->isonline) {
            redirect('login');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                $this->session->set_userdata('redirect', current_url());
            }
        }
    }

    public function index()
    {
        $this->load->view('Cart', $this->data);

    }

    public function modal_cart()
    {
        $this->load->view('Modal_Cart', $this->data);
    }

    public function add()
    {
        $ide_kode = $this->input->post('wu');
        $this->data->item = $this->item_detil->with_item()->where_ide_kode($ide_kode)->get();

        $cart = $this->cart->where_ide_kode($ide_kode)->get();
        if ($cart) {
            $cart = $this->cart->where_ide_kode($ide_kode)->update(array(
                'ca_qty' => (int)$cart->ca_qty + (int)$this->input->post('qty'),
                'ca_tharga' => ((int)$cart->ca_qty + (int)$this->input->post('qty')) * (int)$this->input->post('harga'),
                'p_kode' => $_SESSION['id']
            ));

            if ($cart) {
                $this->data->berhasil = 'Berhasil menambah item ke keranjanng';
                $this->session->set_flashdata('berhasil', $this->data->berhasil);
                $this->session->set_flashdata('modal', '1');
                redirect('/');
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
                $this->data->berhasil = 'Berhasil menambah item ke keranjanng';
                $this->session->set_flashdata('berhasil', $this->data->berhasil);
                $this->session->set_flashdata('modal', '1');
                redirect('/');
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
                'od_kode' => $this->order_detil->guid(),
                'od_qty' => (int)$cart->ca_qty,
                'od_tharga' => (int)$cart->ca_tharga,
                'o_kode' => $o_kode,
                'ide_kode' => $cart->ide_kode
            ));

            $this->item_qty->insert(array(
                'iq_kode' => $this->item_qty->guid(),
                'iq_qty' => -(int)$cart->ca_qty,
                'ide_kode' => $cart->ide_kode
            ));

        }
        $this->cart->where_p_kode($p_kode)->delete();
        redirect('checkout/' . $o_noorder .'/alamat_pengiriman');
    }


    public function delete($ca_kode)
    {
        $cart = $this->cart->where_ca_kode($ca_kode)->get();

        if ($cart) {
            $cart = $this->cart->where_ca_kode($ca_kode)->delete();
            if ($cart) {
                redirect('cart');
            }
        }

    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */