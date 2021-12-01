<?php


class Upload_produk extends CI_Controller{

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
        $this->load->view('inventory/upload_prooduk');
        $this->load->view('template/footer');
    }
    function upload()
    {
        $upload_file=$_FILES['upload_file']['name'];
            $extension=pathinfo($upload_file,PATHINFO_EXTENSION);
            if($extension == 'csv'){
                 $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Csv');
            }else if($extension == 'xls'){
                 $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xls');
            }else{
                 $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
            }
            $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
            $sheetdata = $spreadsheet->getActiveSheet()->toArray(); 
            $sheetcount=count($sheetdata);
            $data1 = array();
            // id	shipref	product_number	product_desc	quantity	container	date_in	date_out	

            // echo '<pre>';
            // print_r($sheetdata);
            if($sheetcount>1){
                for ($i=1; $i < $sheetcount; $i++ )
                {
                    $shifref        = $sheetdata[$i][1];
                    $product_number = $sheetdata[$i][2];
                    $product_desc   = $sheetdata[$i][3];
                    $quantity       = $sheetdata[$i][4];
                    $container      = $sheetdata[$i][5];
                    $indate         = $sheetdata[$i][6];
                    
                    //stock controle
                    $data[] = array(
                        'shipref'               => $shifref,
                        'product_number'        => $product_number,
                        'product_desc'          => $product_desc,
                        'quantity'              => $quantity,
                        'container'             => $container,
                        'date_in'         => $indate,
                    );

                }
            }
             $input = $this->inventory_model->inputArray("i_stock",$data);
            if($input){
                echo "sukses";
                redirect('i/Stock');
            }else{
                echo "gagal";
            }
    }
}