<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

	public function getCabang()
	{
		$query = $this->db->get('cabang');
		return $query->result();
	}
	public function getBulan()
	{
		$query = $this->db->get('bulan');
		return $query->result();
	}
	


}

?>
