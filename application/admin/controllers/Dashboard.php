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
        echo 'Request tidak diperbolehkan';
    }

    public function dashboard_totalitem()
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->index();
        } else {
            echo $this->item->count_all();
        }
    }

    public function dashboard_totalcust()
    {

    }
}