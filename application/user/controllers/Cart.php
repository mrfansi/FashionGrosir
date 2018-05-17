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
    }

    public function index()
    {


    }

    public function add($ide_kode) {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Cart';
        $data->item = $this->item_detil->with_item()->where_ide_kode($ide_kode)->get();

        $cart = $this->cart->insert(array(
            'ca_kode'       => $this->cart->guid(),
            'ca_qty'        => $this->input->post('qty'),
            'ca_tharga'    => (int)$this->input->post('qty') * (int)$this->input->post('harga'),
            'ide_kode'      => $ide_kode,
            'p_kode'        => $_SESSION['id']
        ));

        if ($cart)
        {
            $this->load->model('Item_qty_m','item_qty');
            $this->item_qty->insert(array(
                'iq_kode'        => $this->item_qty->guid(),
                'iq_qty'         => -(int)$this->input->post('qty'),
                'ide_kode'       => $ide_kode
            ));
        }

    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */