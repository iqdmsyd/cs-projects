<?php
class GrafikModel extends CI_Model{

	function get_data_stok(){
        $this->db->select('COUNT(ID_Mekanik) AS Mekanik, Nama')->from('detil_transaksiservis, Mekanik');
        $this->db->where('detil_transaksiservis.ID_Mekanik = Mekanik.ID');
        $this->db->group_by('Nama');
        $this->db->order_by('COUNT(ID_Mekanik)', 'desc');	
        return $this->db->get()->result_array();
    }

}