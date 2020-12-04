<div class="container" style="height: 525px; background-color: #DDDDDD;">
	<center><br><h4>Laporan Transaksi Servis</h4><br></center>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-7">
			<div class="row">
				<div class="col-md-4">
					<td><a href="<?php echo site_url('Admin/laporanTransaksiServis') ?>"><button>GetAll</button></a></td>
				<td><a href="#"><button>Cetak</button></a>
				</div>
			</div><br>
			<form method="post" action="<?php echo site_url('Admin/laporanTransaksiServis') ?>">
				<td>Pilih Bulan</td>
				<td>:</td>
				<td> 
					<select name="bulan">
					<option value="01">Januari</option>
					<option value="02">Februari</option>
					<option value="03">Maret</option>
					<option value="04">April</option>
					<option value="05">Mei</option>
					<option value="06">Juni</option>
					<option value="07">Juli</option>
					<option value="08">Agustus</option>
					<option value="09">September</option>
					<option value="10">Oktober</option>
					<option value="12">November</option>
					<option value="12">Desember</option>
					</select>
				</td>
				<td><button>Tampilkan</button></td>
			</form>
		</div>
	</div><br>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div style="overflow-y: scroll; overflow-x: auto; height: 300px;">
				<table class="table">
					<thead>
						<tr style="background-color: #C4DBEC;">
							<td>No</td>
							<td>Tanggal Mulai</td>
							<td>Tanggal Selesai</td>
							<td>Nama Pelanggan</td>
							<td>Nama Mekanik</td>
							<td>Kategori</td>
							<td>Biaya</td>
							<td>Kuantitas</td>
							<td>Total Biaya</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($transaksiservis as $value) {?>
						<tr style="background-color: white">
							<th><?php echo $i+1; ?></th>
							<td><?php echo $value->TanggalMulai ?></td>
							<td><?php echo $value->TanggalSelesai; ?></td>
							<td><?php echo $value->NamaPelanggan ?></td>
							<td><?php echo $value->NamaMekanik ?></td>
							<td><?php echo $value->Kategori; ?></td>
							<td><?php echo $value->Biaya; ?></td>
							<td><?php echo $value->Kuantitas; ?></td>
							<td><?php echo $value->TotalBiaya ?></td>
							<td><a href="<?php echo site_url('Admin/deleteTransaksiServis/'.$value->ID_TransaksiServis) ?>"><button>Hapus</button></a></td>
						</tr>
						<?php $i++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div><br>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-5">
			
		</div>
	</div>
</div>