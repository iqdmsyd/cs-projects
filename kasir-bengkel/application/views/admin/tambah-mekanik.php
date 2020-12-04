<div class="container" style="background-color: #DDDDDD; height: 525px;">
	<br><a href="<?php echo site_url('Admin') ?>"><-Kembali</a><br>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-5">
					<center><h4>Form Tambah Data Mekanik</h4></center>
				</div>
			</div><br>
			<form method="post" action="<?php echo site_url('Admin/prosesTambahMekanik') ?>">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<tr>
						<td>Nama</td>
				</div>
				<div class="col-md-4">
						<td>:</td>
						<td>
							<input type="text" name="nama"  required="">
						</td>
					</tr>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<tr>
						<td>Nomor Telepon</td>
				</div>
				<div class="col-md-4">
						<td>:</td>
						<td>
							<input type="text" name="notlp"  required="">
						</td>
					</tr>
				</div>
			</div><br><br>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-2">
					<center>
						<button name="simpan">Simpan</button>
					</center>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>