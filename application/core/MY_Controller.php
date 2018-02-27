<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * MY Controller
 */
class MY_Controller extends CI_Controller
{
    protected $title;
    protected $deskripsi;
    protected $keywords;
    protected $webname;

    public function __construct() {
        parent::__construct();
        // load library dan helper disini
        // library
        $this->load->library('Layout');
        // helper
        $this->load->helper('url');
        // config
        $this->load->config('weboptions', TRUE);
    }
    public function tampilkan($halaman, $data = array()) {
        if ($this->title == null) {
            $this->layout->set_title($this->webname . ' - ' . str_replace('_', ' ', $halaman));
        } else {
            $this->layout->set_title($this->webname . ' - ' . $this->title);
        }

        $this->layout->set_deskripsi($this->deskripsi);
        $this->layout->set_keywords($this->keywords);
        $this->layout->add_includes('assets/css/font-awesome.min.css');
        $this->layout->add_includes('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700', false);
        $this->layout->add_includes('assets/css/bulma.min.css');
        $this->layout->add_includes('assets/css/admin.css');
        $this->layout->add_includes('assets/js/jquery.min.js');
        $this->layout->add_includes('assets/js/plugin/table-export/tableExport.js');
        $this->layout->add_includes('assets/js/plugin/table-export/jquery.base64.js');
        $this->layout->add_includes('assets/js/plugin/table-export/html2canvas.js');
        $this->layout->add_includes('assets/js/plugin/table-export/jspdf/jspdf.js');
        $this->layout->add_includes('assets/img/favicon.ico');
        $this->layout->tampilkan($halaman, array(), $data);
    }
    public function set_title($title) {
        $this->title = $title;
    }
    public function set_deskripsi($deskripsi) {
        if ($deskripsi == '') {
            $this->deskripsi = $this->config->item('webdeskripsi','weboptions');
        } else {
            $this->deskripsi = $deskripsi;
        }
    }
    public function set_keywords($keywords) {
        if ($keywords == '') {
            $this->keywords = $this->config->item('webkeywords','weboptions');
        } else {
            $this->keywords = $keywords;
        }
    }
    public function set_webname($name) {
        if ($name == '') {
            $this->webname = $this->config->item('webname','weboptions');
        } else {
            $this->webname = $name;
        }
    }
}
/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */