<div class="container pt-4" style="background-color: #DDDDDD">
	<div class="row">
		<div class="col-12">
			<div style="overflow-y: scroll; max-height: 227px;">
				<table class="table">
					<thead>
						<tr style="background-color: #C4DBEC">
							<td>No</td>
							<td>Nama Pelanggan</td>
							<td>No STNK</td>
							<td>Tanggal Mulai</td>
							<td>Kuantitas</td>
							<td>Total Biaya</td>
							<td>Status</td>
							<td></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
 						<?php $no=1; ?>
						<?php if (isset($list)): ?>
							<?php foreach ($list as $value): ?>
								<tr style="background-color: white">
									<td><?php echo $no++ ?></td>
									<td><?php echo $value->Nama ?></td>
									<td><?php echo $value->STNK ?></td>
									<td><?php echo $value->TanggalMulai ?></td>
									<td><?php echo $value->Kuantitas ?></td>
									<td><?php echo $value->TotalBiaya ?></td>
									<?php 
									if ($value->Status == 0) {
										$status = "Belum Selesai";
									}
									else
										$status = "Selesai";
									 ?>
									 <td><?php echo $status ?></td>
									<td>
										<a href="<?php echo base_url("Servis/edit/".$value->ID."/".$value->ID_Pelanggan) ?>">
											<button>Edit</button>
										</a>
									</td>
									<?php if ($value->Status == 1) { ?>
									<td>
										<a href="<?php echo base_url("PrintPdf/Servis/".$value->ID) ?>" target="_blank">
											<button>Cetak</button>
										</a>
									</td>
									<?php } else { ?>
									<td></td>
									<?php } ?>

<!-- 									<td>
										<a href="<?php echo base_url("Servis/end/".$value->ID) ?>">
											<button>Selesai</button>
										</a>
									</td> -->
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</div>