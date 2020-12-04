<div class="container pt-4" style="background-color: #DDDDDD">
	<div class="row">
		<div class="col-12">
			<div style="overflow-y: scroll; max-height: 356px;">
				<?php if (isset($payed)): ?>
				<span style="color: red">Transaksi berhasil, silahkan klik tombol Selesai untuk mengakhiri transaksi lalu klik tombol Baru untuk membuat transaksi baru.</span>
				<?php endif ?>
				<table class="table">
					<thead>
						<tr style="background-color: #C4DBEC">
							<td>No</td>
							<td>Nama Jasa</td>
							<td>Mekanik</td>
							<td>Biaya</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
 						<?php $no=1; ?>
						<?php if ($this->session->has_userdata('keranjang_servis')): ?>
							<?php foreach ($this->session->userdata('keranjang_servis') as $value): ?>
								<tr style="background-color: white">
									<td><?php echo $no++ ?></td>
									<td><?php echo $value->NamaJasa ?></td>
									<td><?php echo $value->Mekanik ?></td>
									<td><?php echo $value->Biaya ?></td>
									<td>
										<a href="<?php echo base_url("Servis/delete/".$value->ID) ?>">
											<button>Hapus</button>
										</a>
									</td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</div>