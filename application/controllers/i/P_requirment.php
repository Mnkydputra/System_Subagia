<?php

class P_requirment  extends CI_Controller
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
           'delivery_order' => $this->inventory_model->sc_control('i_delivery_order')->result(),
        );
        $this->load->view('template/header',$data);
        $this->load->view('inventory/delivery_order',$data);
        $this->load->view('template/footer');
    }

    function p_rq()
    {
        $data = array(
           'akun' => $this->db->get_where('akun',array('email' => $this->session->userdata('email')))->row(),
           'url'  => $this->uri->segment(2),
           'stock' => $this->inventory_model->sc_control('i_data_requirment')->row(),
        );
        $this->load->view('template/header',$data);
        $this->load->view('inventory/p_requirment',$data);
        $this->load->view('template/footer');
    }

    // ADD Delivery Order
	public function shipDO()
	{
            $id		 		 = $this->input->post("id");
			$po_number 		 = $this->input->post("po_number");
			$awb			 = $this->input->post("awb");
			$shipref		 = $this->input->post("shipref");
			$product_number  = $this->input->post("product_number");
			$product_desc    = $this->input->post("product_desc");
			$quantity  		 = $this->input->post("quantity");
			$pallet  		 = $this->input->post("pallet");
			$cbm  			 = $this->input->post("cbm");
			$shipment 		 = $this->input->post("shipment");
			$truck   		 = $this->input->post("truck");
			$desc 			 = $this->input->post("desc");
			$tanggal		 = $this->input->post("tanggal");


			$data  = array(
                    "id"                => $id,
					"awb"         		=> $awb,
					"shipref"			=> $shipref,
					"product_number"    => $product_number,
					"product_desc"		=> $product_desc,
                    "quantity"          => $quantity,
					"po_number"  		=> $po_number,
					"pallet"   			=> $pallet,
					"total_cbm"  		=> $cbm,
					"shipment"			=> $shipment,
					"truck"	   			=> $truck,
                    "spesial_instruct"  => $desc,
                    "tanggal"           => $tanggal,
			);

			// $dataupdate = array(
			// 	"quantity"				=> $quantity - $quantity,
			// 	"date_out"				=> $tanggal,
			// );

		
			$info  = "Input Delivery Order " . $product_number . " - " . $shipref;
			$input = $this->inventory_model->inputData($data, "i_delivery_order");
			//$input = $this->inventory_model->update($dataupdate,"i_stock",array("shipref" => $shipref));
			// $whre  = array('shipref'=> $shipref);
			// $Cek = $this->inventory_model->cek($shipref,$product_number)->row();
		
			// if($Cek->quantity == 0){
			// 	$this->inventory_model->delData($whre,"i_stock");
			// }
				if ($input == true){
					echo "sukses";
				} else {
					echo "gagal";
				}
		
	}

    function CetakDO($awb){
        $mpdf = new \Mpdf\Mpdf([
			'margin_left' => 20,
			'margin_right' => 15,
			'margin_top' => 48,
			'margin_bottom' => 25,
			'margin_header' => 10,
			'margin_footer' => 10
		]);
		$data2 = array(
			'delivery'		 => $this->inventory_model->sc_control('i_delivery_order')->row(), 
			'delivery_order' => $this->inventory_model->cari(array("awb" => $awb),"i_data_requirment")->result(),
		);
		$data = $this->load->view('inventory/cetak', $data2, TRUE);
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle("Delivery Order");
		$mpdf->SetWatermarkText("KWE");
		$mpdf->showWatermarkText = true;
		$mpdf->watermark_font = 'DejaVuSansCondensed';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetHTMLFooter("&copy;Rizky Subagia");
		$mpdf->WriteHTML($data);
		$mpdf->Output();
    }

	public function Status($po_number)
	{	
		 $data = array(
           'akun' => $this->db->get_where('akun',array('email' => $this->session->userdata('email')))->row(),
           'url'  => $this->uri->segment(2),
           'delivery' => $this->inventory_model->sc_control('i_delivery_order')->row(),
        );
		$this->load->view('template/header',$data);
		$this->load->view('inventory/surat_jalan',$data);
		$this->load->view('template/footer');
	}

	public function addDriver()
	{
		$id = $this->input->post("id");
		$po_number = $this->input->post("po_number");
		$shipref = $this->input->post("shipref");
		$product_number = $this->input->post("product_number");
		$product_desc = $this->input->post("product_desc");
		$quantity =  $this->input->post("quantity");
		$desc = $this->input->post("desc");
		$driver = $this->input->post("driver");
		$status = $this->input->post("status");
		$tanggal = $this->input->post("tanggal");

		$data = array(
			'supir'   	=> $driver,
			'status'  	=> $status,
			'tanggal'	=> $tanggal
		);

		$info  = "Driver Pesanan Ini adalah " . $driver . " dengan status " . $status;
		$input = $this->inventory_model->update($data,"i_delivery_order",array("shipref" => $shipref));
		if ($input == true){
					echo "sukses";
				} else {
					echo "gagal";
				}
	}

}