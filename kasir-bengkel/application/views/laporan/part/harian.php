<div class="container" style="height: 525px; background-color: #DDDDDD;">
	<center><br><h4>Laporan Transaksi Part Perhari</h4><br></center>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-7">
			<div class="row">
				<div class="col-md-5">
					<td><a href="<?php echo site_url('Admin/laporanTransaksiPartDay') ?>"><button style="background-color: navy; color: white;">Harian</button></a></td>
					<td><a href="<?php echo site_url('Admin/laporanTransaksiPart') ?>"><button>Bulan</button></a></td>
					<td><a href="<?php echo site_url('Admin/laporanTransaksiPartYear') ?>"><button>Tahun</button></a></td>
					<td><a href="#"><button>Cetak</button></a>
				</div>
			</div><br>
			<form method="post" action="<?php echo site_url('Admin/laporanTransaksiPartDay') ?>">
				<td>Pilih Tanggal</td>
				<td>:</td>
				<td> 
					<input type="date" name="day">
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
		</div>
	</div><br>
</div>