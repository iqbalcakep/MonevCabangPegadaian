<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
    }

	public function index()
	{
		if($this->session->userdata('sesslogin')){
			redirect('Home','refresh');
	
	}else{
		$this->load->view('loginPage');	
	}
	}

	public function cekLogin()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required|callback_cekDB');
		if ($this->form_validation->run() == FALSE) {
			echo " <script>alert('Gagal Login: Cek username , password!');history.go(-1);</script>";
		} else {
			redirect('Home','refresh');
		}
	}

	public function cekDB($password)
	{
		$username = $this->input->post('username');
		$hasil = $this->user_model->loginuser($username,$password);
		if($hasil){
			$sess_arr = array();
			foreach ($hasil as $row) {
				$sess_arr = array(
					'id_user' => $row['id_user'],
					'username' => $row['username'],
					'nama' => $row['nama'],
					'akses' => $row['akses'],
					'id_cabang' => $row['id_cabang']
				);
				$this->session->set_userdata('sesslogin',$sess_arr);
			}
			return true;
		}else{
			
			return false;
		}

	}

	public function logout()
	{
		$this->session->unset_userdata('sesslogin');
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

}

/* End of file LoginPage.php */
/* Location: ./application/controllers/LoginPage.php */?>