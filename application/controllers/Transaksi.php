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

	public function index()
	{
		$session_data = $this->session->userdata('sesslogin');
        $data['id_user'] = $session_data['id_user'];
        $data['username'] = $session_data['username'];
        $data['nama'] = $session_data['nama'];
		$this->load->model('Transaksi_model');
		$data["transaksi_list"] = $this->Transaksi_model->getTransaksi($data['id_user']);
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
		$cabang = $session_data['id_cabang'];
		$this->load->model('Transaksi_model');
		$data["cabang"] = $this->Transaksi_model->selectCabang($cabang);
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'trim|required');
		$this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'trim|greater_than[2]|less_than[61]');
		$this->load->model('Transaksi_model');
		$data['transaksi']=$this->Transaksi_model->getTransaksiById($id_transaksi);
		
		if($this->form_validation->run()==FALSE){
			$this->load->view('partials/header');
			$this->load->view('transaksi/update',$data);
			$this->load->view('partials/footer');
		}else{
			$this->Transaksi_model->update($id_transaksi);	
			$this->session->set_flashdata('sukses','1');
			redirect('Transaksi','refresh');
			
		}
	}

}

/* End of file Data.php */
/* Location: ./application/controllers/Data.php */
?>