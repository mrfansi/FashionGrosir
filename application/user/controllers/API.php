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
                array_push($data['results'], array('id' => $g->provinsi_id, 'text' => $g->provinsi_nama));

            }
        } else {
            foreach ($this->provinsi->get_all() as $g) {
                array_push($data['results'], array('id' => $g->provinsi_id, 'text' => $g->provinsi_nama));
            }
        }


        echo json_encode($data);
    }

    public function get_kabupaten()
    {
        $data['results'] = [];
        $provinsi = $this->input->get('provinsi');
        $q = $this->input->get('q');
        if (isset($q)) {
            $hasil = $this->kabupaten->where('provinsi_id', $provinsi)->where('kabupaten_nama LIKE', '%' . $q . '%')->get_all();
            foreach ($hasil as $g) {
                array_push($data['results'], array('id' => $g->kabupaten_id, 'text' => $g->kabupaten_nama));

            }
        } else {
            $hasil = $this->kabupaten->where('provinsi_id', $provinsi)->get_all();
            foreach ($hasil as $g) {
                array_push($data['results'], array('id' => $g->kabupaten_id, 'text' => $g->kabupaten_nama));
            }
        }


        echo json_encode($data);
    }

    public function get_kecamatan()
    {
        $data['results'] = [];
        $kabupaten = $this->input->get('kabupaten');
        $q = $this->input->get('q');
        if (isset($q)) {
            $hasil = $this->kecamatan->where('kabupaten_id', $kabupaten)->where('kecamatan_nama LIKE', '%' . $q . '%')->get_all();
            foreach ($hasil as $g) {
                array_push($data['results'], array('id' => $g->kecamatan_id, 'text' => $g->kecamatan_nama));

            }
        } else {
            $hasil = $this->kecamatan->where('kabupaten_id', $kabupaten)->get_all();
            foreach ($hasil as $g) {
                array_push($data['results'], array('id' => $g->kecamatan_id, 'text' => $g->kecamatan_nama));
            }
        }


        echo json_encode($data);
    }

    public function get_kota()
    {
        $data['results'] = [];
        $kecamatan = $this->input->get('kecamatan');
        $q = $this->input->get('q');
        if (isset($q)) {
            $hasil = $this->desa->where('kecamatan_id', $kecamatan)->where('desa_nama LIKE', '%' . $q . '%')->get_all();
            foreach ($hasil as $g) {
                array_push($data['results'], array('id' => $g->desa_id, 'text' => $g->desa_nama));

            }
        } else {
            $hasil = $this->desa->where('kecamatan_id', $kecamatan)->get_all();
            foreach ($hasil as $g) {
                array_push($data['results'], array('id' => $g->desa_id, 'text' => $g->desa_nama));
            }
        }


        echo json_encode($data);
    }

    public function get_kodepos($desa_id)
    {
        return $this->desa->get($desa_id)->kodepos;
    }

    public function get_alamat()
    {
        $data = [];
        $p_kode = $_SESSION['id'];
        $alamat = $this->pengguna_alamat->with_pengguna()->with_alamat()->where_p_kode($p_kode)->get_all();
        foreach ($alamat as $g){
            array_push($data, array(

            ));
        }

        echo json_encode($data);
    }

}