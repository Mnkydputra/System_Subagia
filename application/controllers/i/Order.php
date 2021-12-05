<?php

class Order extends CI_Controller
{
    public function index()
    {
        $data = array(
            'akun' => $this->db->get_where('akun', array('email' => $this->session->userdata('email')))->row(),
            'url'  => $this->uri->segment(2),
            'stock' => $this->inventory_model->sc_control('i_product')->result(),
        );
        $this->load->view('template/header', $data);
        $this->load->view('inventory/order_rq', $data);
        $this->load->view('template/footer');
    }


    public function orderpo()
    {
        # code...
        $po = $this->input->post("po_number");
        $data = [
            'no_order'              => $po,
            'tanggal'               => $this->input->post("tanggal"),
            'shipment'              => $this->input->post("shipment"),
            'truck'                 => $this->input->post("truck"),
            'spesial_instruct'      => $this->input->post("desc"),
        ];
        $save = $this->inventory_model->inputData($data, "i_order_rq");
        if ($save) {
            $this->session->set_flashdata("info", "isi daftar barang yang akan di order");
            redirect('i/P_requirment/p_rq/' . $po);
        } else {
            $this->index();
        }
    }
}
