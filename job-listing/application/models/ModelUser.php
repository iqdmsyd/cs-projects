<?php
/**
 *
 */
class ModelUser extends CI_Model
{

  function add($data)
  {
    $this->db->where('Email', $data['Email']);
    if ($this->db->get('tb_user')->row() != NULL) {
      return FALSE;
    };

    $this->db->where('Username', $data['Username']);
    if ($this->db->get('tb_user')->row() != NULL) {
      return FALSE;
    };

    return $this->db->insert('tb_user', $data);
  }

  function getUser($data)
  {
    $this->db->where('Username', $data);
    return $this->db->get('tb_user')->row();
  }

  function auth($data)
  {
    $this->db->where('Username', $data['Username']);
    $this->db->where('Password', $data['Password']);
    return $this->db->get('tb_user')->row();
  }

}

 ?>
