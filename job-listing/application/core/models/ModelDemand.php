<?php
/**
 *
 */
class ModelDemand extends CI_Model
{
  
  // CRUD Demand data
  public function getAll($number, $offset, $kecamatan)
  {
    $this->db->select('*');
    $this->db->from('tb_demand');
    if ($kecamatan != "Kecamatan") {
      $this->db->where('Kecamatan', $kecamatan);
    }

    $getData = $this->db->get('', $number, $offset);

    if ($getData->num_rows() > 0)
      return $getData->result();
    else
      return NULL;
  }

  public function getDemandByNIK($NIK)
  {
    $this->db->where('NIK', $NIK);
    return $this->db->get('tb_demand')->row();
  }

  public function insertDemand($data)
  {
    return $this->db->insert('tb_demand', $data);
  }

  public function updateDemand($ID, $data)
  {
    $this->db->where('ID', $ID);
    return $this->db->update('tb_demand', $data);
  }

  public function deleteDemand($ID)
  {
    $this->db->where('ID', $ID);
    return $this->db->delete('tb_demand');
  }
  // End of CRUD Demand data

}


 ?>
