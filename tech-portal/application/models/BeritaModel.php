<?php 
/**
 * 
 */
class BeritaModel extends CI_Model
{
	
	function __construct()
	{
		
	}

	function getAll()
	{
		return $this->db->get('tb_berita')->result();
	}

	function getByID($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('tb_berita')->row();
	}

	function getLimit()
	{
		return $this->db->get('tb_berita', 4, rand(1, 20))->result();
	}

	function getTerpopuler()
	{
		$this->db->where('komentar > ', 3);
		return $this->db->get('tb_berita', 5, 0)->result();
	}

	function getTerbaru()
	{
		$this->db->order_by('id', 'DESC');
		return $this->db->get('tb_berita', 5)->result();
	}

	function getSearch($string)
	{
		$where = "judul LIKE '%".$string."%'";
		$this->db->where($where);
		return $this->db->get('tb_berita')->result();
	}

	function getByKategori($kategori)
	{
		$this->db->where('kategori', $kategori);
		return $this->db->get('tb_berita')->result();
	}

	function filterBy($filter, $value, $sort)
	{
		if ($filter == 'judul') {
			$where = "judul LIKE '%".$value."%'";
			$this->db->where($where);
		}
		elseif ($filter == 'author') {
			$where = "author LIKE '%".$value."%'";
			$this->db->where($where);
		}
		elseif ($filter == 'kategori') {
			$this->db->where('kategori', $value);	
		}

		if ($sort == 'komentar-asc') {
			$this->db->order_by('komentar', 'ASC');
		}
		elseif ($sort == 'komentar-desc') {
			$this->db->order_by('komentar', 'DESC');
		}
		elseif ($sort == 'terbaru') {
			$this->db->order_by('id', 'DESC');
		}
		elseif ($sort == 'terlama') {
			$this->db->order_by('id', 'ASC');
		}

		return $this->db->get('tb_berita')->result();
	}

	function add($data)
	{
		$this->db->insert('tb_berita', $data);
		return $this->db->affected_rows();
	}

	function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tb_berita', $data);
		return $this->db->affected_rows();
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_berita');
		return $this->db->affected_rows();
	}


}
 ?>