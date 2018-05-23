<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function get_provinsi()
    {
        $data['results'] = [];
        foreach ($this->provinsi->get_all() as $g)
        {
            array_push($data['results'], array('id' => $g->provinsi_id, 'text' => $g->provinsi_nama));
        }
        echo json_encode($data);
    }

    public function get_kabupaten()
    {
        $data['results'] = [];
        foreach ($this->kabupaten->get_all() as $g)
        {
            array_push($data['results'], array('id' => $g->kabupaten_id, 'text' => $g->kabupaten_nama));
        }
        echo json_encode($data);
    }

    public function get_kecamatan()
    {
        $data['results'] = [];
        foreach ($this->kecamatan->get_all() as $g)
        {
            array_push($data['results'], array('id' => $g->kecamatan_id, 'text' => $g->kecamatan_nama));
        }
        echo json_encode($data);
    }
    public function get_kota()
    {
        $data['results'] = [];
        foreach ($this->desa->get_all() as $g)
        {
            array_push($data['results'], array('id' => $g->desa_id, 'text' => $g->desa_nama));
        }
        echo json_encode($data);
    }
}