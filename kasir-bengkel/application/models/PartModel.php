<?php 
/**
 * 
 */
class PartModel extends CI_Model
{
	
	function __construct()
	{

	}


	// TRANSCATION QUERY
	function newTransaction($nama)
	{
		$data = array(
			'NamaPelanggan' => $nama,
			'Tanggal' => date("Y-m-d"),
			'Kuantitas' => 0,
			'TotalHarga' => 0,
			'Status' => 1,
			'TotalBayar' => 0,
			'Kembalian' => 0
		);

		$this->db->insert('transaksi_beli', $data);

		$this->db->limit(1);
		$this->db->order_by('ID', 'DESC');;
		return $this->db->get('transaksi_beli')->row();
	}

	function updateTransaction($ID, $qty, $total)
	{
		$this->db->set('Kuantitas', $qty);
		$this->db->set('TotalHarga', $total);
		$this->db->where('ID', $ID);
		$this->db->update('transaksi_beli');
	}

	function updatePaymentTransaction($ID, $bayar, $kembalian)
	{
		$this->db->set('TotalBayar', $bayar);
		$this->db->set('Kembalian', $kembalian);
		$this->db->set('Status', 1);
		$this->db->where('ID', $ID);
		$this->db->update('transaksi_beli');
	}

	function cancelTransaction($ID)
	{
		$this->db->set('Status', 0);
		$this->db->where('ID', $ID);
		$this->db->update('transaksi_beli');
	}

	function getAllTransaction()
	{
		$this->db->order_by('ID', 'DESC');
		return $this->db->get('transaksi_beli')->result();
	}

	function getTransactionByName($nama)
	{
		$this->db->where('NamaPelanggan', $nama);
		return $this->db->get('transaksi_beli')->result();
	}

	function getTransactionByID($ID)
	{
		$this->db->where('ID', $ID);
		return $this->db->get('transaksi_beli')->row();
	}


	// KERANJANG QUERY
	function addKeranjang($data)	
	{
		$this->db->insert('keranjang_beli', $data);

		$this->db->where('ID_TransaksiBeli', $data['ID_TransaksiBeli']);
		return $this->db->get('keranjang_beli')->result();
	}

	function deleteKeranjang($ID)
	{
		$this->db->where('ID_TransaksiBeli', $ID);
		$this->db->delete('keranjang_beli');
	}	

	function getKeranjangByIDTransaction($ID)
	{
		$this->db->where('ID_TransaksiBeli', $ID);
		return $this->db->get('keranjang_beli')->result();
	}


	// DETIL TRANSAKSI QUERY
	function addDetilTransaction($ID_TransaksiBeli, $barang, $data)
	{
		foreach ($data as $value) {
			$detil = array(
				'ID_TransaksiBeli' => $ID_TransaksiBeli,
				'ID_Barang' => $barang->ID,
				'NomorSeri' => $value->NomorSeri,
				'Harga' => $barang->Harga
			);
			$this->db->insert('detil_transaksibeli', $detil);
		}
		return 1;
	}

	function deleteDetilTransaction($ID)
	{
		$this->db->where('ID_TransaksiBeli', $ID);
		$this->db->delete('detil_transaksibeli');		
	}	


	// SPAREPART QUERY
	function getBarangByNama($data)
	{
		$this->db->like('NamaBarang', $data);
		return $this->db->get('sparepart')->row();
	}

	function updateStokBarang($barang, $qty)
	{
		$this->db->set('Stok', $barang->Stok - $qty);
		$this->db->where('ID', $barang->ID);
		$this->db->update('sparepart');
	}	

	function updateStokBarangBack($barang, $qty)
	{
		$this->db->set('Stok', $barang->Stok + $qty);
		$this->db->where('ID', $barang->ID);
		$this->db->update('sparepart');
	}


	// STOK SPAREPART QUERY
	function getNoSeri($ID, $jumlah)
	{
		$this->db->where('ID_Barang', $ID);
		$this->db->limit($jumlah);
		return $this->db->get('stok_sparepart')->result();
	}

	function deleteStok($ID, $jumlah)
	{
		$this->db->where('ID_Barang', $ID);
		$this->db->limit($jumlah);
		$this->db->delete('stok_sparepart');
	}
}
 ?>