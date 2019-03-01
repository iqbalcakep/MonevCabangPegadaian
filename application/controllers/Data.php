<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_model');
        
    }

    public function index()
    {  
        //$data["data"] = $this->Data_model->getData();
        $this->load->view('partials/header');
        $this->load->view('data.php');
        $this->load->view('partials/footer');
    }  

}

/* End of file Controllername.php */

?>