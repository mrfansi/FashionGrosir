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

    public function get_kelurahan()
    {
        $data['results'] = [];
        $kecamatan = $this->input->get('kecamatan');
        $q = $this->input->get('q');
        if (isset($q)) {
            $hasil = $this->desa->where('kecamatan_id', $kecamatan)->where('desa_nama LIKE', '%' . $q . '%')->get_all();
            foreach ($hasil as $g) {
                array_push($data['results'], array(
                    'id' => (int)$g->desa_id,
                    'text' => (string)$g->desa_nama,
                    'kodepos' => (int)$g->kodepos
                ));

            }
        } else {
            $hasil = $this->desa->where('kecamatan_id', $kecamatan)->get_all();
            foreach ($hasil as $g) {
                array_push($data['results'], array(
                    'id' => (int)$g->desa_id,
                    'text' => (string)$g->desa_nama,
                    'kodepos' => (int)$g->kodepos
                ));

            }
        }


        echo json_encode($data);
    }

    public function get_kodepos($desa_id)
    {
        $hasil = $this->desa->get($desa_id);
        echo $hasil->kodepos;
    }

    public function get_alamat()
    {
        $q = $this->input->get('q');
        $data['results'] = [];
        $p_kode = $_SESSION['id'];

        if (isset($q)) {
            $alamat = $this->pengguna_alamat->with_pengguna()->with_alamat()->where('p_kode', $p_kode)->get_all();
            foreach ($alamat as $g){
                array_push($data['results'], array(
                    'id'    => $g->alamat->a_kode,
                    'text'  => $g->alamat->a_nama
                ));
            }
        } else {
            $alamat = $this->pengguna_alamat->with_pengguna()->with_alamat()->where('p_kode', $p_kode)->get_all();
            foreach ($alamat as $g){
                array_push($data['results'], array(
                    'id'    => $g->alamat->a_kode,
                    'text'  => $g->alamat->a_nama
                ));
            }
        }


        echo json_encode($data);
    }

}