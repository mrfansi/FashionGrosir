<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Opsi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Toko_m', 'toko');
    }

    public function index() {
        // null object
        $data = new stdClass();
        // set title
        $data->title = 'Fashion Grosir | Opsi';

        $this->load->view('Opsi', $data);
    }
}