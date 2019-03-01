<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

	public function getMalang()
	{
		$this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('user','transaksi.id_user = user.id_user');
        $query = $this->db->get();

		return $query->result();
	}


}

?>
