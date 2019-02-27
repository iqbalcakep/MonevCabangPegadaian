<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Micro extends CI_Controller {

	public function index()
	{
		$this->load->view('partials/header');
		$this->load->view('Micro');
	}


}

/* End of file micro.php */
/* Location: ./application/controllers/micro.php */