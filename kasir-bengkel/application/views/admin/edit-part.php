<div class="container" style="background-color: #DDDDDD; height: 525px;">
	<br><a href="<?php echo site_url('Admin') ?>"><-Kembali</a><br>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-5">
					<center><h4>Form Edit Data Spare Part</h4>
					<font color="red" style="size: 20px;">
				    	<?php echo $this->session->flashdata('hasil'); ?>
				    </font></center>
				</div>
			</div><br>
		<?php if($part != NULL){ ?>
		<?php echo form_open('Admin/prosesEditPart/'.$part[0]->ID); ?>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<tr>
						<td>ID</td>
				</div>
				<div class="col-md-4">
						<td>:</td>
						<td>
							<input type="text" name="id" disabled="" value="<?php echo $part[0]->ID ?>">
						</td>
					</tr>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<tr>
						<td>Nama Barang</td>
				</div>
				<div class="col-md-4">
						<td>:</td>
						<td>
							<input type="text" name="nama" value="<?php echo $part[0]->NamaBarang ?>">
						</td>
					</tr>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<tr>
						<td>Stok</td>
				</div>
				<div class="col-md-4">
						<td>:</td>
						<td>
							<input type="number" name="stok" min="0" style="width: 192px;" value="<?php echo $part[0]->Stok ?>">
						</td>
					</tr>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<tr>
						<td>Harga</td>
				</div>
				<div class="col-md-4">
						<td>:</td>
						<td>
							<input type="text" name="harga" value="<?php echo $part[0]->Harga ?>">
						</td>
					</tr>
				</div>
			</div><br><br>
		<?php } ?>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-2">
					<center>
						<?php echo form_submit('submit', 'Edit'); ?>
					</center>
				</div>
				<?php form_close(); ?>
			</div>
		</div>
	</div>
</div>