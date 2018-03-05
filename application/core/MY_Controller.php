<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * MY Controller
 */
class MY_Controller extends CI_Controller
{
    protected $webtitle;
    protected $webdeskripsi;
    protected $webkeywords;
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
        $this->set_title();
        $this->set_keywords();
        $this->set_deskripsi();
    }
    public function tampilkan($halaman, $data = array()) {

        if ($this->webtitle == null) {
            $this->layout->set_title($this->webname . ' - ' . str_replace('_', ' ', $halaman));
        } else {
            $this->layout->set_title($this->webname . ' - ' . $this->title);
        }

        $this->layout->set_deskripsi($this->webdeskripsi);
        $this->layout->set_keywords($this->webkeywords);
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

    public function tampilkan_login($halaman, $data = array())
    {

        if ($this->webtitle == null) {
            $this->layout->set_title($this->webname . ' - ' . str_replace('_', ' ', $halaman));
        } else {
            $this->layout->set_title($this->webname . ' - ' . $this->webtitle);
        }

        $this->layout->set_deskripsi($this->webdeskripsi);
        $this->layout->set_keywords($this->webkeywords);

        $this->layout->add_includes("assets/vendor/bootstrap/css/bootstrap.min.css");
        $this->layout->add_includes("assets/vendor/font-awesome/css/font-awesome.min.css");
        $this->layout->add_includes("assets/css/fontastic.css");
        $this->layout->add_includes("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700", false);
        $this->layout->add_includes("assets/css/grasp_mobile_progress_circle-1.0.0.min.css");
        $this->layout->add_includes("assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css");
        $this->layout->add_includes("assets/css/style.default.css");
        $this->layout->add_includes("assets/css/custom.css");
        $this->layout->add_includes("assets/img/favicon.ico");
        $this->layout->add_includes("https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js", false);
        $this->layout->add_includes("https://oss.maxcdn.com/respond/1.4.2/respond.min.js", false);

        $this->layout->add_includes("assets/vendor/jquery/jquery.min.js");
        $this->layout->add_includes("assets/vendor/popper.js/umd/popper.min.js");
        $this->layout->add_includes("assets/vendor/bootstrap/js/bootstrap.min.js");
        $this->layout->add_includes("assets/js/grasp_mobile_progress_circle-1.0.0.min.js");
        $this->layout->add_includes("assets/vendor/jquery.cookie/jquery.cookie.js");
        $this->layout->add_includes("assets/vendor/chart.js/Chart.min.js");
        $this->layout->add_includes("assets/vendor/jquery-validation/jquery.validate.min.js");
        $this->layout->add_includes("assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js");
        $this->layout->add_includes("assets/js/front.js");
        $this->layout->tampilkan($halaman, array(), $data, false);
    }

    public function set_title($title = '')
    {
        $this->webtitle = $title;
    }

    public function set_deskripsi($deskripsi = '')
    {
        if ($deskripsi == '') {
            $this->webdeskripsi = $this->config->item('webdeskripsi', 'weboptions');
        } else {
            $this->webdeskripsi = $deskripsi;
        }
    }

    public function set_keywords($keywords = '')
    {
        if ($keywords == '') {
            $this->webkeywords = $this->config->item('webkeywords', 'weboptions');
        } else {
            $this->webkeywords = $keywords;
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