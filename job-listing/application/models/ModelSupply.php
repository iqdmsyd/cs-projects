<?php
/**
 *
 */
class ModelSupply extends CI_Model
{

  // CRUD Supply
  public function getAllSupply($number, $offset)
  {
    $this->db->select('tb_lowongan_kerja.ID, tb_lowongan_kerja.Judul, tb_lowongan_kerja.Kategori, tb_lowongan_kerja.Deskripsi, tb_lowongan_kerja.Pendaftar, tb_lowongan_kerja.Kuota, tb_lowongan_kerja.Kecamatan, tb_lowongan_kerja.Gaji');
    $this->db->from('tb_lowongan_kerja');
    $this->db->join('tb_perusahaan', 'tb_perusahaan.ID = tb_lowongan_kerja.ID_Perusahaan');
    $this->db->order_by('tb_lowongan_kerja.ID', 'desc');
    return $this->db->get('', $number, $offset)->result();
  }

  public function getAllSupplyByKategori($ID, $number, $offset, $kategori)
  {
      $this->db->select('*');
      $this->db->from('tb_lowongan_kerja');
      $this->db->where('ID_Perusahaan', $ID); //change this
      $this->db->order_by('ID', 'desc');
      if ($kategori != "Kategori") {
        $this->db->where('Kategori', $kategori);
      }

      $getData = $this->db->get('');

      if ($getData->num_rows() > 0)
        return $getData->result();
      else
        return NULL;
  }

  public function getSupplyByLokasi()
  {
    $query = $this->db->query("SELECT Kecamatan, COUNT(*) AS 'Total' FROM tb_lowongan_kerja GROUP BY Kecamatan ORDER BY Total DESC");
    return $query->result();
  }

  public function getSupplyByKategori()
  {
    $query = $this->db->query("SELECT Kategori, COUNT(*) AS 'Total' FROM tb_lowongan_kerja GROUP BY Kategori ORDER BY Total DESC");
    return $query->result();
  }

  public function getSupplyByRank()
  {
    $query = $this->db->query("SELECT * FROM tb_lowongan_kerja ORDER BY Pendaftar DESC LIMIT 3");
    return $query->result();
  }

  public function getSupplyByID($ID)
  {
    $this->db->where('ID', $ID);
    return $this->db->get('tb_lowongan_kerja')->row();
  }

  function searchSupply($data)
  {
    $this->db->where('Kategori', $data);
    return $this->db->get('tb_lowongan_kerja')->result();
  }

  public function addSupply($data)
  {
    return $this->db->insert('tb_lowongan_kerja', $data);
  }

  public function updateSupply($ID, $data)
  {
    $this->db->where('ID', $ID);
    return $this->db->update('tb_lowongan_kerja', $data);
  }

  public function deleteSupply($ID)
  {
    $this->db->where('ID', $ID);
    return $this->db->delete('tb_lowongan_kerja');
  }
  // End Of CRUD Lowongan Kerja
}

 ?>
