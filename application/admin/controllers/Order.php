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
        if (!$this->session->isonline) {
            redirect('login');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->session->set_userdata('redirect', current_url());
            }
        }
    }

    public function index()
    {
        $this->data->title = $this->data->brandname . ' | Order';
        $this->data->title_page = 'Order';
        $this->data->total_order = $this->order->count_rows();
        $this->data->orders = $this->order->select_orders();
        $this->load->view('Order', $this->data);
    }

    public function konfirmasi()
    {
        $this->data->title = $this->data->brandname . ' | Kofirmasi Order';
        $this->data->title_page = 'Pembayaran';
        $this->data->total_order = $this->order->count_rows();
        $this->data->orders = $this->order->select_orders_bukti(3);
        $this->load->view('Order_k', $this->data);
    }

    public function proses_konfirmasi($id)
    {
        $order = $this->order->where_orders_noid($id)->update(
            array(
                'orders_status' => 4
            )
        );

        if ($order) {
            $this->data->berhasil = 'Konfirmasi Order berhasil';
            $this->session->set_flashdata('berhasil', $this->data->berhasil);

            redirect('order');
        } else {
            $this->data->gagal = 'Konfirmasi Order gagal';
            $this->session->set_flashdata('gagal', $this->data->gagal);

            redirect('order');
        }
    }

    public function invoice()
    {
        $this->data->title = $this->data->brandname . ' | Invoice';
        $this->data->title_page = 'Invoice';
        $this->data->total_order = $this->order->count_rows();
        $this->data->orders = $this->order->select_invoice(6);
        $this->load->view('Order_i', $this->data);
    }

    public function tambah()
    {
        $this->data->title = $this->data->brandname . ' | Order > Tambah';
        $this->data->submit = 'Simpan';
        $this->data->kode = $this->order->guid();
        $this->load->view('CRUD_Order', $this->data);
    }

    public function ubah($id)
    {
        $this->data->title = $this->data->brandname . ' | Order > Ubah';
        $this->data->submit = 'Ubah';
        $this->data->kode = $id;
        $this->data->orders = $this->order->where('u_kode', $id)->get();

        $this->load->view('CRUD_Order', $this->data);
    }

    public function simpan()
    {
        // create object
        // get guid form post
        $id = $this->input->post('id');

        // get user from database where guid
        $order = $this->order->where_u_kode($id)->get();

        if ($order) {
            $order = $this->order->where_u_kode($id)->update(array(
                'u_nama' => $this->input->post('nama'),
                'updated_by' => $_SESSION['username'],
            ));
            if ($order) {
                $this->data->berhasil = 'Data Order berhasil diperbarui.';
                $this->session->set_flashdata('berhasil', $this->data->berhasil);

                redirect('order');
            } else {
                $this->data->gagal = 'Data Order gagal diperbarui.';
                $this->session->set_flashdata('gagal', $this->data->gagal);

                redirect('order');
            }
        } else {
            $order = $this->order->insert(array(
                'u_kode' => $this->input->post('id'),
                'u_nama' => $this->input->post('nama'),
//                'created_by'      => $_SESSION['username'],
            ));
            if ($order) {
                $this->data->berhasil = 'Data Order berhasil dibuat.';
                $this->session->set_flashdata('berhasil', $this->data->berhasil);

                redirect('order');
            } else {
                $this->data->gagal = 'Data Order gagal dibuat.';
                $this->session->set_flashdata('gagal', $this->data->gagal);

                redirect('order');
            }
        }
    }

    public function hapus($id)
    {
        $order = $this->order->where('u_kode', $id)->delete();
        if ($order) {
            $this->data->berhasil = 'Data Order berhasil dihapus';
            $this->session->set_flashdata('berhasil', $this->data->berhasil);

            redirect('order');
        } else {
            $this->data->gagal = 'Data Order gagal dihapus';
            $this->session->set_flashdata('berhasil', $this->data->gagal);

            redirect('order');
        }
    }

    public function proses($id)
    {
        $order = $this->order->update(
            array(
                'orders_noid' => $id,
                'orders_status' => 5
            ), 'orders_noid'
        );

        if ($order) {
            $this->data->berhasil = 'Order telah/sedang berhasil diproses';
            $this->session->set_flashdata('berhasil', $this->data->berhasil);

            redirect('order');
        } else {
            $this->data->gagal = 'Order telah/sedang gagal diproses';
            $this->session->set_flashdata('gagal', $this->data->gagal);

            redirect('order');
        }
    }

    public function batal($id)
    {
        $text = $this->input->post('alasan');

        $order = $this->order->update(
            array(
                'orders_noid' => $id,
                'orders_status' => 7,
                'orders_deskripsi'   => $text

            ), 'orders_noid'
        );

        $order_detil = $this->order_detil->where('orders_noid', $id)->get();

        if ($order_detil && $order) {
            $item_qty_update = $this->item_qty->insert(array(
                'iq_kode' => $this->item_qty->guid(),
                'iq_qty' => $order_detil->orders_detil_qty,
                'item_detil_kode' => $order_detil->item_detil_kode
            ));
            if ($item_qty_update) {
                $this->data->berhasil = 'Order telah berhasil dibatalkan';
                $this->session->set_flashdata('berhasil', $this->data->berhasil);

                redirect('order');
            } else {
                $this->data->gagal = 'Order telah gagal dibatalkan';
                $this->session->set_flashdata('gagal', $this->data->gagal);

                redirect('order');
            }
        }


    }

    public function resi($id)
    {
        $this->data->orders_noid = $id;
        $this->load->view('CRUD_Pengiriman', $this->data);
    }

    public function resi_pengiriman()
    {
        $orders_noid = $this->input->post('orders_noid');
        $order_resi = $this->order_resi->where('orders_noid', $orders_noid)->get();
        if (($order_resi))
        {
            $order_resi = $this->order_resi->where('orders_noid', $orders_noid)->update(array(
                'orders_resi_no'     => $this->input->post('resi')
            ));

            if ($order_resi)
            {
                $this->order->where('orders_noid', $orders_noid)->update(array('orders_status' => 6));
                $this->data->berhasil = 'Resi telah berhasil dibuat';
                $this->session->set_flashdata('berhasil', $this->data->berhasil);

                redirect('order');
            } else {
                $this->data->gagal = 'Resi telah gagal dibuat';
                $this->session->set_flashdata('gagal', $this->data->gagal);

                redirect('order');
            }
        } else {
            $order_resi = $this->order_resi->insert(array(
                'orders_noid'       => $orders_noid,
                'orders_resi_no'     => $this->input->post('resi')
            ));

            if ($order_resi)
            {
                $this->order->where('orders_noid', $orders_noid)->update(array('orders_status' => 6));
                $this->data->berhasil = 'Resi telah berhasil dibuat';
                $this->session->set_flashdata('berhasil', $this->data->berhasil);

                redirect('order');
            } else {
                $this->data->gagal = 'Resi telah gagal dibuat';
                $this->session->set_flashdata('gagal', $this->data->gagal);

                redirect('order');
            }
        }



    }

}