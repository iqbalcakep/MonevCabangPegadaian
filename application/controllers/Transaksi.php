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
		$this->load->view('transaksi/transaksi', $data);
	}

	public function create(){
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'trim|required');
		if($this->form_validation->run()==FALSE){		
			$this->load->view('transaksi/create');	
		}else{
			$this->load->model('Transaksi_model');
			$this->Transaksi_model->create();	
			redirect('transaksi','refresh');
		}
	}

	public function delete($id_transaksi)
	{
		$this->load->model('Transaksi_model');
		$this->Transaksi_model->delete($id_transaksi);
		redirect('Transaksi','refresh');
	}

	public function update($id_transaksi)
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'trim|required');
		$this->load->model('Transaksi_model');
		$data['transaksi']=$this->Transaksi_model->getTransaksiById($id_transaksi);
		
		if($this->form_validation->run()==FALSE){
			$this->load->view('transaksi/update',$data);
		}else{
			$this->Transaksi_model->update($id_transaksi);	
			redirect('Transaksi','refresh');
			
		}
	}

}

/* End of file Data.php */
/* Location: ./application/controllers/Data.php */
?>