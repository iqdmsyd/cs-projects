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
	<div class="fixed-nav-bar">
		<div class="container" style="background-color: #DDDDDD; height: 160px">
			<!-- Info transaksi -->
			<div class="row">
				<div class="col-4 mt-3">
					<form action="<?php echo base_url("Part/new"); ?>" method="POST">
						<input type="text" name="nama" class="w-input" placeholder="Nama pelanggan" autofocus>
						<input type="submit" name="submit" value="OK">
					</form>
					<?php if (isset($canceled)): ?>
						<span style="color: red"><?php echo $canceled; ?></span>
					<?php endif ?>
				</div>
				<div class="col-4 mr-auto mt-1">
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
				</div>
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

			<!-- Search bar -->
			<div class="row">
				<div class="col-6">
					<!-- Form cari barang -->
					<form action="<?php echo base_url("Part/search");?>" method="GET">
						<div class="row">
							<div class="col-3">
								Nama barang :
							</div>					
							<div class="col-9">
								<input type="text" name="nama" class="w-input" autofocus placeholder="Input nama barang">
								<input type="submit" name="submit" value="Cari">
							</div>
						</div>
					</form>
				</div>

				<div class="col-6">
					<!-- Form tambah barang -->
					<form action="<?php echo base_url("Part/add"); ?>" method="POST">
						<div class="row">
							<div class="col-12">
								<?php if ($this->session->has_userdata('transaksi')): ?>
									<input type="hidden" name="id_transaksi" value="<?php echo $this->session->userdata('transaksi')->ID ?>">
								<?php endif ?>
								<?php 
								if (isset($barang)) { ?>
									<input type="hidden" name="harga" value="<?php echo $barang->Harga ?>">
									<input type="hidden" name="nama_barang" class="w-input" value="<?php echo $barang->NamaBarang ?>">
									<input type="text" name="" class="w-input" value="<?php echo $barang->NamaBarang ?>" disabled>
									Jumlah :
									<input type="number" name="jumlah" min="0" max=<?php echo $barang->Stok ?>>
								<?php
								}
								else
								{ ?>
									<input type="text" name="" class="w-input" value="" disabled>
									Jumlah :
									<input type="number" name="" min="0" max="">
								<?php } ?>
								<input type="submit" name="submit" value="Tambah">
							</div>
						</div>
					</form>
				</div>
			</div>		
		</div>
	</div>
