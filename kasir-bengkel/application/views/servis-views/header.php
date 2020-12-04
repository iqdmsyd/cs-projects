<?php
	$cek = false;
	if ($this->session->has_userdata('pelanggan')) {
		$cek = true;
	}
	
?>
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
			width: 280px;
		}
		footer {
			position: fixed;
		}
  </style>
</head>
<body style="background-color: #EEEEEE">
	<div class="fixed-nav-bar">
		<div class="container" style="background-color: #DDDDDD;height: 205px">
			<!-- Info pelanggan -->
			<div class="row">
				<div class="col-5 mt-1">
					<table cellpadding="3px">
						<tr>
							<form action="<?php echo base_url("Servis/searchUser") ?>" method="GET">
							<td><input type="text" name="stnk" placeholder="Cari No Polisi" autofocus></td>	
							<td></td>
							<td>
								<input type="submit" name="submit" value="Cari">
							</form>
								<a href="<?php echo base_url("Servis/registrasi") ?>">
									<button style="padding: 5px 15px; font-size: 15px;">Daftar</button>
								</a>
								<?php if ($this->session->has_userdata('pelanggan')): ?>
									<a href="<?php echo base_url("Servis/new") ?>">
										<button style="padding: 5px 15px; font-size: 15px;">Servis baru</button>
									</a>
								<?php endif ?>
							</td>
						</tr>
						<tr>
							<td>No Transaksi</td>
							<td>:</td>
							<td>
								<?php if ($this->session->has_userdata('servis')) {
									echo $this->session->userdata('servis')->ID;
								} ?>
							</td>
						</tr>
						<tr>
							<td>Nama Pelanggan</td>
							<td>:</td>
							<td><input type="text" name="namapelanggan" disabled
								
								<?php if ($cek) { ?>
									value='<?php echo($this->session->userdata('pelanggan')->Nama) ?>'
								<?php } ?>
								>
							</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><textarea cols="30" rows="2" disabled><?php if ($cek) {
									echo $this->session->userdata('pelanggan')->Alamat;
								} ?></textarea>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-4 mt-1">
					<table cellpadding="3px">
						<tr>
							<td>Nomor STNK</td>
							<td>:</td>
							<td><input type="text" name="nostnk" disabled
								
								<?php if ($cek) { ?>
									value='<?php echo $this->session->userdata('pelanggan')->STNK; ?>'
								<?php } ?>
								>
							</td>
						</tr>
						<tr>
							<td>Merk Motor</td>
							<td>:</td>
							<td><input type="text" name="merk" disabled
								<?php if ($cek) { ?>
									value='<?php echo $this->session->userdata('pelanggan')->MerkMotor; ?>'
								<?php } ?>
								>
							</td>
						</tr>	
						<tr>
							<td>No. Telepon</td>
							<td>:</td>
							<td><input type="text" name="merk" disabled
								<?php if ($cek) { ?>
									value='<?php echo $this->session->userdata('pelanggan')->NoTelepon; ?>'
								<?php } ?>
								>
							</td>
						</tr>						
					</table>
				</div>
				<div class="col-2 ml-auto mt-1">
					<table cellpadding="3px">
						<tr>
							<td>User</td>
							<td>:</td>
							<td><?php echo $this->session->userdata('username'); ?></td>
						</tr>
						<tr>
							<td>Toko</td>
							<td>:</td>
							<td>Pastiberess</td>
						</tr>
						<tr>
							<td>Tanggal</td>
							<td>:</td>
							<td><?php echo date("Y-m-d"); ?></td>
						</tr>
					</table>			
				</div>
				<div class="col-1">
					<table cellpadding="3px">
						<tr>
							<td>
								<a href="<?php echo site_url('Login/logout') ?>">Logout</a>
							</td>
						</tr>
					</table>			
				</div>		
			</div>

			<!-- Search bar -->
			<div class="row mt-2">
				<div class="col-6">
					<!-- Form cari nama servis -->
					<form action="<?php echo base_url("Servis/search") ?>" method="GET">
						<div class="row">
							<div class="col-3">
								Nama Jasa :
							</div>					
							<div class="col-9">
								<input type="text" name="kategori" class="w-input" autofocus>
								<input type="submit" name="submit" value="Cari">
							</div>
						</div>
					</form>
				</div>

				<div class="col-6">
					<!-- Form tambah jasa servis -->
					<form action="<?php echo base_url("Servis/add") ?>" method="POST">
						<div class="row">
							<div class="col-12">
								<?php if ($this->session->has_userdata('servis')): ?>
									<input type="hidden" name="id_transaksiservis" value="<?php echo $this->session->userdata('servis')->ID ?>">
								<?php endif ?>
								<?php 
								if (isset($servis)) { ?>
									<input type="hidden" name="id_servis" value="<?php echo $servis->ID ?>">
									<input type="hidden" name="biaya" value="<?php echo $servis->Biaya ?>">
									<input type="hidden" name="kategori" class="w-input" value="<?php echo $servis->Kategori ?>">
									<input type="text" name="" class="w-input" value="<?php echo $servis->Kategori ?>" disabled>
								<?php }
								else
								{ ?>
									<input type="text" name="" class="w-input" value="" disabled>
								<?php } ?>
								Mekanik :
								<select name="mekanik">
									<?php foreach ($this->session->userdata('mekanik') as $value): ?>
										<option value="<?php echo $value->Nama ?>"><?php echo $value->Nama ?></option>
									<?php endforeach ?>
								</select>
								<input type="submit" name="submit" value="Tambah">
							</div>
						</div>
					</form>
				</div>
			</div>		
		</div>
	</div>