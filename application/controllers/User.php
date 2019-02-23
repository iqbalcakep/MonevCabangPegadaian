<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('sesslogin')['username']=="") {
			redirect('Login','refresh');
		}
	}
	

	public function index()
	{
		$this->load->model('UserModel');
		$data['user']=$this->UserModel->selectUser();
		//$this->load->view('user/tryuser', $data);
		$this->load->view('partials/header');
		$this->load->view('user/dataCabang',$data);
		$this->load->view('partials/footer');
		
		}
		public function createUser()
		{
			$this->load->model('UserModel');
			//$data['user']=$this->UserModel->selectUser();
			//$this->load->view('user/tryuser', $data);
			$this->load->view('partials/header');
			$this->load->view('user/insertCabang');
			$this->load->view('partials/footer');
			
			}

	public function input()
	{
		$data = array(
	        'nama' => $this->input->post('nama'),
	        'username' => $this->input->post('username'),
	        'password' => md5($this->input->post('password'))
	     );
		$this->load->model('UserModel');
		$this->UserModel->inputUser($data);
		redirect('user','refresh');
	}

	public function updateform($id)
	{
		$this->load->model('UserModel');
		$data['user']=$this->UserModel->selectUserId($id);
	//	var_dump($this->UserModel->selectUserId($id));
		$this->load->view('partials/header');
		$this->load->view('User/updateCabang', $data);
		$this->load->view('partials/footer');
	}

	public function update($id)
	{
		$session_data=$this->session->userdata('sesslogin');
		$idss = $session_data['id_user'];
		$akses = $session_data['akses'];
		$data = array(
	        'nama' => $this->input->post('nama'),
	        'username' => $this->input->post('username'),
	        'password' => md5($this->input->post('password'))
	     );
		$this->load->model('UserModel');
		$this->UserModel->updateUser($data,$id);
		// $this->session->unset_userdata('sesslogin')['username'];
		// $this->session->unset_userdata('sesslogin')['nama'];
		// $this->session->set_userdata('sesslogin')['username']="leli";
		// $this->session->set_userdata('sesslogin')['nama']="oke";
		$this->session->unset_userdata('sesslogin');
		$sess_arr = array(
			'id_user' => $idss,
			'username' => $this->input->post('username'),
			'nama' => $this->input->post('nama'),
			'password' => $this->input->post('password'),
			'akses' => $akses
		);
		$this->session->set_userdata('sesslogin',$sess_arr);
		redirect('user','refresh');
	}
	public function delete($id)
	{
		$this->load->model('UserModel');
		$this->UserModel->deleteUser($id);
		redirect('user','refresh');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */