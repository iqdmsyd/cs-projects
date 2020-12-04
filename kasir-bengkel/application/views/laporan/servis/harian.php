<div class="container" style="height: 525px; background-color: #DDDDDD;">
	<center><br><h4>Laporan Transaksi Servis Perhari</h4><br></center>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-7">
			<div class="row">
				<div class="col-md-5">
					<td><a href="<?php echo site_url('Admin/laporanTransaksiServisDay') ?>"><button style="background-color: navy; color: white;">Harian</button></a></td>
					<td><a href="<?php echo site_url('Admin/laporanTransaksiServis') ?>"><button>Bulan</button></a></td>
					<td><a href="<?php echo site_url('Admin/laporanTransaksiServisYear') ?>"><button>Tahun</button></a></td>
				<td><a href="#"><button>Cetak</button></a>
				</div>
			</div><br>
			<form method="post" action="<?php echo site_url('Admin/laporanTransaksiServisDay') ?>">
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
						<?php $i++; }?>
					</tbody>
				</table>
			</div>
		</div>
	</div><br>
</div>