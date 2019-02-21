<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->model('userModel');
		$data['user']=$this->userModel->selectUser();
		//$this->load->view('user/tryuser', $data);
		$this->load->view('partials/header');
		$this->load->view('user/dataCabang',$data);
		$this->load->view('partials/footer');
		
		}
		public function createUser()
		{
			$this->load->model('userModel');
			//$data['user']=$this->userModel->selectUser();
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
		$this->load->model('userModel');
		$this->userModel->inputUser($data);
		redirect('user','refresh');
	}

	public function updateform($id)
	{
		$this->load->model('userModel');
		$data['user']=$this->userModel->selectUserId($id);
		$this->load->view('user/updateform', $data);
	}

	public function update($id)
	{
		$data = array(
	        'nama' => $this->input->post('nama'),
	        'username' => $this->input->post('username'),
	        'password' => $this->input->post('password')
	     );
		$this->load->model('userModel');
		$this->userModel->updateUser($data,$id);
		redirect('user','refresh');
	}
	public function delete($id)
	{
		$this->load->model('userModel');
		$this->userModel->deleteUser($id);
		redirect('user','refresh');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */