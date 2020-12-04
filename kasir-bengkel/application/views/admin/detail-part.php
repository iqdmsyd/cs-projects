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
					<h6>ID : <?php echo $detail[0]->ID; ?></h6></center>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-12">
					<div style="overflow-y: scroll; overflow-x: auto; height: 300px;">
				<table class="table">
					<thead>
						<tr style="background-color: #C4DBEC;">
							<td>No</td>
							<td>Nama Barang</td>
							<td>Nomor Seri</td>
							<td>Harga</td>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($detail as $value) { ?>
						<tr style="background-color: white">
							<th><?php echo $i+1; ?></th>
							<td><?php echo $value->NamaBarang ?></td>
							<td><?php echo $value->NomorSeri ?></td>
							<td><?php echo $value->Harga ?></td>
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