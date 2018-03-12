<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 11/03/2018
 * Time: 02.03
 */

class Get extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ms_item', 'item');
        $this->load->model('Ms_customer', 'cust');
        $this->load->model('Ms_kategori', 'kategori');
    }

    public function index()
    {
        redirect(base_url('adm.php/dashboard'));
    }


    public function total_items()
    {
        echo $this->item->count_all();
    }

    public function total_customers()
    {
        echo $this->cust->count_all();
    }


    public function inv_count()
    {

    }

    public function total_penjualan()
    {
        return 0;
    }

    public function kategori($kategori = '')
    {
        if ($kategori == 'all' OR $kategori == '') {
            $hasil = $this->item->as_array()->get_all();
        } else {
            $hasil = $this->item->as_array()->get_many_by('kat_kode', $kategori);
        }
        echo json_encode($hasil);
    }

    public function list_kategori()
    {
        $hasil = $this->kategori->as_array()->get_all();
        header('Content-Type: application/json');
        echo json_encode($hasil);
    }
}