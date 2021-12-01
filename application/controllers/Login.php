<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$id 	 = $this->session->userdata('role_id');

		// if ($id == null || $id == "") {
		// 	redirect('Login');
		// }else{
		// 	redirect('Home');
		// }
	}

	public function index()
	{
		$this->load->view('login');
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
					redirect('Home');
					break;
				case '4':
					$this->session->set_userdata("email", $data->email);
					$this->session->set_userdata("nama", $data->nama);
					$this->session->set_userdata("id", $data->id);
						
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

	public function Create_akun()
	{
		$this->load->view('Create_akun');
	}

	public function Create()
	{
		$npk		 	= $this->input->post('npk');
		$nama 		 	= $this->input->post('nama');
		$email 			= $this->input->post('email');
		$photo 	 		= 'default.jpg';
		$pass  			= md5('S1g4p123');
		$role_id    	= 1.;
		$is_active  	= 1;
		$date_create 	= date("d-m-Y H:i");
		$data = array(
			'npk'  		=> $npk,
			'nama'		=> $nama,
			'email'  	=> $email,
			'photo'		=> $photo,
			'password'  => $pass,
			'role_id' 	=> $role_id,
			'is_active' => $is_active,
			'date_create' => $date_create,
		);
		// var_dump($data);
		$cekakun = $this->m_admin->cari(array("npk" => $npk), "akun")->num_rows();
		if ($cekakun == null) {
		$this->m_admin->inputData($data,'akun');
		$this->session->set_flashdata('sukses','akun sudah terdaftar');
		redirect("login");
		}else{
		$this->session->set_flashdata('message','akun sudah terdaftar');
		redirect("Login/Create_akun");
		}
	}

}				
		