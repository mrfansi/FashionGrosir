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
    public $menu_kategori;

    public function __construct()
    {
        parent::__construct();
        // Library
        $this->load->library('session');
        $this->load->library('Layout');

        // load web config
        $this->load->config('weboptions');

        // load model
        $this->load->model('Kategori_m','kategori');

        $this->meta_title = $this->config->item('webname');
        $this->meta_content = $this->config->item('webdeskripsi');
        $this->meta_keywords = $this->config->item('webkeywords');
        $this->menu_kategori = $this->kategori->get_all();

        // check if user already login
//        if (!$this->session->isonline) {
//            redirect('login');
//        } else {
//            $this->session->set_userdata('redirect', current_url());
//        }
        //$this->output->cache(1);
    }

    public function _show_content($title, $page, $data = null)
    {
        $this->layout->add_title($title . ' - ' . $this->meta_title);
        $this->layout->show($page, $data);
    }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */