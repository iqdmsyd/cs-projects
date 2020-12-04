<div class="container" style="height: 400px;">
	<div class="row">
		<div class="col-md-2"  style="background-color: #BAC3EA;"><br>
			<form method="post" action="#">
				<input type="submit" name="submit1" value="Data Pelanggan" style="width: 160px;"><br><br>
				<input type="submit" name="submit2" value="Data Spare Part" style="width: 160px;"><br><br>
				<input type="submit" name="submit3" value="Data Mekanik" style="width: 160px;"><br><br>
				<input type="submit" name="submit6" value="Data Servis" style="width: 160px;"><br><br>
				<input type="submit" name="submit4" value="Data Transaksi Part" style="width: 160px;"><br><br>
				<input type="submit" name="submit5" value="Data Transaksi Servis" style="width: 160px;"><br><br>
			</form>
			<a href="<?php echo site_url('Admin/laporanTransaksiPart') ?>"><button style="width: 160px;">Laporan</button></a><br><br>
			<a href="<?php echo site_url('Login/logout') ?>"><button style="width: 160px;">Logout</button></a>
		</div>
		<div class="col-md-10" style="background-color: #DDDDDD; height: 525px;">
		<center><font color="red" style="size: 20px;"><?php echo $this->session->flashdata('hasil'); ?></font></center>
		<?php if(isset($_POST['submit1'])){ ?>
			<br><h4>Tabel Pelanggan</h4>			
			<div style="overflow-y: scroll; height: 300px;">
				<table class="table">
					<thead>
						<tr style="background-color: #C4DBEC;">
							<td>No</td>
							<td>Nama</td>
							<td>STNK</td>
							<td>Alamat</td>
							<td>Merk Motor</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0; 
						foreach($pel as $data){ ?>
						<tr style="background-color: white">
							<th><?php echo $i+1; ?></th>
							<td><?php echo $data->Nama; ?></td>
							<td><?php echo $data->STNK; ?></td>
							<td><?php echo $data->Alamat; ?></td>
							<td><?php echo $data->MerkMotor; ?></td>
							<td><a href="<?php echo site_url('Admin/editPelanggan/'.$data->ID) ?>"><button>Edit</button></a></td>
						</tr>
						<?php $i++; } ?>
					</tbody>
				</table>
			</div><br>
			<div class="row">
				&emsp;<a href="<?php echo site_url('Admin/tambahPelanggan') ?>"><button>+Tambah Data</button></a></div>
			</div>
		<?php }else if(isset($_POST['submit2'])){ ?>
			<br><h4>Tabel Spare Part</h4>
			<div style="overflow-y: scroll; height: 300px;">
				<table class="table">
					<thead>
						<tr style="background-color: #C4DBEC;">
							<td>No</td>
							<td>Nama Barang</td>
							<td>Stok</td>
							<td>Harga</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0; 
						foreach ($part as $value) {?>
						<tr style="background-color: white">
							<th><?php echo $i+1; ?></th>
							<td><?php echo $value->NamaBarang ?></td>
							<td><?php echo $value->Stok ?></td>
							<td><?php echo $value->Harga ?></td>
							<td><a href="<?php echo site_url('Admin/editPart/'.$value->ID) ?>"><button>Edit</button></a></td>
						</tr>
						<?php $i++; }?>
					</tbody>
				</table>
			</div><br>
			<div class="row">
				&emsp;<a href="<?php echo site_url('Admin/tambahPart') ?>"><button>+Tambah Data</button></a></div>
			</div>
		<?php }else if(isset($_POST['submit3'])){ ?>
			<br><h4>Tabel Mekanik</h4>
			<div style="overflow-y: scroll; height: 300px;">
				<table class="table">
					<thead>
						<tr style="background-color: #C4DBEC;">
							<td>No</td>
							<td>Nama Mekanik</td>
							<td>Nomor Telepon</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($mekanik as $value) { ?>
						<tr style="background-color: white">
							<th><?php echo $i+1; ?></th>
							<td><?php echo $value->Nama; ?></td>
							<td><?php echo $value->Kontak; ?></td>
							<td><a href="<?php echo site_url('Admin/editMekanik/'.$value->ID) ?>"><button>Edit</button></a></td>
						</tr>
						<?php $i++; } ?>
					</tbody>
				</table>
			</div><br>
			<div class="row">
				&emsp;<a href="<?php echo site_url('Admin/tambahMekanik') ?>"><button>+Tambah Data</button></a></div>
			</div>
		<?php }else if(isset($_POST['submit6'])){ ?>
			<br><h4>Tabel Jasa Servis</h4>
			<div style="overflow-y: scroll; height: 300px;">
				<table class="table">
					<thead>
						<tr style="background-color: #C4DBEC;">
							<td>No</td>
							<td>Kategori</td>
							<td>Biaya</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($servis as $value) { ?>
						<tr style="background-color: white">
							<th><?php echo $i+1; ?></th>
							<td><?php echo $value->Kategori ?></td>
							<td><?php echo $value->Biaya; ?></td>
							<td><a href="<?php echo site_url('Admin/editServis/'.$value->ID) ?>"><button>Edit</button></a></td>
						</tr>
						<?php $i++; } ?>
					</tbody>
				</table>
			</div><br>
			<div class="row">
				&emsp;<a href="<?php echo site_url('Admin/tambahServis') ?>"><button>+Tambah Data</button></a></div>
			</div>
		<?php }else if(isset($_POST['submit4'])){ ?>
			<br><h4>Tabel Transaksi Part</h4>
			<div style="overflow-y: scroll; overflow-x: auto; height: 300px;">
				<table class="table">
					<thead>
						<tr style="background-color: #C4DBEC;">
							<td>No</td>
							<td>Tanggal</td>
							<td>Nama Pelanggan</td>
							<td>Kuantitas</td>
							<td>Total Harga</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($transaksipart as $value) {?>
						<tr style="background-color: white">
							<th><?php echo $i+1; ?></th>
							<td><?php echo $value->Tanggal ?></td>
							<td><?php echo $value->NamaPelanggan ?></td>
							<td><?php echo $value->Kuantitas ?></td>
							<td><?php echo $value->TotalHarga ?></td>
							<td><a href="<?php echo site_url('Admin/detailPart/'.$value->ID_TransaksiBeli) ?>"><button data-toggle="modal" data-target="#myModal">Detail</button></a></td>
						</tr>
						<?php $i++; } ?>
					</tbody>
				</table>
			</div>
			
		<?php }else if(isset($_POST['submit5'])){ ?>
			<br><h4>Tabel Transaksi Servis</h4>
			<div style="overflow-y: scroll; overflow-x: auto; height: 300px;">
				<table class="table">
					<thead>
						<tr style="background-color: #C4DBEC;">
							<td>No</td>
							<td>Tanggal Mulai</td>
							<td>Tanggal Selesai</td>
							<td>Nama Pelanggan</td>
							<td>Biaya</td>
							<td>Kuantitas</td>
							<td>Total Biaya</td>
							<td>Status</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($transaksiservis as $value) { ?>
						<tr style="background-color: white">
							<th><?php echo $i+1; ?></th>
							<td><?php echo $value->TanggalMulai ?></td>
							<td><?php echo $value->TanggalSelesai; ?></td>
							<td><?php echo $value->NamaPelanggan ?></td>
							<td><?php echo $value->Biaya; ?></td>
							<td><?php echo $value->Kuantitas; ?></td>
							<td><?php echo $value->TotalBiaya ?></td>
							<td><?php echo $value->Status ?></td>
							<td><a href="<?php echo site_url('Admin/detailServis/'.$value->ID_TransaksiServis) ?>"><button data-toggle="modal" data-target="#myModal">Detail</button></a></td>
						</tr>
						<?php $i++; } }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>