<!DOCTYPE html>
<html>
<head>
	<!-- Bootswatch link -->
	<link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
	<!-- Fontawesome link -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<title>Registrasi PastiBeres.com</title>
</head>
<body>
	<div class="container my-4">
		<div class="row justify-content-center">
			<div class="col-5 mt-1">
			<h2 class="text-center">Silahkan Registrasi Anggota</h2>
				<h5 class="text-center">PastiBeres.com</h5><br>
				<?php echo form_open('Servis/registrasi'); ?>
				<label for="">Nama Pemilik Motor : </label>
		  		<input type="text" name="nama" class="form-control" autofocus>
		  		<br>
		  		<label for="">Nomor STNK : </label>
		  		<input type="text" name="stnk" class="form-control">
		  		<br>
		  		<label for="">Merk Motor : </label>
		  		<input type="text" name="merkmotor" class="form-control">
		  		<br>
		  		<label for="">Alamat : </label>
		  		<textarea rows="4" cols="50" class="form-control" name="alamat"></textarea>
		  		<br>
		  		<input type="submit" name="submit" class="form-control btn btn-info" value="Simpan">
			</div>
		</div> 
	</div>


</body>
</html>