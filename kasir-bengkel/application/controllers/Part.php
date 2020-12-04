<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Part extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('isLogin')) {
			$this->load->view('part-views/header');
			$this->load->view('part-views/keranjang');
			$this->load->view('part-views/footer');
		}
		else
		{
			redirect(base_url("Login"));
		}
	}

	public function new()
	{
		if ($this->input->post('submit') != null) {
			$nama_pelanggan = $this->input->post('nama');
			$transaksi = $this->PartModel->newTransaction($nama_pelanggan);
			if ($transaksi != null) {
				$this->session->set_userdata('transaksi', $transaksi);
				$this->load->view('part-views/header');
				$this->load->view('part-views/keranjang');
				$this->load->view('part-views/footer');
			}
		}
	}

	public function search()
	{
		if ($this->input->get('submit') != null) {
			$barang = $this->input->get('nama');
			$meta['barang'] = $this->PartModel->getBarangByNama($barang);
			$this->load->view('part-views/header', $meta);
			$this->load->view('part-views/keranjang');
			$this->load->view('part-views/footer');	
		}
	}

	public function add()
	{
		if ($this->input->post('submit') != null) {
			//Data untuk insert keranjang beli
			$data = array(
				'ID_TransaksiBeli' => $this->input->post('id_transaksi'),
				'NamaBarang' => $this->input->post('nama_barang'),
				'Jumlah' => $this->input->post('jumlah'),
				'Harga' => $this->input->post('harga'),
				'Total' => $this->input->post('harga') * $this->input->post('jumlah')
			);

			$keranjang = $this->PartModel->addKeranjang($data);
			$this->session->set_userdata('keranjang', $keranjang);

			$jum_pesan = count($keranjang);
			$jum_part = 0;
			$total_bayar = 0;
			foreach ($keranjang as $value) {
				$jum_part += $value->Jumlah;
				$total_bayar += $value->Total;
			}

			$this->session->set_userdata('jum_pesan', $jum_pesan);
			$this->session->set_userdata('jum_part', $jum_part);
			$this->session->set_userdata('total_bayar', $total_bayar);

			//Ambil data stok barang
			$barang = $this->PartModel->getBarangByNama($data['NamaBarang']);
			$detil = $this->PartModel->getNoSeri($barang->ID, $data['Jumlah']);

			//Insert tabel detil_transaksi
			$insert = $this->PartModel->addDetilTransaction($data['ID_TransaksiBeli'], $barang, $detil);

			//Update transaksi_beli
			$this->PartModel->updateTransaction($data['ID_TransaksiBeli'], $jum_part, $total_bayar);

			//Update sparepart (stok)
			$this->PartModel->updateStokBarang($barang, $data['Jumlah']);

			$this->load->view('part-views/header');
			$this->load->view('part-views/keranjang');
			$this->load->view('part-views/footer');	
		}
	}

	public function cancel()
	{
		$transaksi = $this->session->userdata('transaksi');
		$keranjang = $this->session->userdata('keranjang');

		if (isset($keranjang)) {
			//Update stok barang
			foreach ($keranjang as $value) {
				$barang = $this->PartModel->getBarangByNama($value->NamaBarang);
				$this->PartModel->updateStokBarangBack($barang, $value->Jumlah);
			}
		}

		//Update transaksi (status di 0 kan)
		$this->PartModel->cancelTransaction($transaksi->ID);

		$this->clear();
		$meta['canceled'] = 'Transaksi telah dibatalkan.';
		
		$this->load->view('part-views/header', $meta);
		$this->load->view('part-views/keranjang');
		$this->load->view('part-views/footer');
	}

	public function pay()
	{
		$sisa_bayar = $this->input->get('jumlahbayar') - $this->session->userdata('total_bayar');
		$jum_bayar = $this->input->get('jumlahbayar');

		$this->session->set_userdata('jum_bayar', $jum_bayar);
		$this->session->set_userdata('sisa_bayar', $sisa_bayar);

		$this->PartModel->UpdatePaymentTransaction($this->session->userdata('transaksi')->ID, $jum_bayar, $sisa_bayar);

		$meta['done'] = 1;

		$this->load->view('part-views/header');
		$this->load->view('part-views/keranjang', $meta);
		$this->load->view('part-views/footer', $meta);
	}

	public function done()
	{
		$meta['keranjang'] = $this->session->userdata('keranjang');

		//Delete nomor seri <WARNING>
		// foreach ($this->session->userdata('keranjang') as $value) {
		// 	$ID = $this->PartModel->getBarangByNama($value->NamaBarang)->ID;
		// 	$this->PartModel->deleteStok($ID, $value->Jumlah);	
		// }

		$this->clear();

		$this->load->view('part-views/header');
		$this->load->view('part-views/keranjang');
		$this->load->view('part-views/footer');	
	}

	public function clear()
	{
		$this->session->unset_userdata('keranjang');
		$this->session->unset_userdata('transaksi');
		$this->session->unset_userdata('jum_pesan');
		$this->session->unset_userdata('jum_part');
		$this->session->unset_userdata('total_bayar');
		$this->session->unset_userdata('jum_bayar');
		$this->session->unset_userdata('sisa_bayar');
	}

	public function list()
	{
		$meta['list_transaksi'] = $this->PartModel->getAllTransaction();

		$this->load->view('part-views/riwayat', $meta);
	}

	public function searchHistory()
	{
		if ($this->input->get('submit') != null) {
			$nama_pelanggan = $this->input->get('nama');
			$meta['list_transaksi'] = $this->PartModel->getTransactionByName($nama_pelanggan);

			if ($meta['list_transaksi'] != null) {
				// $this->session->set_userdata('transaksi', $meta['list_transaksi']);
				$this->load->view('part-views/riwayat', $meta);
			}
		}		
	}

	public function edit($ID)
	{
		$transaksi = $this->PartModel->getTransactionByID($ID);
		$this->session->set_userdata('transaksi', $transaksi);

		$keranjang = $this->PartModel->getKeranjangByIDTransaction($ID);
		$this->session->set_userdata('keranjang', $keranjang);

		$jum_pesan 		= count($keranjang);
		$jum_part 		= $transaksi->Kuantitas;
		$total_bayar 	= $transaksi->TotalHarga;
		$jum_bayar 		= $transaksi->TotalBayar;
		$sisa_bayar 	= $transaksi->Kembalian;

		$this->session->set_userdata('jum_pesan', $jum_pesan);
		$this->session->set_userdata('jum_part', $jum_part);
		$this->session->set_userdata('total_bayar', $total_bayar);
		$this->session->set_userdata('jum_bayar', $jum_bayar);
		$this->session->set_userdata('sisa_bayar', $sisa_bayar);

		// print_r($transaksi);
		// echo "<br>";
		// print_r($keranjang);
		// echo "<br>";
		// echo $jum_pesan;
		// echo $jum_part;
		// echo $total_bayar;
		// echo $jum_bayar;
		// echo $sisa_bayar;


		redirect("Part");

	}

}
