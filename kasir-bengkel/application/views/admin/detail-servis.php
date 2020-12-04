<div class="container" style="background-color: #DDDDDD;">
	<br><a href="<?php echo site_url('Admin') ?>"><-Kembali</a><br>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-5">
					<center><h4>Detail Data Transaksi Part</h4>
					<?php if($detail != NULL){ ?>
					<h6>ID : <?php echo $detail[0]->ID_TransaksiServis; ?></h6></center>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-12">
					<div style="overflow-y: scroll; overflow-x: auto; height: 300px;">
				<table class="table">
					<thead>
						<tr style="background-color: #C4DBEC;">
							<td>No</td>
							<td>Tanggal Selesai</td>
							<td>Nama Jasa</td>
							<td>Nama Mekanik</td>
							<td>Harga</td>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($detail as $value) { ?>
						<tr style="background-color: white">
							<th><?php echo $i+1; ?></th>
							<td><?php echo $value->TanggalSelesai ?></td>
							<td><?php echo $value->NamaJasa ?></td>
							<td><?php echo $value->Mekanik ?></td>
							<td><?php echo $value->Biaya; ?></td>
						</tr>
						<?php $i++; } }?>
					</tbody>
				</table>
			</div><br><br>
				</div>
			</div>

		
		</div>
	</div>
</div>