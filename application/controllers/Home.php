<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 27/02/2018
 * Time: 20.29
 */


class Home extends MY_Controller {
    public function __construct()
    {
        parent::__construct();

    }

    public function index() {
        $this->load->view('user/Home');
    }


}