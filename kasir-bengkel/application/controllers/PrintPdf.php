<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrintPdf extends CI_Controller {

	function __construct()
	{
    parent::__construct();
    $this->load->library('pdf');
	}
    
	function Part($ID)
	{
		$pdf = new FPDF('P','mm', array(120, 200));
		// membuat halaman baru
		$pdf->AddPage();
		// $pdf->SetMargins(20, 20, 20);

		$transaksi = $this->PartModel->getTransactionByID($ID);
		$keranjang = $this->PartModel->getKeranjangByIDTransaction($ID);

		$pdf->SetFont('Courier', '', 20);
		$pdf->Cell(0, 8, "Bengkel Pastiberes", 0, 1, 'C');

		$pdf->SetFont('Courier', '', 10);
		$pdf->Cell(0, 5, "PT. Ingin Sukses Ya Usahadong", 0, 1, 'C');
		$pdf->Cell(0, 5, "Jl. Harapan Bersamanya No. 23", 0, 1, 'C');
		$pdf->Cell(0, 5, "No. Telp 021121111", 0, 1, 'C');

		$pdf->Cell(0, 3, "________________________________________________", 0, 1, 'C');
		$pdf->Ln(2);

		$timestamp = strtotime($transaksi->Tanggal);

		$pdf->SetFont('Courier', '', 10);
		$pdf->Cell(13, 5, "No Trs", 0, 0, 'L');
		$pdf->Cell(5, 5, ":", 0, 0, 'L');
		$pdf->Cell(20, 5, $transaksi->ID, 0, 0, 'L');
		$pdf->Cell(0, 5, date('d F Y', $timestamp), 0, 1, 'R');

		$pdf->Cell(13, 5, "Nama", 0, 0, 'L');
		$pdf->Cell(5, 5, ":", 0, 0, 'L');
		$pdf->Cell(20, 5, $transaksi->NamaPelanggan, 0, 1, 'L');

		$pdf->Cell(0, 4, "===============================================", 0, 1, 'C');
		$pdf->Ln(2);

		$pdf->SetFont('Courier', 'B', 10);
		$pdf->Cell(20, 5, 'Qty', 0, 0, 'L');
		$pdf->Cell(50, 5, 'Item', 0, 0, 'L');
		$pdf->Cell(0, 5, 'Total (Rp)', 0, 1, 'R');

		$pdf->SetFont('Courier', '', 10);
		foreach ($keranjang as $value) {
			$pdf->Cell(20, 5, $value->Jumlah, 0, 0, 'L');
			$pdf->Cell(50, 5, $value->NamaBarang, 0, 0, 'L');
			$pdf->Cell(0, 5, $value->Total, 0, 1, 'R');
		}

		$pdf->Cell(0, 3, "________________________________________________", 0, 1, 'C');
		$pdf->Ln(2);

		$pdf->SetFont('Courier', 'B', 10);
		$pdf->Cell(50, 5, '', 0, 0, 'L');
		$pdf->Cell(30, 5, 'Total bayar', 0, 0, 'L');
		$pdf->Cell(0, 5, $transaksi->TotalHarga, 0, 1, 'R');

		$pdf->SetFont('Courier', 'B', 10);
		$pdf->Cell(50, 5, '', 0, 0, 'L');
		$pdf->Cell(30, 5, 'Bayar', 0, 0, 'L');
		$pdf->SetFont('Courier', '', 10);
		$pdf->Cell(0, 5, $transaksi->TotalBayar, 0, 1, 'R');

		$pdf->SetFont('Courier', 'B', 10);
		$pdf->Cell(50, 5, '', 0, 0, 'L');
		$pdf->Cell(30, 5, 'Kembalian', 0, 0, 'L');
		$pdf->SetFont('Courier', '', 10);
		$pdf->Cell(0, 5, $transaksi->Kembalian, 0, 1, 'R');

		$pdf->Ln(10);
		
		$pdf->Cell(0, 5, 'Terima kasih telah berbelanja di bengkel Pastiberes', 0, 1, 'C');
		$pdf->Cell(0, 5, 'Barang yang sudah dibeli tidak dapat dikembalikan', 0, 1, 'C');
		$pdf->Cell(0, 5, 'Sukses selalu', 0, 1, 'C');


		$pdf->Output();
  }

  function Servis($ID)
  {
  	$pdf = new FPDF('L','mm', array(200, 150));
		// membuat halaman baru
		$pdf->AddPage();
		// $pdf->SetMargins(20, 20, 20);
		$transaksi = $this->ServisModel->getTransactionByID($ID);
		$pelanggan = $this->ServisModel->getPelangganByID($transaksi->ID_Pelanggan);
		$keranjang = $this->ServisModel->getKeranjangByIDTransaction($ID);

		$pdf->SetFont('Courier', '', 20);
		$pdf->Cell(0, 8, "Bengkel Pastiberes", 0, 1, 'C');
		$pdf->SetFont('Courier', '', 10);
		$pdf->Cell(0, 5, "PT. Ingin Sukses Ya Usahadong", 0, 1, 'C');
		$pdf->Cell(0, 5, "Jl. Harapan Bersamanya No. 23", 0, 1, 'C');
		$pdf->Cell(0, 5, "No. Telp 021121111", 0, 1, 'C');

		$pdf->Cell(0, 3, "___________________________________________________________________________________________", 0, 1, 'C');
		$pdf->Ln(2);

		//Nama pelanggan
		$pdf->Cell(23, 5, "Nama", 0, 0, 'L');
		$pdf->Cell(5, 5, ":", 0, 0, 'L');
		$pdf->Cell(77, 5, $pelanggan->Nama, 0, 0, 'L');

		//No transaksi
		$pdf->Cell(30, 5, "No. Transaksi", 0, 0, 'L');
		$pdf->Cell(5, 5, ":", 0, 0, 'L');
		$pdf->Cell(0, 5, $transaksi->ID, 0, 1, 'L');

		//Alamat
		$pdf->Cell(23, 5, "Alamat", 0, 0, 'L');
		$pdf->Cell(5, 5, ":", 0, 0, 'L');
		$pdf->Cell(77, 5, $pelanggan->Alamat, 0, 0, 'L');

		//Merk kendaraan
		$pdf->Cell(30, 5, "Merk Motor", 0, 0, 'L');
		$pdf->Cell(5, 5, ":", 0, 0, 'L');
		$pdf->Cell(0, 5, $pelanggan->MerkMotor, 0, 1, 'L');

		//No. telepon
		$pdf->Cell(23, 5, "No. Telepon", 0, 0, 'L');
		$pdf->Cell(5, 5, ":", 0, 0, 'L');
		$pdf->Cell(77, 5, $pelanggan->NoTelepon, 0, 0, 'L');

		//No kendaraan
		$pdf->Cell(30, 5, "No. Polisi", 0, 0, 'L');
		$pdf->Cell(5, 5, ":", 0, 0, 'L');
		$pdf->Cell(0, 5, $pelanggan->STNK, 0, 1, 'L');

		$timestamp = strtotime($transaksi->TanggalMulai);
		//Tgl servis
		$pdf->Cell(105, 5, "", 0, 0, 'L');
		$pdf->Cell(30, 5, "Tgl Mulai", 0, 0, 'L');
		$pdf->Cell(5, 5, ":", 0, 0, 'L');
		$pdf->Cell(0, 5, date('d F y', $timestamp), 0, 1, 'L');

		$detil = $this->ServisModel->getDetilByID($transaksi->ID);
		$timestamp2 = strtotime($detil->TanggalSelesai);
		$pdf->Cell(105, 5, "", 0, 0, 'L');
		$pdf->Cell(30, 5, "Tgl Selesai", 0, 0, 'L');
		$pdf->Cell(5, 5, ":", 0, 0, 'L');
		$pdf->Cell(0, 5, date('d F y', $timestamp2), 0, 1, 'L');

		$pdf->Cell(0, 5, "=======================================================================================", 0, 1, 'C');
		$pdf->Ln(1);

		//Header
		$pdf->SetFont('Courier', 'B', 10);
		$pdf->Cell(10, 5, 'Qty', 0, 0, 'L');
		$pdf->Cell(100, 5, 'Nama Jasa', 0, 0, 'L');
		$pdf->Cell(50, 5, 'Biaya (Rp)', 0, 0, 'L');
		$pdf->Cell(0, 5, 'Total (Rp)', 0, 1, 'R');

		$pdf->SetFont('Courier', '', 10);
		foreach ($keranjang as $value) {
			$pdf->Cell(10, 5, 1, 0, 0, 'L');
			$pdf->Cell(100, 5, $value->NamaJasa, 0, 0, 'L');
			$pdf->Cell(50, 5, $value->Biaya, 0, 0, 'L');
			$pdf->Cell(0, 5, $value->Biaya, 0, 1, 'R');
		}


		$pdf->Cell(0, 3, "___________________________________________________________________________________________", 0, 1, 'C');
		$pdf->Ln(2);


		$pdf->SetFont('Courier', 'B', 10);
		$pdf->Cell(110, 5, '', 0, 0, 'L');
		$pdf->Cell(30, 5, 'Total Biaya', 0, 0, 'L');
		$pdf->Cell(0, 5, $transaksi->TotalBiaya, 0, 1, 'R');

		$pdf->Cell(110, 5, '', 0, 0, 'L');
		$pdf->Cell(30, 5, 'Bayar', 0, 0, 'L');
		$pdf->SetFont('Courier', '', 10);
		$pdf->Cell(0, 5, $transaksi->JumlahBiaya, 0, 1, 'R');

		$pdf->SetFont('Courier', 'B', 10);
		$pdf->Cell(110, 5, '', 0, 0, 'L');
		$pdf->Cell(30, 5, 'Kembalian', 0, 0, 'L');
		$pdf->SetFont('Courier', '', 10);
		$pdf->Cell(0, 5, $transaksi->Kembalian, 0, 1, 'R');

		$pdf->Ln(10);
		
		$pdf->Cell(0, 5, 'Terima kasih telah melalukan servis di bengkel Pastiberes', 0, 1, 'C');
		$pdf->Cell(0, 5, 'Semoga kendaraan Anda sehat selalu', 0, 1, 'C');
		$pdf->Cell(0, 5, 'Sukses selalu', 0, 1, 'C');

		$pdf->Output();
  }
}
