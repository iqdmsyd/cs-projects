<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('AdminModel');
    }
    //Load page Admin
	public function index()
	{
		$data['pel'] = $this->AdminModel->getAllPelanggan();
		$data['servis'] = $this->AdminModel->getAllServis();
		$data['mekanik'] = $this->AdminModel->getAllMekanik();
		$data['part'] = $this->AdminModel->getAllSparePart();
		$data['transaksipart'] = $this->AdminModel->getAllTransaksiPart();
		$data['transaksiservis'] = $this->AdminModel->getAllTransaksiServis();
		$this->load->view('admin/header');
		$this->load->view('admin/admin', $data);
	}

	function detailPart($id){
		$data['detail'] = $this->AdminModel->getTransaksiPartById($id);
		$this->load->view('admin/header');
		$this->load->view('admin/detail-part', $data);
	}

	function detailServis($id){
		$data['detail'] = $this->AdminModel->getTransaksiServisById($id);
		$this->load->view('admin/header');
		$this->load->view('admin/detail-servis', $data);
	}

	//Load page edit tabel pelanggan
	function editPelanggan($id){
		$data['pel'] = $this->AdminModel->getPelangganById($id);
		$this->load->view('admin/header');
		$this->load->view('admin/edit-pelanggan', $data);
	}

	//Proses edit tabel pelanggan
	public function prosessEditPelanggan($id){
		if(isset($_POST['submit'])){
			$data = array(
					'Nama' => $this->input->post('nama'),
					'STNK' => $this->input->post('stnk'),
					'Alamat' => $this->input->post('alamat'),
					'MerkMotor' => $this->input->post('merk')
				);
			$update = $this->AdminModel->updatePelanggan($id,$data);
			if($update > 0)
	        {
	            $this->session->set_flashdata('hasil','Update Data Pelanggan Berhasil <i class="fas fa-thumbs-up"></i>');
	        }else{
	           $this->session->set_flashdata('hasil','Update Data Pelanggan Gagal <i class="fas fa-thumbs-down"></i>');
	        }
	        redirect('Admin/editPelanggan/'.$id);
	    }else{
	    	$this->editPelanggan();
	    }
	}

	//Load page edit tabel Spare Part
	function editPart($id){
		$data['part'] = $this->AdminModel->getPartById($id);
		$this->load->view('admin/header');
		$this->load->view('admin/edit-part', $data);
	}

	//Proses edit tabel spare part
	public function prosesEditPart($id){
		if(isset($_POST['submit'])){
			$data = array(
					'NamaBarang' => $this->input->post('nama'),
					'Stok' => $this->input->post('stok'),
					'Harga' => $this->input->post('harga')
				);
			$updateP = $this->AdminModel->updatePart($id, $data);
			
			if($updateP > 0 || $updateS > 0)
	        {
	            $this->session->set_flashdata('hasil','Update Data Spare Part Berhasil <i class="fas fa-thumbs-up"></i>');
	        }else{
	           $this->session->set_flashdata('hasil','Update Data Spare Part Gagal <i class="fas fa-thumbs-down"></i>');
	        }
	        redirect('Admin/editPart/'.$id);
	    }else{
	    	$this->editPart();
	    }
	}

	//Load page edit tabel Mekanik
	function editMekanik($id){
		$data['mekanik'] = $this->AdminModel->getMekanikById($id);
		$this->load->view('admin/header');
		$this->load->view('admin/edit-mekanik', $data);
	}

	//Proses edit tabel Mekanik
	public function prosesEditMekanik($id){
		if(isset($_POST['submit'])){
			$data = array(
					'Nama' => $this->input->post('nama'),
					'Kontak' => $this->input->post('notlp'));
			$update = $this->AdminModel->updateMekanik($id,$data);
			if($update > 0)
	        {
	            $this->session->set_flashdata('hasil','Update Data Mekanik Berhasil <i class="fas fa-thumbs-up"></i>');
	        }else{
	           $this->session->set_flashdata('hasil','Update Data Mekanik Gagal <i class="fas fa-thumbs-down"></i>');
	        }
	        redirect('Admin/editMekanik/'.$id);
	    }else{
	    	$this->editMekanik();
	    }
	}

	//Load page edit tabel Servis
	function editServis($id){
		$data['servis'] = $this->AdminModel->getServisById($id);
		$this->load->view('admin/header');
		$this->load->view('admin/edit-servis', $data);
	}

	//Proses edit tabel Servis
	public function prosesEditServis($id){
		if(isset($_POST['submit'])){
			$data = array(
					'Kategori' => $this->input->post('kategori'),
					'Biaya' => $this->input->post('biaya'));
			$update = $this->AdminModel->updateServis($id,$data);
			if($update > 0)
	        {
	            $this->session->set_flashdata('hasil','Update Data Servis Berhasil <i class="fas fa-thumbs-up"></i>');
	        }else{
	           $this->session->set_flashdata('hasil','Update Data Servis Gagal <i class="fas fa-thumbs-down"></i>');
	        }
	        redirect('Admin/editServis/'.$id);
	    }else{
	    	$this->editServis();
	    }
	}

	//Load tabel Transaksi Part(Beli) + Proses Search By Month
	function laporanTransaksiPart(){
		$bulan = $this->input->post('bulan');
		if(!isset($bulan)){
			$data['transaksipart'] = $this->AdminModel->getAllTransaksiPart();
			$this->load->view('admin/header');
			$this->load->view('laporan/nav-laporan');
			$this->load->view('laporan/part/bulan', $data);
		}else{
			$data['transaksipart'] = $this->AdminModel->laporanPartByDate($bulan);
			$this->load->view('admin/header');
			$this->load->view('laporan/nav-laporan');
			$this->load->view('laporan/part/bulan', $data);
		}
	}

	function laporanTransaksiPartYear(){
		$tahun = $this->input->post('tahun');
		if(!isset($tahun)){
			$data['transaksipart'] = $this->AdminModel->getAllTransaksiPart();
			$this->load->view('admin/header');
			$this->load->view('laporan/nav-laporan');
			$this->load->view('laporan/part/tahun', $data);
		}else{
			$data['transaksipart'] = $this->AdminModel->laporanPartByYear($tahun);
			$this->load->view('admin/header');
			$this->load->view('laporan/nav-laporan');
			$this->load->view('laporan/part/tahun', $data);
		}
	}

	function laporanTransaksiPartDay(){
		$hari = $this->input->post('day');
		if(!isset($hari)){
			$data['transaksipart'] = $this->AdminModel->getAllTransaksiPart();
			$this->load->view('admin/header');
			$this->load->view('laporan/nav-laporan');
			$this->load->view('laporan/part/harian', $data);
		}else{
			$data['transaksipart'] = $this->AdminModel->laporanPartByDay($hari);
			$this->load->view('admin/header');
			$this->load->view('laporan/nav-laporan');
			$this->load->view('laporan/part/harian', $data);
		}
	}

	//Load tabel Transaksi Servis  + Proses Search By Month
	function laporanTransaksiServis(){
		$bulan = $this->input->post('bulan');
		if(!isset($bulan)){
			$data['transaksiservis'] = $this->AdminModel->getAllTransaksiServis();
			$this->load->view('admin/header');
			$this->load->view('laporan/nav-laporan');
			$this->load->view('laporan/servis/bulan', $data);
		}else{
			$data['transaksiservis'] = $this->AdminModel->laporanServisByDate($bulan);
			$this->load->view('admin/header');
			$this->load->view('laporan/nav-laporan');
			$this->load->view('laporan/servis/bulan', $data);
		}
	}

	function laporanTransaksiServisYear(){
		$tahun = $this->input->post('tahun');
		if(!isset($tahun)){
			$data['transaksiservis'] = $this->AdminModel->getAllTransaksiServis();
			$this->load->view('admin/header');
			$this->load->view('laporan/nav-laporan');
			$this->load->view('laporan/servis/tahun', $data);
		}else{
			$data['transaksiservis'] = $this->AdminModel->laporanServisByYear($tahun);
			$this->load->view('admin/header');
			$this->load->view('laporan/nav-laporan');
			$this->load->view('laporan/servis/tahun', $data);
		}
	}

	function laporanTransaksiServisDay(){
		$day = $this->input->post('day');
		if(!isset($day)){
			$data['transaksiservis'] = $this->AdminModel->getAllTransaksiServis();
			$this->load->view('admin/header');
			$this->load->view('laporan/nav-laporan');
			$this->load->view('laporan/servis/harian', $data);
		}else{
			$data['transaksiservis'] = $this->AdminModel->laporanServisByDay($day);
			$this->load->view('admin/header');
			$this->load->view('laporan/nav-laporan');
			$this->load->view('laporan/servis/harian', $data);
		}
	}

	//Proses Delete Transaksi Part
	function deleteTransaksiPart($id){ //done
		$this->AdminModel->deleteDetailTransaksiPart($id);
		$delete = $this->AdminModel->deleteTransaksiPart($id);
		redirect('Admin');
	}

	//Proses Delete Transaksi Servis
	function deleteTransaksiServis($id){//done
		$this->AdminModel->deleteDetailTransaksiServis($id);
		$this->AdminModel->deleteTransaksiServis($id);
		redirect('Admin');
	}

	//Load page form tambah Pelanggan
	function tambahPelanggan(){
		$this->load->view('admin/header');
		$this->load->view('admin/tambah-pelanggan');
	}

	//Proses Tambah Pelanggan
	function prosesTambahPelanggan(){
		if (isset($_POST['simpan'])) {
			$data = array(
					'Nama' => $this->input->post('nama'),
					'STNK' => $this->input->post('stnk'),
					'Alamat' => $this->input->post('alamat'),
					'MerkMotor' => $this->input->post('merk')
				);
			$hasil = $this->AdminModel->insertPelanggan($data);
			if($hasil)
            {
                $this->session->set_flashdata('hasil','Insert Data Pelanggan Berhasil <i class="fas fa-thumbs-up"></i>');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Pelanggan Gagal <i class="fas fa-thumbs-down"></i>');
            }
            redirect('Admin');
		}else{
			$this->tambahPelanggan();
		}
	}

	//Load page form tambah Mekanik
	function tambahMekanik(){
		$this->load->view('admin/header');
		$this->load->view('admin/tambah-mekanik');
	}

	//Proses Tambah Mekanik
	function prosesTambahMekanik(){
		if (isset($_POST['simpan'])) {
			$data = array(
					'Nama' => $this->input->post('nama'),
					'Kontak' => $this->input->post('notlp'));
			$hasil = $this->AdminModel->insertMekanik($data);
			if($hasil)
            {
                $this->session->set_flashdata('hasil','Insert Data Mekanik Berhasil <i class="fas fa-thumbs-up"></i>');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Mekanik Gagal <i class="fas fa-thumbs-down"></i>');
            }
            redirect('Admin');
		}else{
			$this->tambahMekanik();
		}
	}

	//Load page form tambah Servis
	function tambahServis(){
		$this->load->view('admin/header');
		$this->load->view('admin/tambah-servis');
	}

	//Proses Tambah Servis
	function prosesTambahServis(){
		if (isset($_POST['simpan'])) {
			$data = array(
					'Kategori' => $this->input->post('kategori'),
					'Biaya' => $this->input->post('biaya'));
			$hasil = $this->AdminModel->insertServis($data);
			if($hasil)
            {
                $this->session->set_flashdata('hasil','Insert Data Servis Berhasil <i class="fas fa-thumbs-up"></i>');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Servis Gagal <i class="fas fa-thumbs-down"></i>');
            }
            redirect('Admin');
		}else{
			$this->tambahServis();
		}
	}

	//Load page form tambah Spare Part
	function tambahPart(){
		$this->load->view('admin/header');
		$this->load->view('admin/tambah-part');
	}

	//Proses Tambah Part
	function prosesTambahPart(){
		if (isset($_POST['simpan'])) {
			$data = array(
					'NamaBarang' => $this->input->post('nama'),
					'Stok' => $this->input->post('stok'),
					'Harga' => $this->input->post('harga')
				);
			$loop = $data['Stok']; //Get number of Stok for looping
			$hasil = $this->AdminModel->insertPart($data); //insert tabel sparepart
			$id_brg = $hasil->ID; //Get ID tabel sparepart

			//Looping insert nomor seri
			for ($i = 0; $i < $loop ; $i++) {
				//Get random nomor seri
				$length = 8;
				$seri = substr(strtoupper(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ")), 0, $length);
				//insert to tabel stok_sparepart
				$result = $this->AdminModel->insertNoSeriPart($id_brg, $seri);
			}
			if($result)
            {
                $this->session->set_flashdata('hasil','Insert Data Spare Part Berhasil <i class="fas fa-thumbs-up"></i>');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Spare Part Gagal <i class="fas fa-thumbs-down"></i>');
            }
           redirect('Admin');
		}else{
			$this->tambahServis();
		}
	}

}
