<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homeamanah extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('excel');
		$this->load->model('mikro_model');
        $sessData = $this->session->userdata('sesslogin');
		$id_user = $sessData['id_user'];
		$data['username'] = $sessData['username'];
        $data['akses'] = $sessData['akses'];
        $data['nama'] = $sessData['nama'];
	// if($this->session->userdata('sesslogin')){
	// 	$current_controller = $this->router->fetch_class();
	// 	$this->load->library('acl');
	// 	if(!$this->acl->is_public($current_controller))
	// 	 {
	// 		 if(!$this->acl->is_allowed($current_controller, $data['akses']))
	// 		 {
	// 			redirect('login/logout','refresh');
	// 		 }
	// 	 }

	// }else{
	// 	redirect('login','refresh');
	// }
    
	}
    public function index()
	{
		$this->load->view('partials/header');
		$this->load->view('homeamanah');
		// $this->load->view('user/dataCabang');
		//$this->load->view('partials/footer');	
	}

	// public function gettrans($bulan){
	// 	$data=$this->mikro_model->getJumTransaksi($bulan);
	// 	echo json_encode($data);
	// }

	// public function getbiaya($bulan){
	// 	$data=$this->mikro_model->getJumPembiayaan($bulan);
	// 	echo json_encode($data);
	// }
	// public function getRank($bulan){
	// 	$data = $this->mikro_model->rankCabang($bulan);;
	// 	echo json_encode($data);
	// }
	// public function getUnit($bulan){
	// 	$sessData = $this->session->userdata('sesslogin');
	// 	$level = $sessData['akses'];
	// 	if($level=="admin"){
	// 	$data = $this->mikro_model->rankUnitAdmin($bulan);
	// 	}else{
	// 	$data = $this->mikro_model->rankUnit($bulan,$sessData['id_cabang']);
	// 	}
	// 	echo json_encode($data);
	// }
	// public function getdata(){
	// 	$data = $this->mikro_model->ambildata();
	// 	echo json_encode($data);
	// }

	// public function getdatamingguan(){
	// 	$data = $this->mikro_model->ambildataminggu();
	// 	echo json_encode($data);
	// }
	
	// public function getRollover($bulan){
	// 	$data = $this->mikro_model->getRollover($bulan);
	// 	echo json_encode($data);
	// }

    // public function getBaru($bulan){
	// 	$data = $this->mikro_model->getBaru($bulan);
	// 	echo json_encode($data);
	// }

	// public function getdatabulanan($bulan){
	// 	$data = $this->mikro_model->ambildatabulan($bulan);
	// 	echo json_encode($data);
	// }

	// public function exportmuliaharian(){ 
	// 		// load excel library
	// 		$this->load->library('excel');
	// 		$datalist = $this->transaksi_model->exportmuliaharian();
	// 		$objPHPExcel = new PHPExcel();
	// 		$objPHPExcel->setActiveSheetIndex(0);
	// 		// set Header
			
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Nasabah');
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Tanggal Transaksi');
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Jumlah Gram');
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Nilai Pembiayaan');
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Jangka Waktu/Hari');  
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Nama Cabang/UPC/S');     
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);     
	// 		// set Row
	// 		$rowCount = 2;
	// 		$total=0;
	// 		foreach ($datalist as $element) {
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['nama_nasabah']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['tanggal_closing']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['gram']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['biaya']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['jangka_waktu']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['nama']);
	// 			$total+=$element['biaya'];
	// 			$rowCount++;
	// 		}
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $total);
	// 		$object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	// 		header('Content-Type: application/vnd.ms-excel');
	// 		header('Content-Disposition: attachment;filename="Laporan Mulia Harian'.date("d-m-Y").'.xls"');
	// 		$object_writer->save('php://output');   
	// 	}

	// 	public function exportmuliamingguan(){ 
	// 		// load excel library
	// 		$this->load->library('excel');
	// 		$datalist = $this->transaksi_model->exportmuliamingguan();
	// 		$objPHPExcel = new PHPExcel();
	// 		$objPHPExcel->setActiveSheetIndex(0);
	// 		// set Header
			
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Nasabah');
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Tanggal Transaksi');
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Jumlah Gram');
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Nilai Pembiayaan');
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Jangka Waktu/Hari');  
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Nama Cabang/UPC/S');     
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);     
	// 		// set Row
	// 		$rowCount = 2;
	// 		$total=0;
	// 		foreach ($datalist as $element) {
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['nama_nasabah']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['tanggal_closing']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['gram']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['biaya']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['jangka_waktu']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['nama']);
	// 			$total+=$element['biaya'];
	// 			$rowCount++;
	// 		}
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $total);
	// 		$object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	// 		header('Content-Type: application/vnd.ms-excel');
	// 		header('Content-Disposition: attachment;filename="Laporan Mulia Mingguan'.date("d").'.xls"');
	// 		$object_writer->save('php://output');   
	// 	}

	
	// 	public function exportmuliabulanan(){ 
	// 		// load excel library
	// 		$this->load->library('excel');
	// 		$datalist = $this->transaksi_model->exportmuliabulanan();
	// 		$objPHPExcel = new PHPExcel();
	// 		$objPHPExcel->setActiveSheetIndex(0);
	// 		// set Header
			
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Nasabah');
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Tanggal Transaksi');
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Jumlah Gram');
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Nilai Pembiayaan');
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Jangka Waktu/Hari');  
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Nama Cabang/UPC/S');     
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	// 		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);     
	// 		// set Row
	// 		$rowCount = 2;
	// 		$total=0;
	// 		foreach ($datalist as $element) {
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['nama_nasabah']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['tanggal_closing']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['gram']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['biaya']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['jangka_waktu']);
	// 			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['nama']);
	// 			$total+=$element['biaya'];
	// 			$rowCount++;
	// 		}
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $total);
	// 		$object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	// 		header('Content-Type: application/vnd.ms-excel');
	// 		header('Content-Disposition: attachment;filename="Laporan Mulia Bulanan'.date("m-Y").'.xls"');
	// 		$object_writer->save('php://output');   
	// 	}
	


}

/* End of file Data.php */
/* Location: ./application/controllers/Data.php */
?>