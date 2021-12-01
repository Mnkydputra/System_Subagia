<?php

class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $id 	 = $this->session->userdata('id');
		if ($id == null || $id == "") {
			$this->session->set_flashdata('info', 'sessi berakhir silahkan login kembali');
			redirect('Login');
		}
        
    }
    function index()
    {
        $data = array(
           'akun' => $this->db->get_where('akun',array('email' => $this->session->userdata('email')))->row(),
           'url'  => $this->uri->segment(2),
           
        );
        $this->load->view('template/header',$data);
        $this->load->view('inventory/stock',$data);
        $this->load->view('template/footer');
    }

    function getData()
    {
         $data = $this->inventory_model->table();
            echo json_encode($data);
    }

}
