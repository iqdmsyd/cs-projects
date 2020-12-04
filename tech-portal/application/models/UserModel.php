<?php 
/**
 * 
 */
class UserModel extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	function getAll()
	{
		return $this->db->get('tb_user')->result();
	}

	function login($data)
	{
		$this->db->where('email', $data['email']);
		$this->db->where('password', $data['password']);
		return $this->db->get('tb_user')->row();
	}

	function loginAdmin($data)
	{
		$this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);
		return $this->db->get('tb_admin')->row();	
	}

	function insert($data)
	{
		$this->db->where('email', $data['email']);
		$user = $this->db->get('tb_user')->row();
		if ($user == null) {
			$this->db->insert('tb_user', $data);
			return 1;
		}else{
			return 0;
		}
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_user');
		return $this->db->affected_rows();
	}
}
 ?>