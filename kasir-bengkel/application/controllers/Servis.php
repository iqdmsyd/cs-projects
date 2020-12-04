<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servis extends CI_Controller {

	public function index()
	{
		if ($this->session->has_userdata('isLogin')) {
			$mekanik = $this->ServisModel->getMekanik();
			$this->session->set_userdata('mekanik', $mekanik);
			$this->load->view('servis-views/header');
			$this->load->view('servis-views/keranjang');
			$this->load->view('servis-views/footer');
		}
		else
		{
			redirect(base_url("Login"));
		}
	}

	public function searchUser()
	{
		if ($this->input->get('submit') != null) {
			$stnk = $this->input->get('stnk');
			$pelanggan = $this->ServisModel->searchStnk($stnk);

			$this->session->set_userdata('pelanggan', $pelanggan);
			$this->load->view('servis-views/header');
			$this->load->view('servis-views/keranjang');
			$this->load->view('servis-views/footer');
		}
	}

	public function registrasi()
	{
		if ($this->input->post('submit') != null) {
			$data = array(
				'Nama' => $this->input->post('nama'),
				'STNK' => $this->input->post('stnk'),
				'Alamat' => $this->input->post('alamat'),
				'MerkMotor' => $this->input->post('merkmotor'),
			);

			$this->ServisModel->register($data);
			$this->load->view('servis-views/header');
			$this->load->view('servis-views/keranjang');
			$this->load->view('servis-views/footer');	
		}
		else
		{
			$this->load->view('servis-views/registrasi');
		}
	}

	function new()
	{
		$data = array(
			'ID_Pelanggan' => $this->session->userdata('pelanggan')->ID,
			'TanggalMulai' => date("Y-m-d"),
			'Kuantitas' => 0,
			'TotalBiaya' => 0,
			'Status' => 0
		);

		$servis = $this->ServisModel->newTransaction($data);
		if ($servis != null) {
			$this->session->set_userdata('servis', $servis);
			$this->load->view('servis-views/header');
			$this->load->view('servis-views/keranjang');
			$this->load->view('servis-views/footer');	
		} 
	}	

	public function search()
	{
		if ($this->input->get('submit') != null) {
			$servis = $this->input->get('kategori');
			$meta['servis'] = $this->ServisModel->getServisByNama($servis);
			$this->load->view('servis-views/header', $meta);
			$this->load->view('servis-views/keranjang');
			$this->load->view('servis-views/footer');	
		}
	}

	public function add()
	{
		if ($this->input->post('submit') != null) {
			//Data untuk input keranjang servis
			$data = array(
				'ID_TransaksiServis' => $this->input->post('id_transaksiservis'),
				'NamaJasa' => $this->input->post('kategori'),
				'Mekanik' => $this->input->post('mekanik'),
				'Biaya' => $this->input->post('biaya')
			);

			$keranjang = $this->ServisModel->addKeranjang($data);
			$this->session->set_userdata('keranjang_servis', $keranjang);

			$jum_jasa = count($keranjang);
			$total_biaya = 0;
			foreach ($keranjang as $value) {
				$total_biaya += $value->Biaya;
			}

			$this->session->set_userdata('jum_jasa', $jum_jasa);
			$this->session->set_userdata('total_biaya', $total_biaya);
			
			//Insert tabel detil transaksi servis
			$mekanik = $this->ServisModel->getMekanikID($data['Mekanik']);
			$this->ServisModel->addDetil($data['ID_TransaksiServis'], $mekanik->ID, $this->input->post('id_servis'), $data['Biaya']);

			//Update transaksi servis
			$this->ServisModel->updateTransaction($data['ID_TransaksiServis'], $jum_jasa, $total_biaya);

			$this->load->view('servis-views/header');
			$this->load->view('servis-views/keranjang');
			$this->load->view('servis-views/footer');	
		}
	}

	public function delete($ID)
	{
		$this->ServisModel->deleteKeranjang($ID);

		$keranjang = $this->ServisModel->getKeranjangByIDTransaction($this->session->userdata('servis')->ID);
		$this->session->set_userdata('keranjang_servis', $keranjang);

		$jum_jasa = count($keranjang);
		$total_biaya = 0;
		foreach ($keranjang as $value) {
			$total_biaya += $value->Biaya;
		}

		$this->session->set_userdata('jum_jasa', $jum_jasa);
		$this->session->set_userdata('total_biaya', $total_biaya);

		//Update transaksi servis
		$this->ServisModel->updateTransaction($this->session->userdata('servis')->ID, $jum_jasa, $total_biaya);

		$this->load->view('servis-views/header');
		$this->load->view('servis-views/keranjang');
		$this->load->view('servis-views/footer');
	}

	public function save()
	{
		$this->clear();
		$this->list();
	}

	public function pay()
	{
		$sisa_biaya = $this->input->get('jumlahbiaya') - $this->session->userdata('total_biaya');
		$jum_biaya = $this->input->get('jumlahbiaya');

		$this->session->set_userdata('jum_biaya', $jum_biaya);
		$this->session->set_userdata('sisa_biaya', $sisa_biaya);

		$this->ServisModel->UpdatePaymentTransaction($this->session->userdata('servis')->ID, $jum_biaya, $sisa_biaya);

		$this->ServisModel->endTransaction($this->session->userdata('servis')->ID);

		$meta['payed'] = 1;
		$this->load->view('servis-views/header');
		$this->load->view('servis-views/keranjang', $meta);
		$this->load->view('servis-views/footer');	
		// $this->done();
	}

	public function done()
	{
		$this->clear();

		$this->load->view('servis-views/header');
		$this->load->view('servis-views/keranjang');
		$this->load->view('servis-views/footer');	
	}

	public function list()
	{
		$this->clear();
		$meta['list'] = $this->ServisModel->getAllTransaction();

		$this->load->view('servis-views/header');
		$this->load->view('servis-views/list', $meta);
		$this->load->view('servis-views/footer');	
	}

	public function edit($ID, $ID_Pelanggan)
	{
		$pelanggan = $this->ServisModel->getPelanggan($ID_Pelanggan);
		$this->session->set_userdata('pelanggan', $pelanggan);

		$servis = $this->ServisModel->getTransactionByID($ID);
		$this->session->set_userdata('servis', $servis);

		$keranjang = $this->ServisModel->getKeranjangByIDTransaction($ID);
		$this->session->set_userdata('keranjang_servis', $keranjang);

		$jum_jasa 		= count($keranjang);
		$total_biaya 	= $servis->TotalBiaya;
		$jum_biaya 		= $servis->JumlahBiaya;
		$sisa_biaya 	= $servis->Kembalian;

		$this->session->set_userdata('jum_jasa', $jum_jasa);
		$this->session->set_userdata('total_biaya', $total_biaya);
		$this->session->set_userdata('jum_biaya', $jum_biaya);
		$this->session->set_userdata('sisa_biaya', $sisa_biaya);

		$this->load->view('servis-views/header');
		$this->load->view('servis-views/keranjang');
		$this->load->view('servis-views/footer');	
	}

	public function clear()
	{
		$this->session->unset_userdata('keranjang_servis');
		$this->session->unset_userdata('pelanggan');
		$this->session->unset_userdata('servis');
		$this->session->unset_userdata('jum_jasa');
		$this->session->unset_userdata('total_biaya');
		$this->session->unset_userdata('jum_biaya');
		$this->session->unset_userdata('sisa_biaya');
	}

}
