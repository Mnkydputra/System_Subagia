<?php

Class Home Extends CI_Controller{

    function __construct()
	{
		parent::__construct();
		$id 	 = $this->session->userdata('id');

		if ($id == null || $id == "") {
			redirect('Login');
		}
	}

    function index()
    {
         $data = array(
           'akun' => $this->db->get_where('akun', array('email' => $this->session->userdata('email')))->row(),
           'url'  => $this->uri->segment(2),
        );
        $this->load->view('template/home',$data);
        $this->load->view('template/footer',$data);
    }

    public function Ceklogin()
	{
		date_default_timezone_set('Asia/Jakarta');
		$username 	= $this->input->post('email');
		$password   = md5($this->input->post('password'));
		//var_dump($password,$username);

		var_dump($username, $password);
		$cekakun = $this->login_model->cari(array("email" => $username, "password" => $password), "akun");
		if ($cekakun->num_rows() > 0) {
			$data = $cekakun->row();
			switch ($data->role_id) {
				case '1':
					$this->session->set_userdata("email", $data->email);
					$this->session->set_userdata("nama", $data->nama);
					$this->session->set_userdata("id", $data->id);
                    $this->session->set_flashdata('sukses','Anda Berhasil Masuk');
					redirect('Home');
					break;
				case '2':
					$this->session->set_userdata("email", $data->email);
					$this->session->set_userdata("nama", $data->nama);
					$this->session->set_userdata("id", $data->id);
					redirect('Home');
					break;
				case '3':
					$this->session->set_userdata("email", $data->email);
					$this->session->set_userdata("nama", $data->nama);
					$this->session->set_userdata("id", $data->id);
                    $this->session->set_flashdata('sukses','Anda Berhasil Masuk');
					redirect('i/Dashboard');
					break;
				case '4':
					$this->session->set_userdata("email", $data->email);
					$this->session->set_userdata("nama", $data->nama);
					$this->session->set_userdata("id", $data->id);
					redirect('Home');
					break;
					
				default:
					echo "role user tidak tersedia " . "<a href='" . base_url('Logout') . "'>Kembali</a>";
					break;
			}
		} else {
			$this->session->set_flashdata("nouser", "akun tidak di temukan");
			redirect("login");
		}
	}

}