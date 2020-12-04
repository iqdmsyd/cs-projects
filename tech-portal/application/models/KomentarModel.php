<?php 
/**
 * 
 */
class KomentarModel extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	function getAll()
	{
		return $this->db->get('tb_komentar')->result();
	}

	function getByID($id)
	{
		$this->db->where('id_berita', $id);
		return $this->db->get('tb_komentar')->result();
	}

	function filterBy($id, $sort)
	{
		$this->db->where('id_berita', $id);
		if ($sort == 'terbaru') {
			$this->db->order_by('id', 'DESC');
		}
		elseif ($sort == 'terlama') {
			$this->db->order_by('id', 'ASC');
		}

		return $this->db->get('tb_komentar')->result();
	}

	function addKomentar($data)
	{
		$this->db->insert('tb_komentar', $data);
		$this->db->query('UPDATE tb_berita SET komentar = komentar + 1 WHERE id = '.$data['id_berita'].'');
	}

	function delete($id, $id_berita)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_komentar');
		$this->db->set('komentar', 'komentar-1');
		$this->db->where('id', $id_berita);
		$this->db->update('tb_berita');
		return $this->db->affected_rows();
	}

	
}

 ?>