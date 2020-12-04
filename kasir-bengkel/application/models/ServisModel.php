<?php 
/**
 * 
 */
class ServisModel extends CI_Model
{
	
	function __construct()
	{

	}


	// TRANSACTION QUERY
	function newTransaction($data)
	{
		$this->db->insert('transaksi_servis', $data);

		$this->db->limit(1);
		$this->db->order_by('ID', 'DESC');;
		return $this->db->get('transaksi_servis')->row();
	}

	function updateTransaction($ID, $qty, $total)
	{
		$this->db->set('Kuantitas', $qty);
		$this->db->set('TotalBiaya', $total);
		$this->db->where('ID', $ID);
		$this->db->update('transaksi_servis');
	}

	function updatePaymentTransaction($ID, $biaya, $kembalian)
	{
		$this->db->set('JumlahBiaya', $biaya);
		$this->db->set('Kembalian', $kembalian);
		$this->db->where('ID', $ID);
		$this->db->update('transaksi_servis');
	}

	function endTransaction($ID)
	{
		$this->db->where('ID', $ID);
		$this->db->set('status', 1);
		$this->db->update('transaksi_servis');

		$this->db->where('ID_TransaksiServis', $ID);
		$this->db->set('TanggalSelesai', date('Y-m-d'));
		$this->db->update('detil_transaksiservis');
	}

	function getTransactionByID($ID)
	{
		$this->db->where('ID', $ID);
		return $this->db->get('transaksi_servis')->row();
	}

	function getAllTransaction()
	{
		return $this->db->query('SELECT T.*, P.Nama, P.STNK
											FROM transaksi_servis T
											JOIN pelanggan P ON T.ID_Pelanggan = P.ID ORDER BY T.ID DESC')->result();
	}	


	// KERANJANG QUERY
	function addKeranjang($data)
	{
		$this->db->insert('keranjang_servis', $data);

		$this->db->where('ID_TransaksiServis', $data['ID_TransaksiServis']);
		return $this->db->get('keranjang_servis')->result();
	}

	function getKeranjangByIDTransaction($id)
	{
		$this->db->where('ID_TransaksiServis', $id);
		return $this->db->get('keranjang_servis')->result();
	}

	function getKeranjang($ID)
	{
		$this->db->where('ID_TransaksiServis', $ID);
		return $this->db->get('keranjang_servis')->result();
	}

	function deleteKeranjang($ID)
	{
		$this->db->where('ID', $ID);
		$this->db->delete('keranjang_servis');
	}


	// DETIL TRANSACTION QUERY
	function addDetil($ID_TransaksiServis, $ID_Mekanik, $ID_Servis, $Biaya)
	{
		$data = array(
			'ID_TransaksiServis' => $ID_TransaksiServis,
			'ID_Mekanik' => $ID_Mekanik,
			'ID_Servis' => $ID_Servis,
			'TanggalSelesai' => null,
			'Biaya' => $Biaya
		);

		$this->db->insert('detil_transaksiservis', $data);
	}

	function getDetilByID($ID)
	{
		$this->db->where('ID_TransaksiServis', $ID);
		return $this->db->get('detil_transaksiservis')->row();
	}


	// KATEGORI SERVIS QUERY
	function getServisByNama($data)
	{
		$this->db->like('Kategori', $data);
		return $this->db->get('servis')->row();
	}



	// ADDITIONAL
	function register($data)
	{
		$this->db->insert('pelanggan', $data);
	}	

	function getMekanik()
	{
		return $this->db->get('mekanik')->result();
	}

	function getMekanikID($nama)
	{
		$this->db->where('Nama', $nama);
		return $this->db->get('mekanik')->row();
	}

	function getPelanggan($ID)
	{
		$this->db->where('ID', $ID);
		return $this->db->get('pelanggan')->row();
	}

	function searchStnk($stnk)
	{
		$this->db->like('STNK', $stnk);
		return $this->db->get('pelanggan')->row();
	}

	function getPelangganByID($id)
	{
		$this->db->where('ID', $id);
		return $this->db->get('pelanggan')->row();
	}	
}
 ?>