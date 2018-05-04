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

        // load web config
        $this->load->config('weboptions');

        $this->meta_title = $this->config->item('webname');
        $this->meta_content = $this->config->item('webdeskripsi');
        $this->meta_keywords = $this->config->item('webkeywords');

        // load menu
        $this->menu_kategori = $this->menu();

        // load model
        $this->load->model('Key','key');


        // check if user already login
        if (!$this->session->isonline) {
            redirect(base_url('adm.php/auth'));
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