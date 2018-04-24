<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 22.54
 */

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        // null object
        $data = new stdClass();
        // set title
        $data->title = 'Fashion Grosir | Dashboard';

        // set total
        $data->totalitem = $this->set_totalitem();
        $data->totalcustomer = $this->set_totalcustomer();
        $data->totalorder = $this->set_totalorder();
        $data->totalinv = $this->set_totalinv();

        $this->load->view('Dashboard', $data);
    }

    private function set_totalitem()
    {
        // load model

        $total = 0;
        return $total;
    }

    private function set_totalcustomer()
    {
        // load model

        $total = 0;
        return $total;
    }

    private function set_totalorder()
    {
        // load model

        $total = 0;
        return $total;
    }

    private function set_totalinv()
    {
        // load model

        $total = 0;
        return $total;
    }
}