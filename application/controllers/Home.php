<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
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
		redirect('Admin/login','refresh');
	}
    
	}

	

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('partials/header');
		$this->load->view('home');
		// $this->load->view('user/dataCabang');
		//$this->load->view('partials/footer');
		
	}

	public function getdata(){
		$data = $this->transaksi_model->ambildata();
		echo json_encode($data);
	}

	public function getdatamingguan(){
		$data = $this->transaksi_model->ambildataminggu();
		echo json_encode($data);
	}

	public function getdatabulanan(){
		$data = $this->transaksi_model->ambildatabulan();
		echo json_encode($data);
	}

	
}
