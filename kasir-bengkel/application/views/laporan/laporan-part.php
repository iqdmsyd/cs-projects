<div class="container" style="height: 525px; background-color: #DDDDDD;">
	<center><br><h4>Laporan Transaksi Part</h4><br></center>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-7">
			<div class="row">
				<div class="col-md-4">
					<td><a href="<?php echo site_url('Admin/laporanTransaksiPart') ?>"><button>GetAll</button></a></td>
					<td><a href="#"><button>Cetak</button></a>
				</div>
			</div><br>
			<form method="post" action="<?php echo site_url('Admin/laporanTransaksiPart') ?>">
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
							<td>Tanggal</td>
							<td>Nama Pelanggan</td>
							<td>Nomor Seri</td>
							<td>Harga</td>
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
							<td><?php echo $value->NomorSeri ?></td>
							<td><?php echo $value->Harga ?></td>
							<td><?php echo $value->Kuantitas ?></td>
							<td><?php echo $value->TotalHarga ?></td>
							<td><a href="<?php echo site_url('Admin/deleteTransaksiPart/'.$value->ID_TransaksiBeli) ?>"><button>Hapus</button></a></td>
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