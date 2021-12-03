<?php


class Input_product extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $id      = $this->session->userdata('id');
        if ($id == null || $id == "") {
            $this->session->set_flashdata('info', 'sessi berakhir silahkan login kembali');
            redirect('Login');
        }
    }


    function index()
    {
        $data = array(
            'akun'          => $this->db->get_where('akun', array('email' => $this->session->userdata('email')))->row(),
            'url'           => $this->uri->segment(2),
            'sales_partner' => $this->inventory_model->sc_control('i_vendor')->result(),
        );
        $this->load->view('template/header', $data);
        $this->load->view('inventory/input_sales_partner');
        $this->load->view('template/footer');
    }

    function sales_partner()
    {
        $data = array(
            'akun'          => $this->db->get_where('akun', array('email' => $this->session->userdata('email')))->row(),
            'url'           => $this->uri->segment(2),

        );

        $sales_id           = $this->input->post("id_sales");
        $sales_partner      = $this->input->post("sales_partner");
        $short_name         = $this->input->post("short_name");
        $storage_location   = $this->input->post("storage_location");
        $name               = $this->input->post("name");
        $phone              = $this->input->post("phone");
        $vendor = array(
            "id_sales_partner"      => $sales_id,
            "sales_partner"         => $sales_partner,
            "short_name"            => $short_name,
            "loc_gudang"            => $storage_location,
            "name"                  => $name,
            "phone"                 => $phone
        );

        $info = "Input Sales Partner" . $sales_partner . "-" . $storage_location;
        $cek_sales_id = $this->inventory_model->cari(array("id_sales_partner" => $sales_id), "i_vendor");

        //ini maksudnya gimana ? 
        //jika sales id sama dengan 0 maka ke data terisi ke tabel i_vendor 
        //setelah data terisi proses apa lagi ?
        if ($cek_sales_id->num_rows() == 0) {
            $this->session->set_flashdata('sukses', 'Anda Berhasil Masuk');
            $this->inventory_model->inputData($vendor, "i_vendor");
        } else {
            $this->session->set_flashdata('gagal', 'GAGAL');
            redirect('i/Input_product/po_number/' . $sales_id);
        }
    }

    function po_number($sales_id)
    {
        $data = array(
            'akun'          => $this->db->get_where('akun', array('email' => $this->session->userdata('email')))->row(),
            'url'           => $this->uri->segment(2),
            'sales'         => $this->db->get_where('i_vendor', array('id_sales_partner' => $sales_id))->row()
        );

        $this->load->view('template/header', $data);
        $this->load->view('inventory/po_number', $data);
        $this->load->view('template/footer');
    }

    function Input_po()
    {
        $sales_id   = $this->input->post('id_sales');
        $po_number  = $this->input->post('po_number');
        $short_name = $this->input->post('short_name');
        $awb        = $this->input->post('awb');

        $po = array(
            'po_number'         => $po_number,
            'id_sales_partner'  => $sales_id,
            'no_awb'            => $awb
        );
        $input =  $this->inventory_model->inputData($po, 'i_po_number');
        if ($input == true) {
            $this->session->set_flashdata('sukses', 'Anda Berhasil Masuk');
            redirect('i/Input_product/Product/' . $po_number);
        } else {
            $this->session->set_flashdata('gagal', 'Anda Berhasil Masuk');
            redirect('i/Input_product/po_number/' . $sales_id);
        }
    }

    function Product($po_number)
    {
        $data = array(
            'akun'          => $this->db->get_where('akun', array('email' => $this->session->userdata('email')))->row(),
            'url'           => $this->uri->segment(2),
            'po'             => $this->db->get_where('i_po_number', array('po_number' => $po_number))->row()
        );

        // echo '<pre>';
        // var_dump($data);
        $this->load->view('template/header', $data);
        $this->load->view('inventory/product', $data);
        $this->load->view('template/footer');
    }

    function addProduct()
    {
        $id_po              = $this->input->post('id_po');
        $po_number          = $this->input->post('po_number');
        $sales_partner      = $this->input->post('sales_partner');
        $awb                = $this->input->post('awb');
        $shipref            = $this->input->post('shipref');
        $id_product         = $this->input->post('id_product');
        $product_number     = $this->input->post('product_number');
        $description        = $this->input->post('description');
        $container          = $this->input->post('container');
        $storage_location   = $this->input->post('store_loc');
        $type               = $this->input->post('type');
        $quantity           = $this->input->post('quantity');

        $product = array(
            'id_po'                 => $id_po,
            'po_number'             => $po_number,
            'id_sales_partner'      => $sales_partner,
            'awb'                   => $awb,
            'shipref'               => $shipref,
            'id_product'            => $id_product,
            'product_name'          => $product_number,
            'description'           => $description,
            'container'             => $container,
            'storage_loc'           => $storage_location,
            'type'                  => $type,
            'quantity'              => $quantity,
        );

        $input = $this->inventory_model->inputData($product, 'i_product');
        if ($input == true) {
            $this->session->set_flashdata('sukses', 'Anda Berhasil Masuk');
            redirect('i/Input_product/addVolumeProduct/' . $id_product);
        } else {
            $this->session->set_flashdata('gagal', 'Anda Berhasil Masuk');
        }
    }

    function addVolumeProduct($id_product)
    {
        $data = array(
            'akun'          => $this->db->get_where('akun', array('email' => $this->session->userdata('email')))->row(),
            'url'           => $this->uri->segment(2),
            'product'       => $this->db->get_where('i_product', array('id_product' => $id_product))->row()
        );

        $this->load->view('template/header', $data);
        $this->load->view('inventory/volume_product', $data);
        $this->load->view('template/footer');
    }

    function VolumeProduct()
    {
        $id_volume_product  = $this->input->post('id_volume_product');
        $id_product         = $this->input->post('id_product');
        $po_number          = $this->input->post('po_number');
        $sales_partner      = $this->input->post('sales_partner');
        $shipref            = $this->input->post('shipref');
        $product_number     = $this->input->post('product_number');
        $long               = $this->input->post('long');
        $weight             = $this->input->post('weight');
        $height             = $this->input->post('height');
        $pallet             = $this->input->post('pallet');
        $cbm                = $this->input->post('cbm');
        $total_cbm          = $this->input->post('total_cbm');
        $tanggal            = $this->input->post('tanggal');

        $data = array(
            'id_volume_product '  => $id_volume_product,
            'id_product'          => $id_product,
            'l'                   => $long,
            'w'                   => $weight,
            'h'                   => $height,
            'pallet'              => $pallet,
            'cbm'                 => substr($cbm, 0, 4),
            'total_cbm'           => substr($total_cbm, 0, 4),
            'tanggal'             => $tanggal,
        );
        echo '<pre>';
        var_dump($data, $po_number);

        $input = $this->inventory_model->inputData($data, "i_volume_product");
        if ($input == true) {
            $this->session->set_flashdata('sukses', 'Anda Berhasil Masuk');
            redirect('i/Input_product/Product/' . $po_number);
        } else {
            echo "GAGAL BOYY!!!";
        }
    }
}
