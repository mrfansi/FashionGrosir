<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_provinsi()
    {
        $data['results'] = [];
        $q = $this->input->get('q');
        if (isset($q)) {
            $hasil = $this->provinsi->where('provinsi_nama LIKE', '%' . $q . '%')->get_all();
            foreach ($hasil as $g) {
                array_push($data['results'], array('id' => $g->provinsi_nama, 'text' => $g->provinsi_nama));

            }
        } else {
            foreach ($this->provinsi->get_all() as $g) {
                array_push($data['results'], array('id' => $g->provinsi_nama, 'text' => $g->provinsi_nama));
            }
        }


        echo json_encode($data);
    }

    public function get_kabupaten()
    {
        $data['results'] = [];
        $q = $this->input->get('q');
        if (isset($q)) {
            $hasil = $this->kabupaten->where('kabupaten_nama LIKE', '%' . $q . '%')->get_all();
            foreach ($hasil as $g) {
                array_push($data['results'], array('id' => $g->kabupaten_nama, 'text' => $g->kabupaten_nama));

            }
        } else {
            foreach ($this->kabupaten->get_all() as $g) {
                array_push($data['results'], array('id' => $g->kabupaten_nama, 'text' => $g->kabupaten_nama));
            }
        }


        echo json_encode($data);
    }

    public function get_kecamatan()
    {
        $data['results'] = [];
        $q = $this->input->get('q');
        if (isset($q)) {
            $hasil = $this->kecamatan->where('kecamatan_nama LIKE', '%' . $q . '%')->get_all();
            foreach ($hasil as $g) {
                array_push($data['results'], array('id' => $g->kecamatan_nama, 'text' => $g->kecamatan_nama));

            }
        } else {
            foreach ($this->kecamatan->get_all() as $g) {
                array_push($data['results'], array('id' => $g->kecamatan_nama, 'text' => $g->kecamatan_nama));
            }
        }


        echo json_encode($data);
    }

    public function get_kota()
    {
        $data['results'] = [];
        $q = $this->input->get('q');
        if (isset($q)) {
            $hasil = $this->desa->where('desa_nama LIKE', '%' . $q . '%')->get_all();
            foreach ($hasil as $g) {
                array_push($data['results'], array('id' => $g->desa_nama, 'text' => $g->desa_nama));

            }
        } else {
            foreach ($this->desa->get_all() as $g) {
                array_push($data['results'], array('id' => $g->desa_nama, 'text' => $g->desa_nama));
            }
        }


        echo json_encode($data);
    }
}