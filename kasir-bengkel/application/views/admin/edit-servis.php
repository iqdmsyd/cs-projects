<div class="container" style="background-color: #DDDDDD; height: 525px;">
	<br><a href="<?php echo site_url('Admin') ?>"><-Kembali</a><br>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-5">
					<center><h4>Form Edit Data Jasa Servis</h4>
					<font color="red" style="size: 20px;">
				    	<?php echo $this->session->flashdata('hasil'); ?>
				    </font></center>
				</div>
			</div><br>
			<?php if($servis != NULL){ ?>
			<?php echo form_open('Admin/prosesEditServis/'.$servis[0]->ID); ?>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<tr>
						<td>ID</td>
				</div>
				<div class="col-md-4">
						<td>:</td>
						<td>
							<input type="text" name="id" disabled="" value="<?php echo $servis[0]->ID ?>">
						</td>
					</tr>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<tr>
						<td>Kategori</td>
				</div>
				<div class="col-md-4">
						<td>:</td>
						<td>
							<input type="text" name="kategori" value="<?php echo $servis[0]->Kategori ?>">
						</td>
					</tr>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<tr>
						<td>Biaya</td>
				</div>
				<div class="col-md-4">
						<td>:</td>
						<td>
							<input type="text" name="biaya" value="<?php echo $servis[0]->Biaya ?>">
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