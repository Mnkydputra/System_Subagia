<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $id 	 = $this->session->userdata('id');
		if (!$id = 1) {
			$this->session->set_flashdata('info', 'Role Anda tidka di bolehkan mengakses halaman ini');
			redirect('Home');
		}
        
    }
    public function index()
    {
        $data = array(
           'akun' => $this->db->get_where('akun', array('email' => $this->session->userdata('email')))->row(),
           'url'  => $this->uri->segment(2),
        );
         $this->load->view('template/header',$data);
         $this->load->view('finance/dashboard',$data);
         $this->load->view('template/footer');        
    }

}