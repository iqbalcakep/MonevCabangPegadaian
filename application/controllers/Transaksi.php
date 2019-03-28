<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$session_data = $this->session->userdata('sesslogin');
        $data['id_user'] = $session_data['id_user'];
        $data['username'] = $session_data['username'];
        $data['nama'] = $session_data['nama'];
	}

	public function cekDB($rekening){
		$hasil = $this->Transaksi_model->cekRekening($rekening);
		if($hasil){
			return true;
	   }else{
		   $this->form_validation->set_message('cekDB','Nomor kredit sudah digunakan.');
		   return false;
	   }
   }

	public function index()
	{
		$session_data = $this->session->userdata('sesslogin');
		$username = $session_data["username"];
		$level = $session_data["akses"];
        $data['id_user'] = $session_data['id_user'];
        $data['username'] = $session_data['username'];
        $data['nama'] = $session_data['nama'];
		$this->load->model('Transaksi_model');
		$this->load->model('UserModel');
		if($level!="admin" && $level != "cabang"){
		$data["transaksi_list"] = $this->Transaksi_model->getTransaksi($data['id_user']);
		}else if($level=="cabang"){
		$getid = $this->UserModel->selectid($username);
		foreach($getid as $h){
			$id_cb = $h->id_cabang;
		}
		$data["transaksi_list"] = $this->Transaksi_model->getTransaksiCabang($id_cb);
		}else{
		$data["transaksi_list"] = $this->Transaksi_model->getTransaksiAdmin();
		}

		if ($this->input->post("tahun")=="") {
			$data["transaksi_bulan"] = $this->Transaksi_model->transaksiMulia($session_data['id_user'],date('Y'));
			$data["tahun"]=date('Y');
		}
		else
		{
			$data["transaksi_bulan"] = $this->Transaksi_model->transaksiMulia($session_data['id_user'],$this->input->post("tahun"));
			$data["tahun"]=$this->input->post("tahun");
		}
		$this->load->view('partials/header');
		$this->load->view('transaksi/transaksi', $data);
		$this->load->view('partials/footer');
	}
	public function create(){
		$session_data = $this->session->userdata('sesslogin');
        $data['id_user'] = $session_data['id_user'];
        $data['username'] = $session_data['username'];
		$data['nama'] = $session_data['nama'];
		$cabang = $session_data['id_cabang'];
		$this->load->model('Transaksi_model');
		$data["cabang"] = $this->Transaksi_model->selectCabang($cabang);
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'trim|required');
		$this->form_validation->set_rules('rekening', 'Rekening', 'trim|exact_length[16]|callback_cekDB');
		$this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'trim|greater_than[2]|less_than[61]');
		if($this->form_validation->run()==FALSE){	
			$this->load->view('partials/header');
			$this->load->view('transaksi/create', $data);
			$this->load->view('partials/footer');		
		}else{
			$this->load->model('Transaksi_model');
			$this->Transaksi_model->create();
			$this->session->set_flashdata('sukses','1');	
			redirect('transaksi','refresh');
		}
	}

	public function delete($id_transaksi)
	{
		$this->load->model('Transaksi_model');
		$this->Transaksi_model->delete($id_transaksi);
		$this->session->set_flashdata('sukses','1');
		redirect('Transaksi','refresh');
	}

	public function update($id_transaksi)
	{
		$session_data = $this->session->userdata('sesslogin');
        $data['id_user'] = $session_data['id_user'];
        $data['username'] = $session_data['username'];
		$data['nama'] = $session_data['nama'];
		$level = $session_data["akses"];
		$cabang = $session_data['id_cabang'];
		$this->load->model('Transaksi_model');
		$data["cabang"] = $this->Transaksi_model->selectCabang($cabang);
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'trim|required');
		$this->form_validation->set_rules('rekening', 'Rekening', 'trim|exact_length[16]');
		$this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'trim|greater_than[2]|less_than[61]');

		$this->load->model('Transaksi_model');
		$data['transaksi']=$this->Transaksi_model->getTransaksiById($id_transaksi);
		
		if($this->form_validation->run()==FALSE){
			$this->load->view('partials/header');
			$this->load->view('transaksi/update',$data);
			$this->load->view('partials/footer');
		}else{
			if($level=="admin"){
			$this->Transaksi_model->updateAdmin($id_transaksi);	

			}else{
			$this->Transaksi_model->update($id_transaksi);	

			}
			$this->session->set_flashdata('sukses','1');
			redirect('Transaksi','refresh');
			
		}
	}
	function rupiah($angka)
    {
        $hasil_rupiah = number_format($angka,0,'','');
        return $hasil_rupiah;
    }
	public function admin()
	{
		$this->load->model('Transaksi_model');
		$this->load->model('Data_model');

		if ($this->input->post("tahun")=="" || $this->input->post("inCabang")=="")
		{
			$data['areamalang'] = $this->Transaksi_model->getAllTransaksiAdmin(date('Y'),'1');
			$data['tahun'] = date('Y');
			$data['activecabang'] = 'Malang';
			$data['bulanAct'] = '';
			$data['cabang'] = $this->Transaksi_model->getAllTransaksiCabang('01',date('m'));
			
			$chrt=$this->Transaksi_model->getAllTransaksiAdmin(date('Y'),'1');
	        $dat='';
	        $i=1;
	        foreach ($chrt as $key) 
	        {
	             $dat=$dat."{bulan:'".$key->bulan."', pinjaman:".$this->rupiah($key->biaya)."},";$i++;
	        }
		}
		else
		{
			$data['areamalang'] = $this->Transaksi_model->getAllTransaksiAdmin($this->input->post("tahun"),$this->input->post("inCabang"));
			$data['tahun'] = $this->input->post("tahun");
			$data['activecabang'] = '';
			$cab=$this->Data_model->getCabang();
			foreach ($cab as $key) {
				if ($key->id_cabang==$this->input->post("inCabang")) {
					$data['activecabang'] = $key->nama;
				}
			}
			
			$data['bulanAct'] = '';
			$cab=$this->Data_model->getBulan();
			foreach ($cab as $key) {
				if ($key->id_bulan==$this->input->post("bulan")) {
					$data['bulanAct'] = $key->bulan;
				}
			}
			
			$data['cabang'] = $this->Transaksi_model->getAllTransaksiCabang($this->input->post("inCabang"),$this->input->post("bulan"));
			$chrt=$this->Transaksi_model->getAllTransaksiAdmin($this->input->post("tahun"),$this->input->post("inCabang"));
	        $dat='';
	        $i=1;
	        foreach ($chrt as $key) 
	        {
	             $dat=$dat."{bulan:'".$key->bulan."', pinjaman:".$this->rupiah($key->biaya)."},";$i++;
	        }
		}

		
		$data['dataCabang'] = $this->Data_model->getCabang();
		$data['dataBulan'] = $this->Data_model->getBulan();
		

		
        $data['chart']=substr($dat,0,-1);
		$this->load->view('partials/header');
		$this->load->view('Admin/MuliaAdmin',$data);
		$this->load->view('partials/footer');
	}


}

/* End of file Data.php */
/* Location: ./application/controllers/Data.php */
?>