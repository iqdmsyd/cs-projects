<?php 
	/**
	* AdminModel.php
	*Model utuk admin
	*/
	class AdminModel extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		//GET ALL
		public function getAllPelanggan(){
			$this->db->select('*')->from('pelanggan');
			$query = $this->db->get();

			return $query->result();
		}

		public function getAllServis(){
			$this->db->select('*')->from('servis');
			$query = $this->db->get();

			return $query->result();
		}

		public function getAllMekanik(){
			$this->db->select('*')->from('mekanik');
			$query = $this->db->get();

			return $query->result();
		}

		public function getAllSparePart(){
			$this->db->select('sparepart.*')->from('sparepart');
			$query = $this->db->get();

			return $query->result();
		}

		public function getAllTransaksiPart(){
			$this->db->select('transaksi_beli.*, keranjang_beli.*')->from('transaksi_beli, keranjang_beli');
			$this->db->where('transaksi_beli.ID = keranjang_beli.ID_TransaksiBeli');
			$this->db->order_by('transaksi_beli.totalharga','desc');
			$this->db->group_by('transaksi_beli.ID');

			$query = $this->db->get();

			return $query->result();
		}

		public function getTransaksiPartById($id){
			$query = $this->db->query("SELECT P.ID, T.NamaBarang, A.NomorSeri, A.Harga
										FROM transaksi_beli P
										LEFT JOIN detil_transaksibeli A ON A.ID_TransaksiBeli = P.ID
										LEFT JOIN sparepart T ON T.ID = A.ID_Barang
                                        WHERE P.ID = '".$id."'
										ORDER BY P.ID ASC");

			return $query->result();
		}

		public function getAllTransaksiServis(){
			$this->db->select('transaksi_servis.*, keranjang_servis.*, pelanggan.nama AS NamaPelanggan, detil_transaksiservis.TanggalSelesai')->from('transaksi_servis, keranjang_servis, pelanggan, detil_transaksiservis');
			$this->db->where('transaksi_servis.ID = keranjang_servis.ID_Transaksiservis AND transaksi_servis.ID_Pelanggan = pelanggan.ID AND transaksi_servis.ID = detil_transaksiservis.ID_TransaksiServis');
			$this->db->order_by('transaksi_servis.totalbiaya','desc');
			$this->db->group_by('transaksi_servis.ID');

			$query = $this->db->get();

			return $query->result();
		}

		public function getTransaksiServisById($id){
			$query = $this->db->query("SELECT T.*, A.TanggalSelesai
										FROM transaksi_servis P
										LEFT JOIN keranjang_servis T ON T.ID_TransaksiServis = P.ID
										LEFT JOIN detil_transaksiservis A ON A.ID_TransaksiServis = P.ID
										WHERE P.ID = '".$id."' GROUP BY T.NamaJasa
										ORDER BY P.ID ASC");

			return $query->result();
		}

		//GET BY ID
		public function getPelangganById($id){
			$this->db->select('*')->from('pelanggan');
			$this->db->where('ID =', $id);
			$query = $this->db->get();

			return $query->result();
		}

		public function getPartById($id){
			$this->db->select('sparepart.*')->from('sparepart');
			$this->db->where('sparepart.ID =', $id);
			$query = $this->db->get();

			return $query->result();
		}

		public function getMekanikById($id){
			$this->db->select('*')->from('mekanik');
			$this->db->where('ID =', $id);
			$query = $this->db->get();

			return $query->result();
		}

		public function getServisById($id){
			$this->db->select('*')->from('servis');
			$this->db->where('ID =', $id);
			$query = $this->db->get();

			return $query->result();
		}
		
		//GET DATA BY MONTH
		public function laporanPartByDate($bulan){
			$this->db->select('transaksi_beli.*, detil_transaksiBeli.*')->from('transaksi_beli, detil_transaksiBeli');
			$this->db->where('transaksi_beli.ID = detil_transaksiBeli.ID_TransaksiBeli');
			$this->db->where('MONTH(Tanggal) =', $bulan);
			$this->db->order_by('transaksi_beli.totalharga','desc');
			$this->db->group_by('transaksi_beli.ID');

			$query = $this->db->get();

			return $query->result();
		}
		//GET DATA BY Year
		public function laporanPartByYear($tahun){
			$this->db->select('transaksi_beli.*, detil_transaksiBeli.*')->from('transaksi_beli, detil_transaksiBeli');
			$this->db->where('transaksi_beli.ID = detil_transaksiBeli.ID_TransaksiBeli');
			$this->db->where('YEAR(Tanggal) =', $tahun);
			$this->db->order_by('transaksi_beli.totalharga','desc');
			$this->db->group_by('transaksi_beli.ID');

			$query = $this->db->get();

			return $query->result();
		}
		//GET DATA BY Day
		public function laporanPartByDay($day){
			$this->db->select('transaksi_beli.*, detil_transaksiBeli.*')->from('transaksi_beli, detil_transaksiBeli');
			$this->db->where('transaksi_beli.ID = detil_transaksiBeli.ID_TransaksiBeli');
			$this->db->where('Tanggal', $day);
			$this->db->order_by('transaksi_beli.totalharga', 'desc');
			$this->db->group_by('transaksi_beli.ID');

			$query = $this->db->get();
			return $query->result();
		}

		public function laporanServisByDate($bulan){
			$this->db->select('transaksi_servis.*, detil_transaksiservis.*, pelanggan.nama AS NamaPelanggan, mekanik.nama AS NamaMekanik, servis.Kategori')->from('transaksi_servis, detil_transaksiservis, pelanggan, mekanik, servis');
			$this->db->where('transaksi_servis.ID = detil_transaksiservis.ID_Transaksiservis AND transaksi_servis.ID_Pelanggan = pelanggan.ID AND detil_transaksiservis.ID_Mekanik = mekanik.ID AND detil_transaksiservis.ID_Servis = servis.ID');
			$this->db->where('MONTH(TanggalMulai) =', $bulan);
			$this->db->order_by('transaksi_servis.totalbiaya','desc');
			$this->db->group_by('transaksi_servis.ID');

			$query = $this->db->get();

			return $query->result();
		}

		public function laporanServisByYear($tahun){
			$this->db->select('transaksi_servis.*, detil_transaksiservis.*, pelanggan.nama AS NamaPelanggan, mekanik.nama AS NamaMekanik, servis.Kategori')->from('transaksi_servis, detil_transaksiservis, pelanggan, mekanik, servis');
			$this->db->where('transaksi_servis.ID = detil_transaksiservis.ID_Transaksiservis AND transaksi_servis.ID_Pelanggan = pelanggan.ID AND detil_transaksiservis.ID_Mekanik = mekanik.ID AND detil_transaksiservis.ID_Servis = servis.ID');
			$this->db->where('YEAR(TanggalMulai) =', $tahun);
			$this->db->order_by('transaksi_servis.totalbiaya','desc');
			$this->db->group_by('transaksi_servis.ID');

			$query = $this->db->get();

			return $query->result();
		}

		public function laporanServisByDay($day){
			$this->db->select('transaksi_servis.*, detil_transaksiservis.*, pelanggan.nama AS NamaPelanggan, mekanik.nama AS NamaMekanik, servis.Kategori')->from('transaksi_servis, detil_transaksiservis, pelanggan, mekanik, servis');
			$this->db->where('transaksi_servis.ID = detil_transaksiservis.ID_Transaksiservis AND transaksi_servis.ID_Pelanggan = pelanggan.ID AND detil_transaksiservis.ID_Mekanik = mekanik.ID AND detil_transaksiservis.ID_Servis = servis.ID');
			$this->db->where('TanggalMulai =', $day);
			$this->db->order_by('transaksi_servis.totalbiaya','desc');
			$this->db->group_by('transaksi_servis.ID');

			$query = $this->db->get();

			return $query->result();
		}

		//INSERT TABEL
		public function insertMekanik($data){
			$this->db->insert('mekanik', $data);
			return $this->db->affected_rows();
		}

		public function insertPelanggan($data){
			$this->db->insert('pelanggan', $data);
			return $this->db->affected_rows();
		}

		public function insertServis($data){
			$this->db->insert('servis', $data);
			return $this->db->affected_rows();
		}		

		public function insertPart($data){
			$this->db->insert('sparepart', $data);
			//$id_barang = $this->db->insert_id();
			$this->db->limit(1);
			$this->db->order_by('ID', 'desc');
			return $this->db->get('sparepart')->row();
		}

		public function insertNoSeriPart($id, $seri){
			$dat = array('ID_Barang' => $id, 'NomorSeri' => $seri);
			$this->db->insert('stok_sparepart', $dat);

			return $this->db->affected_rows();
		}

		//UPDATE TABEL
		public function updatePelanggan($id, $data){
			$this->db->where('ID', $id);
			$this->db->update('pelanggan', $data);
			return $this->db->affected_rows();
		}

		public function updatePart($id, $data){
			$this->db->where('ID', $id);
			$this->db->update('sparepart', $data);
			return $this->db->affected_rows();
		}

		public function updateMekanik($id, $data){
			$this->db->where('ID', $id);
			$this->db->update('mekanik', $data);
			return $this->db->affected_rows();
		}

		public function updateServis($id, $data){
			$this->db->where('ID', $id);
			$this->db->update('servis', $data);
			return $this->db->affected_rows();
		}

		//DELETE TRANSAKSI
		public function deleteTransaksiPart($id){
			$this->db->where('id', $id);
			$this->db->delete('transaksi_beli');
		}

		public function deleteDetailTransaksiPart($id){
			$this->db->where('ID_TransaksiBeli', $id);
			$this->db->delete('detil_transaksibeli');
		}

		public function deleteTransaksiServis($id){
			$this->db->where('id', $id);
			$this->db->delete('transaksi_servis');
		}

		public function deleteDetailTransaksiServis($id){
			$this->db->where('ID_TransaksiServis', $id);
			$this->db->delete('detil_transaksiservis');
		}

	}
 ?>