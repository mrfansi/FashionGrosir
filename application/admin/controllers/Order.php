<?php
/**
 * Created by PhpStorm.
 * User: irfandihati
 * Date: 12/03/2018
 * Time: 23.23
 */

class Order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_m', 'order');
    }

    public function index()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Order';
        $data->title_page = 'Order';
        $data->total_order = $this->order->count_rows();
        $data->orders = $this->order->select_orders();
        $this->load->view('Order', $data);
    }

    public function konfirmasi()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Kofirmasi Order';
        $data->title_page = 'Pembayaran';
        $data->total_order = $this->order->count_rows();
        $data->orders = $this->order->select_orders_bukti(1);
        $this->load->view('Order_k', $data);
    }

    public function proses_konfirmasi($id)
    {
        $data = new stdClass();

        $order = $this->order->where_o_kode($id)->update(
            array(
                'o_status'      => 2
            )
        );

        if ($order)
        {
            $data->berhasil = 'Konfirmasi Order berhasil';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('order');
        }
        else
        {
            $data->gagal = 'Konfirmasi Order gagal';
            $this->session->set_flashdata('gagal', $data->gagal);

            redirect('order');
        }
    }

    public function invoice()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Invoice';
        $data->title_page = 'Invoice';
        $data->total_order = $this->order->count_rows();
        $data->orders = $this->order->select_invoice(3);
        $this->load->view('Order_i', $data);
    }

    public function tambah()
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Order > Tambah';
        $data->submit = 'Simpan';
        $data->kode = $this->order->guid();
        $this->load->view('CRUD_Order', $data);
    }

    public function ubah($id)
    {
        $data = new stdClass();
        $data->title = 'Fashion Grosir | Order > Ubah';
        $data->submit = 'Ubah';
        $data->kode = $id;
        $data->orders = $this->order->where('u_kode', $id)->get();

        $this->load->view('CRUD_Order', $data);
    }

    public function simpan()
    {
        // create object
        $data = new stdClass();

        // get guid form post
        $id = $this->input->post('id');

        // get user from database where guid
        $order = $this->order->where_u_kode($id)->get();

        if ($order)
        {
            $order = $this->order->where_u_kode($id)->update(array(
                'u_nama'    => $this->input->post('nama'),
                'updated_by'        => $_SESSION['username'],
            ));
            if ($order)
            {
                $data->berhasil = 'Data Order berhasil diperbarui.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('order');
            }
            else
            {
                $data->gagal = 'Data Order gagal diperbarui.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('order');
            }
        }
        else
        {
            $order = $this->order->insert(array(
                'u_kode'          => $this->input->post('id'),
                'u_nama'          => $this->input->post('nama'),
//                'created_by'      => $_SESSION['username'],
            ));
            if ($order)
            {
                $data->berhasil = 'Data Order berhasil dibuat.';
                $this->session->set_flashdata('berhasil', $data->berhasil);

                redirect('order');
            }
            else
            {
                $data->gagal = 'Data Order gagal dibuat.';
                $this->session->set_flashdata('gagal', $data->gagal);

                redirect('order');
            }
        }
    }

    public  function hapus($id)
    {
        $data = new stdClass();

        $order = $this->order->where('u_kode', $id)->delete();
        if ($order)
        {
            $data->berhasil = 'Data Order berhasil dihapus';
            $this->session->set_flashdata('berhasil', $data->berhasil);

            redirect('order');
        }
        else
        {
            $data->gagal = 'Data Order gagal dihapus';
            $this->session->set_flashdata('berhasil', $data->gagal);

            redirect('order');
        }
    }
}