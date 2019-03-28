<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$sessData = $this->session->userdata('sesslogin');
		$id_user = $sessData['id_user'];
		$data['username'] = $sessData['username'];
        $data['akses'] = $sessData['akses'];
        $data['nama'] = $sessData['nama'];
	if($this->session->userdata('sesslogin')){
		$current_controller = $this->router->fetch_class();
		$this->load->library('acl');
		if(!$this->acl->is_public($current_controller))
		 {
			 if(!$this->acl->is_allowed($current_controller, $data['akses']))
			 {
				redirect('login/logout','refresh');
			 }
		 }

	}else{
		redirect('login','refresh');
	}
	}
	

	public function index()
	{
		$sessData = $this->session->userdata('sesslogin');
		$level = $sessData['akses'];
		$username = $sessData['username'];
		$this->load->model('UserModel');
		if($level=="admin"){
		$data['user']=$this->UserModel->selectUser();
		}else{
		$getid = $this->UserModel->selectid($username);
		foreach($getid as $h){
			$id_cb = $h->id_cabang;
		}
		$data['user']=$this->UserModel->selectUserS($id_cb);
		}
		//$this->load->view('user/tryuser', $data);
		$this->load->view('partials/header');
		$this->load->view('user/dataCabang',$data);
		$this->load->view('partials/footer');
		
		}
		public function createUser()
		{
		    $sessData = $this->session->userdata('sesslogin');
		    $level = $sessData['akses'];
		    if($level!="admin"){
		        redirect('login/logout','refresh');
		    }else{
			$this->load->model('UserModel');
			//$data['user']=$this->UserModel->selectUser();
			//$this->load->view('user/tryuser', $data);
			$this->load->view('partials/header');
			$this->load->view('user/insertCabang');
			$this->load->view('partials/footer');
			
			}
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
		$this->load->view('user/updateCabang', $data);
		$this->load->view('partials/footer');
	}

	public function updateform1($id)
	{
		$this->load->model('UserModel');
		$data['user']=$this->UserModel->selectUserId($id);
	//	var_dump($this->UserModel->selectUserId($id));
		$this->load->view('partials/header');
		$this->load->view('user/updateCabang1', $data);
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

	public function update1($id)
	{
		$data = array(
	        'nama' => $this->input->post('nama'),
	        'username' => $this->input->post('username'),
	        'password' => md5($this->input->post('password'))
	     );
		$this->load->model('UserModel');
		$this->UserModel->updateUser($data,$id);
		
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