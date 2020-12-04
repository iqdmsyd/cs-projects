<?php
/**
 *
 */
class ModelCompany extends CI_Model
{

  // CRUD Perusahaan
  public function getAllCompany($number, $offset)
  {
    $this->db->select('*');
    $this->db->from('tb_perusahaan');
    $this->db->order_by('ID', 'desc');
    return $this->db->get('', $number, $offset)->result();
  }

  public function getCompanyByID($ID)
  {
      $this->db->where('ID', $ID);
      return $this->db->get('tb_perusahaan')->row();
  }

  public function getCompanyByIDSupply($ID)
  {
    $this->db->select('*');
    $this->db->from('tb_lowongan_kerja');
    $this->db->join('tb_perusahaan', 'tb_perusahaan.ID = tb_lowongan_kerja.ID_Perusahaan');
    $this->db->where('tb_lowongan_kerja.ID', $ID);
    return $this->db->get()->row();
  }

  public function insertCompany($data)
  {
    return $this->db->insert('tb_perusahaan', $data);
  }

  public function updateCompany($ID, $data)
  {
    $this->db->where('ID', $ID);
    return $this->db->update('tb_perusahaan', $data);
  }

  public function applySupply($data)
  {
    $this->db->insert('tb_apply', $data);

    $this->db->set('Pendaftar', 'Pendaftar+1', FALSE);
    $this->db->where('ID', $data['ID_Lowongan']);
    return $this->db->update('tb_lowongan_kerja');
  }

  public function auth($email, $password)
  {
    $this->db->where('Email', $email);
    $this->db->where('Password', $password);
    return $this->db->get('tb_perusahaan')->row();
  }

}

 ?>
