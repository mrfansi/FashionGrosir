<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Layout
 */
class Layout {
    // CI Instance
    private $CI;
    // judul
    private $judul = null;
    // deskripsi
    private $deskripsi = null;
    // keyword
    private $keywords = null;
    // assign css dan js
    private $includes = array();
    public function __construct() {
        $this->CI =& get_instance();
    }
    public function add_includes($path, $prepend_base_url = true) {
        if($prepend_base_url) {
            $this->CI->load->helper('url');
            $this->includes[] = base_url($path);
        } else {
            $this->includes[] = $path;
        }
        return $this;
    }
    public function print_includes() {
        $final = '';
        foreach ($this->includes as $include) {
            if (preg_match('/js$/', $include)) {
                $final .= '<script src="' . $include . '"></script>';
            } elseif (preg_match('/css$/', $include)) {
                $final .= '<link href="' . $include . '" rel="stylesheet" />';
            } elseif (preg_match('/css/', $include)) {
                $final .= '<link href="' . $include . '" rel="stylesheet" />';
            } elseif (preg_match('/ico$/', $include)) {
                $final .= '<link href="' . $include . '" rel="icon" />';
            }
        }
        return $final;
    }
    public function set_title($title) {
        $this->judul = $title;
    }
    public function set_deskripsi($description) {
        $this->deskripsi = '<meta name="description" content="' . $description . '">';
    }
    public function set_keywords($keywords) {
        $this->keywords = '<meta name="keywords" content="' . $keywords . '">';
    }
    public function tampilkan($halaman, $layouts = array(), $params = array(), $default = true) {
        if (is_array($layouts) && count($layouts) >= 1) {
            foreach ($layouts as $layout_key => $layout) {
                $params[$layout_key] = $this->CI->load->view($layout, $params, true);
            }
        }
        if ($default) {
            // assign judul
            $header_params['judul'] = $this->judul;
            // assign deskripsi
            $header_params['deskripsi'] = $this->deskripsi;
            // assign keywords
            $header_params['keywords'] = $this->keywords;
            // render header
            $this->CI->load->view('layouts/header', $header_params);
            // render konten
            $this->CI->load->view($halaman, $params);
            // render footer
            $this->CI->load->view('layouts/footer');
        } else {
            // render
            $this->CI->load->view($halaman, $params);
        }

    }
}
/* End of file Layout.php */
/* Location: ./application/libraries/Layout.php */