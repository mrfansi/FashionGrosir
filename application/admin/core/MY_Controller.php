<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CI_Controller MY_Controller
 */
class MY_Controller extends CI_Controller
{
    protected $meta_keywords;
    protected $meta_author;
    protected $meta_content;
    protected $meta_title;
    protected $menu_kategori;

    public function __construct()
    {
        parent::__construct();
        // Library
        $this->load->library('session');
        $this->load->library('Layout');
        $this->load->library('user_agent');

        // load web config
        $this->load->config('weboptions');

        $this->meta_title = $this->config->item('webname');
        $this->meta_content = $this->config->item('webdeskripsi');
        $this->meta_keywords = $this->config->item('webkeywords');

        // load menu
        $this->menu_kategori = $this->menu();

        // load model
        $this->load->model('Key','key');
        // load model
        $this->load->model('Alamat_m', 'alamat');
        $this->load->model('Cart_m', 'cart');
        $this->load->model('Item_detil_m', 'item_detil');
        $this->load->model('Item_img_m', 'item_img');
        $this->load->model('Item_kategori_m', 'item_kategori');
        $this->load->model('Item_qty_m', 'item_qty');
        $this->load->model('Item_seri_m', 'item_seri');
        $this->load->model('Item_ukuran_m', 'item_ukuran');
        $this->load->model('Item_warna_m', 'item_warna');
        $this->load->model('Item_m', 'item');
        $this->load->model('Kategori_m', 'kategori');
        $this->load->model('Order_detil_m', 'order_detil');
        $this->load->model('Order_m', 'order');
        $this->load->model('Order_pengiriman_m', 'order_pengiriman');
        $this->load->model('Seri_m', 'seri');
        $this->load->model('Toko_m', 'toko');
        $this->load->model('Ukuran_m', 'ukuran');
        $this->load->model('Warna_m', 'warna');
        $this->load->model('Provinsi_m', 'provinsi');
        $this->load->model('Kabupaten_m', 'kabupaten');
        $this->load->model('Kecamatan_m', 'kecamatan');
        $this->load->model('Desa_m', 'desa');
        $this->load->model('Pengguna_m', 'pengguna');
        $this->load->model('Pengguna_alamat_m', 'pengguna_alamat');


        // check if user already login
        if (!$this->session->isonline) {
            redirect(base_url('adm.php/auth'));
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->session->set_userdata('redirect', current_url());
            }

        }
//        $this->output->cache(1);
//        $allow = array(
//            '192.168.66.1',
//            '122.144.3.2',
//            'localhost',
//            '127.0.0.1',
//            'dev.eazy-dev.xyz'
//        );
//        if (!in_array($_SERVER['REMOTE_ADDR'], $allow))
//        {
//            echo 'Akses tidak diperbolehkan';
//            exit();
//        }
    }

    public function _show_content($title, $page, $data = null)
    {
        $this->layout->add_title($title . ' - ' . $this->meta_title);
        $this->layout->show($page, $data);
    }

    public function menu()
    {
        $this->load->model('Kategori_m','kategori');
        return $this->kategori->get_all();
    }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */