<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

public function selectUser()
	{
		$query= $this->db->get('user');
		return $query->result();
	}
	
public function selectUserId($id)
	{
		$this->db->where('id_user', $id);
		$query= $this->db->get('user');
		return $query->result();
	}
	
public function inputUser($data)
{
	$this->db->insert('user', $data);
}

public function updateUser($data,$id)
	{
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);	
	}	
public function deleteUser($id)
{
	$this->db->where('id_user', $id);
	$this->db->delete('user');
}
}

/* End of file userModel.php */
/* Location: ./application/models/userModel.php */