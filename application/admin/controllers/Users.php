<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ms_users', 'users');
    }

    public function index()
    {
        // null object
        $data = new stdClass();
        // set title
        $data->title = 'Fashion Grosir | Users';

        // set total
        $data->totalitem = $this->set_totalitem();
        $data->totalcustomer = $this->set_totalcustomer();
        $data->totalorder = $this->set_totalorder();
        $data->totalinv = $this->set_totalinv();

        $this->load->view('Users', $data);
    }
}