<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rahn extends CI_Controller {

	public function index()
    {
        $this->load->view('partial/header');
        $this->load->view('rahn');
        $this->load->view('partial/footer');    
    }
    public function detail()
    {
        $pinjaman = $this->input->post('uang_pinjaman');
        $tenor =  $this->input->post('tenor_pinjaman');
        $jenis =  $this->input->post('jenis');
        $datas = array(
            'pinjaman' => str_replace(',','',$pinjaman),
            'tenor' => $tenor,
          	'keterangan' => $jenis,
              
        );
        $jsonString=$this->curl->simple_post('https://api.thegadeareamalang.com/simulasikreasi/index.php/rahn/', $datas, array(CURLOPT_BUFFERSIZE => 10));
        $data['detail']=json_decode($jsonString);

        $this->load->view('partial/header');
        $this->load->view('detailRahn',$data);
        $this->load->view('partial/footer');   
    }


}

/* End of file Rahn.php */
/* Location: ./application/controllers/Rahn.php */