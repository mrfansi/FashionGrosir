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

        if (!$this->session->loggedin) {
            redirect(base_url('adm.php/auth'));
        }
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