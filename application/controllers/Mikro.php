<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mikro extends CI_Controller {
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
		$level = $session_data["akses"];
        $data['id_user'] = $session_data['id_user'];
        $data['username'] = $session_data['username'];
        $data['nama'] = $session_data['nama'];
		$this->load->model('Mikro_model');
		$this->load->model('UserModel');
		if($level!="admin" && $level != "cabang"){
		$data["mikro_list"] = $this->Mikro_model->getMikro($data['id_user']);
		}else if($level=="cabang"){
		$getid = $this->UserModel->selectid($username);
		foreach($getid as $h){
			$id_cb = $h->id_cabang;
		}
		$data["mikro_list"] = $this->Mikro_model->getMikroCabang($id_cb);
		}else{
		$data["mikro_list"] = $this->Mikro_model->getMikroAdmin();
		}
		
		$this->load->view('partials/header');
		$this->load->view('mikro/mikro', $data);
		$this->load->view('partials/footer');
	}

	public function cekDB($rekening){
		$hasil = $this->Mikro_model->cekRekening($rekening);
		if($hasil){
			return true;
	   }else{
		   $this->form_validation->set_message('cekDB','Nomor kredit sudah digunakan.');
		   return false;
	   }
   }
	
	public function create(){
		$session_data = $this->session->userdata('sesslogin');
        $data['id_user'] = $session_data['id_user'];
        $data['username'] = $session_data['username'];
		$data['nama'] = $session_data['nama'];
		$cabang = $session_data['id_cabang'];
		$this->load->model('Mikro_model');
		$data["cabang"] = $this->Mikro_model->selectCabang($cabang);
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
        $this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'trim|required');
        $this->form_validation->set_rules('rekening', 'Rekening', 'trim|exact_length[16]|callback_cekDB');
        $this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'trim|greater_than[2]|less_than[61]');
		if($this->form_validation->run()==FALSE){	
			$this->load->view('partials/header');
			$this->load->view('mikro/create', $data);
			$this->load->view('partials/footer');		
		}else{
			$this->load->model('Mikro_model');
			$this->Mikro_model->create();
			$this->session->set_flashdata('sukses','1');	
			redirect('mikro','refresh');
		}
	}

	public function delete($id_mikro)
	{
		$this->load->model('Mikro_model');
		$this->Mikro_model->delete($id_mikro);
		$this->session->set_flashdata('sukses','1');
		redirect('mikro','refresh');
	}

	public function update($id_mikro)
	{
		$session_data = $this->session->userdata('sesslogin');
        $data['id_user'] = $session_data['id_user'];
        $data['username'] = $session_data['username'];
		$data['nama'] = $session_data['nama'];
		$level = $session_data["akses"];
		$cabang = $session_data['id_cabang'];
		$this->load->model('Mikro_model');
		$data["cabang"] = $this->Mikro_model->selectCabang($cabang);
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
        $this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'trim|required');
        $this->form_validation->set_rules('rekening', 'Rekening');
        $this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'trim|greater_than[2]|less_than[61]');
		$this->load->model('Mikro_model');
		$data['mikro']=$this->Mikro_model->getMikroById($id_mikro);
		
		if($this->form_validation->run()==FALSE){
			$this->load->view('partials/header');
			$this->load->view('mikro/update',$data);
			$this->load->view('partials/footer');
		}else{
			if($level=="admin"){
				$this->Mikro_model->updateAdmin($id_mikro);	
			}else{
				$this->Mikro_model->update($id_mikro);	
			}
			$this->session->set_flashdata('sukses','1');
			redirect('Mikro','refresh');
			
		}
	}

}

/* End of file Data.php */
/* Location: ./application/controllers/Data.php */
?>