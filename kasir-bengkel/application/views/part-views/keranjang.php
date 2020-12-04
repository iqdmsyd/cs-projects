<div class="container" style="background-color: #DDDDDD">
	<div class="row">
		<div class="col-12">
			<div style="overflow-y: scroll; max-height: 356px;">
			<?php if (isset($done)): ?>
				<span style="color: red">Transaksi berhasil, klik tombol Selesai untuk mengakhiri transaksi lalu klik tombol Baru untuk membuat transaksi baru.</span>
			<?php endif ?>
				<table class="table">
					<thead>
						<tr style="background-color: #C4DBEC">
							<td>No</td>
							<td>Nama Item</td>
							<td>Jumlah</td>
							<td>Harga</td>
							<td>Total</td>
						</tr>
					</thead>
 					<tbody>
						<?php $no=1; ?>
						<?php if ($this->session->has_userdata('keranjang')): ?>
							<?php foreach ($this->session->userdata('keranjang') as $value): ?>
								<tr style="background-color: white">
									<td><?php echo $no++ ?></td>
									<td><?php echo $value->NamaBarang ?></td>
									<td><?php echo $value->Harga ?></td>
									<td><?php echo $value->Jumlah ?></td>
									<td><?php echo $value->Total ?></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</div>