<?php


class Data_rq extends CI_Controller
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
			'akun' => $this->db->get_where('akun', array('email' => $this->session->userdata('email')))->row(),
			'url'  => $this->uri->segment(2),
			'stock' => $this->inventory_model->sc_control('i_product')->result(),
		);
		$this->load->view('template/header', $data);
		$this->load->view('inventory/data_rq', $data);
		$this->load->view('template/footer');
	}

	// ADD DO 
	public function addDO()
	{
		//id awb shipref product_number	product_desc quality pallet long weight hight cbm date_out date_act	


		$id		 		 = $this->input->post("id");
		$awb			 = $this->input->post("awb");
		$sp				 = $this->input->post("shipref");
		$pn  			 = $this->input->post("product_number");
		$pd 			 = $this->input->post("product_desc");
		$bqty 			 = $this->input->post("quantitybefore");
		$quantity 		 = $this->input->post("quantity");
		$pallet   		 = $this->input->post("pallet");
		$long			 = $this->input->post("long");
		$weight			 = $this->input->post("weight");
		$hight			 = $this->input->post("hight");
		$totalcbm	     = $this->input->post("cbm");
		$tgl  			 = $this->input->post("tanggal");

		$data  = array(
			"id"								=> $id,
			"awb"								=> $awb,
			"shipref"							=> $sp,
			"product_number"					=> $pn,
			"product_desc"						=> $pd,
			"quantity"							=> $quantity,
			"pallet"							=> $pallet,
			"long"								=> $long,
			"weight"							=> $weight,
			"hight"								=> $hight,
			"cbm"								=> substr($totalcbm, 0, 4),
			"date_out"							=> $tgl,
		);
		$dataupdate = array(
			"quantity"				=> $bqty - $quantity,
			// "date_out"				=> $tgl,
		);


		$info  = "Input Delivery Order " . $pn . " - " . $sp;
		$input = $this->inventory_model->inputData($data, "i_data_requirment");
		// $cekProduct = $this->inventory_model->cari(array('product_number' => $pn), "sc_control")->row();
		// $input = $this->inventory_model->update($dataupdate, "i_product", array("shipref" => $sp));
		// $whre  = array('shipref' => $sp);
		// $Cek = $this->inventory_model->cek($sp, $pn)->row();
		// if ($Cek->quantity == 0) {
			// 	$this->inventory_model->delData($whre, "i_product");
		// }
		// if ($input == true) {
		// 	echo "sukses";
		// } else {
			// 	echo "gagal";
		// }
			$Cek = $this->inventory_model->cek($sp, $pn)->row();
			
		}
}
