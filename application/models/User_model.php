<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function loginuser($username,$password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$q = $this->db->get();
		if($q->num_rows()==1){
			return $q->result_array();
		}else{
			return false;
		}
	}


}

?>
