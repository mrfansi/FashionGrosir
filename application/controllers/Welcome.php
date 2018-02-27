<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
	    $this->load->library('Ongkir');
	    $cities = $this->ongkir->city();
        echo $cost = $this->ongkir->cost(151, 128, 1000, "jne");
	}
}
