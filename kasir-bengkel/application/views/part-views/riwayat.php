<!DOCTYPE html>
<html>
<head>
	<title>PastiBeres</title>
  <link rel="icon" href="<?php echo base_url("asset/icon.png") ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <style>
  	input[type=number] {
    	width: 50px;
		} 
		.w-input {
			width: 300px;
		}
		footer {
			position: fixed;
		}
  </style>
</head>
<body style="background-color: #EEEEEE">

	<!-- HEADER -->
	<div class="fixed-nav-bar">
		<div class="container" style="background-color: #DDDDDD; height: 100px">
			<!-- Info transaksi -->
			<div class="row">
				<div class="col-4 mt-3">
					<form action="<?php echo base_url("Part/searchHistory"); ?>" method="GET">
						<input type="text" name="nama" class="w-input" placeholder="Nama pelanggan" autofocus>
						<input type="submit" name="submit" value="Cari">
					</form>
				</div>
<!-- 				<div class="col-4 mr-auto mt-1">
					<table cellpadding="2px" cellspacing="0px">
						<tr>
							<td>No Transaksi</td>
							<td>:</td>
							<td>
								<?php if ($this->session->has_userdata('transaksi')) {
									echo $this->session->userdata('transaksi')->ID;
								} ?>
							</td>
						</tr>
						<tr>
							<td>Nama </td>
							<td>:</td>
							<td>
								<?php if ($this->session->has_userdata('transaksi')) {
									echo $this->session->userdata('transaksi')->NamaPelanggan;
								} ?>
							</td>
						</tr>
						<tr>
							<td>Tanggal</td>
							<td>:</td>
							<td><?php echo date("Y-m-d"); ?></td>
						</tr>
					</table>
				</div> -->
				<div class="col-2 ml-auto mt-1">
					<table cellpadding="2px" cellspacing="0px">
						<tr>
							<td>Kasir</td>
							<td>:</td>
							<td><?php echo $this->session->userdata('username'); ?></td>
						</tr>
						<tr>
							<td>Toko</td>
							<td>:</td>
							<td>Pastiberess</td>
						</tr>
					</table>			
				</div>
				<div class="col-1">
					<table cellpadding="2px" cellspacing="0px">
						<tr>
							<td>
								<a href="<?php echo site_url('Login/logout') ?>">Logout</a>
							</td>
						</tr>
					</table>			
				</div>		
			</div>
			<br>		
		</div>
	</div>
	
	<!-- LIST TRANSAKSI -->
	<div class="container" style="background-color: #DDDDDD">
		<div class="row">
			<div class="col-12">
				<div style="overflow-y: scroll; max-height: 356px;">
					<table class="table">
						<thead>
							<tr style="background-color: #C4DBEC">
								<td>No</td>
								<td>Nama Pelanggan</td>
								<td>Tanggal</td>
								<td>Kuantitas</td>
								<td>Total</td>
								<td>Status</td>
								<td>Total Bayar</td>
								<td>Total Kembali</td>
								<td></td>
								<td></td>
							</tr>
						</thead>
	 					<tbody>
							<?php $no=1; ?>
							<?php if (isset($list_transaksi)): ?>
								<?php foreach ($list_transaksi as $transaksi): ?>
									<tr style="background-color: white">
										<td><?php echo $no++ ?></td>
										<td><?php echo $transaksi->NamaPelanggan ?></td>
										<td><?php echo $transaksi->Tanggal ?></td>
										<td><?php echo $transaksi->Kuantitas ?></td>
										<td><?php echo $transaksi->TotalHarga ?></td>
										<?php
										if ($transaksi->Status == 0) {
											$status = "Dibatalkan";
										}
										else
											$status = "Berhasil";
										 ?>
										<td><?php echo $status ?></td>
										<td><?php echo $transaksi->TotalBayar ?></td>
										<td><?php echo $transaksi->Kembalian ?></td>
										<td>
											<a href="<?php echo site_url('Part/edit/'.$transaksi->ID) ?>">
												<button name="submit" style="padding: 5px 15px; font-size: 15px;">Edit</button>
											</a>
										</td>
										<?php if ($transaksi->Status == 1) { ?>
										<td>
											<a href="<?php echo site_url('PrintPdf/Part/'.$transaksi->ID) ?>" target="_blank">
												<button name="submit" style="padding: 5px 15px; font-size: 15px;">Cetak</button>
											</a>
										</td>
										<?php } else {?>
										<td></td>
										<?php }?>										
									</tr>
								<?php endforeach ?>
							<?php endif ?>
						</tbody>
					</table>	
				</div>
			</div>
		</div>
	</div>
	

	<!-- FOOTER -->
	<footer class="fixed-bottom mb-2">
		<div class="container" style="background-color: #DDDDDD; height: 182px;">
			<div class="row">
				<!-- New Beli | To Servis -->
				<div class="col-md-2 mt-4">
					<a href="<?php echo site_url('Servis') ?>">
						<button name="submit" style="padding: 5px 15px; font-size: 15px;">Transaksi Servis</button>
					</a>
				</div>
				<div class="col-md-2 mt-4">
					<a href="<?php echo site_url('Part') ?>">
						<button name="submit" style="padding: 5px 15px; font-size: 15px;">Transaksi Part</button>
					</a>
				</div>
				
				<!-- Informasi jumlah pesanan dan jumlah beli -->
				<!-- <div class="col-md-4 mt-4">
					<table cellpadding="3px">
						<tr>
							<td>Jumlah Pesanan</td>
							<td>:</td>
							<?php
								$pesan = 0;
								if ($this->session->has_userdata('jum_pesan')) {
									$pesan = $this->session->userdata('jum_pesan');
								}
							 ?>
							<td><input disabled="" type="text" name="jmlhpesanan" value="<?php echo $pesan ?>"></td>
						</tr>
						<tr>
							<td>Jumlah Beli</td>
							<td>:</td>
							<?php
								$beli = 0;
								if ($this->session->has_userdata('jum_part')) {
									$beli = $this->session->userdata('jum_part');
								}
							 ?>
							<td><input disabled="" type="text" name="jmlhpesanan" value="<?php echo $beli ?>"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<?php if (empty($done)): ?>
									<a href="<?php echo base_url("Part/cancel") ?>">
										<button style="padding: 5px 15px; font-size: 15px;">Batal</button>
									</a>
								<?php endif ?>
								<?php if (isset($done)): ?>
									<a href="<?php echo base_url("Part/done") ?>">
										<button style="padding: 5px 15px; font-size: 15px;">Selesai</button>
									</a>
									<a href="<?php echo base_url("PrintPdf/Part") ?>" target="_blank">
										<button style="padding: 5px 15px; font-size: 15px;">Print Bill</button>
									</a>
								<?php endif ?>
							</td>
						</tr>
					</table>
				</div> -->

				<!-- Informasi total pembayaran dan sisa bayar -->
				<!-- <div class="col-md-4 mt-2">
					<form action="<?php echo base_url("Part/pay") ?>" method="GET">
					<table cellpadding="3px">
						<tr>
							<td style="font-size: 20px;">Total Bayar</td>
							<td>:</td>
							<?php
								$bayar = 0;
								if ($this->session->has_userdata('total_bayar')) {
									$bayar = $this->session->userdata('total_bayar');
								}
							 ?>
							<td><input disabled="" type="text" name="totalbayar" value="<?php echo $bayar ?>" style="padding: 5px 0px; font-size: 21px; width: 193px;"></td>
						</tr>
						<tr>
							<td>Jumlah bayar</td>
							<td>:</td>
							<td><input type="text" name="jumlahbayar"
								value=
								<?php 
								if ($this->session->has_userdata('jum_bayar')) {
									echo $this->session->userdata('jum_bayar');
								}
								 ?>
								>
							</td>
						</tr>
						<tr>
							<td>Sisa bayar</td>
							<td>:</td>
							<td><input disabled="" type="text" name="sisabayar"
								value=
								<?php 
								if ($this->session->has_userdata('sisa_bayar')) {
									echo $this->session->userdata('sisa_bayar');
								}
								 ?>
								 >
								</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<input type="submit" name="submit" value="Bayar">
							</td>
						</tr>
					</table>
					</form>
				</div> -->
			</div>

		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>