<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 03.08
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Navigasi extends MY_User
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('Navigasi');
    }


    public function dashboard()
    {
        $this->load->view('Dashboard');
    }

    public function item()
    {
        $this->load->view('Item');
    }

    public function customers()
    {
        $this->load->view('Customers');
    }

    public function transaksi()
    {

    }

    public function profil()
    {

    }

    public function konfigurasi()
    {

    }
}