<div class="container">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <a href="<?php echo base_url("Berita/berita/8"); ?>">
	      	<img class="d-block w-100" src="<?php echo base_url("img/header4.png"); ?>" alt="First slide">
	      </a>
	        <div class="carousel-caption d-none d-md-block">
				    <h4>Galaxy Note 9 Bakal Hadir dengan RAM 8GB dan Memori 512GB</h4>
				    <p>Samsung memang belum mengumumkan kapan flagship smartphone selanjutnya, Galaxy Note 9, akan dirilis.</p>
				  </div>
	    </div>
	    <div class="carousel-item">
	    	<a href="<?php echo base_url("Berita/berita/5"); ?>">
	      	<img class="d-block w-100" src="<?php echo base_url("img/header2.png"); ?>" alt="Second slide">
	      </a>
	      <div class="carousel-caption d-none d-md-block">
				    <h4>LG Pamer Smartphone Murah Meriah untuk Penggemar BTS</h4>
				    <p>LG kembali agresif dalam memasarkan smartphone-nya di Indonesia tahun ini.</p>
				  </div>
	    </div>
	    <div class="carousel-item">
	    	<a href="<?php echo base_url("Berita/berita/7"); ?>">
	      	<img class="d-block w-100" src="<?php echo base_url("img/header3.png"); ?>" alt="Third slide">
	      </a>
	      <div class="carousel-caption d-none d-md-block">
				    <h4>Mi 8, Smartphone Pertama Xiaomi yang Pakai Notch Resmi Dirilis</h4>
				    <p>Setelah dinanti-nanti, Xiaomi akhirnya mengumumkan flagship smartphone-nya, Mi 8. Mi 8 menjadi smartphone pertama Xiaomi yang pada layarnya terdapat notch.</p>
				  </div>
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
</div>

<div class="container mt-5">
	<div class="row">
		<div class="col-8">
			<!-- highlight -->
			<?php if (isset($error)): ?>
				<h3><?php echo $error; ?></h3>
			<?php endif ?>
			<?php if (isset($berita)): ?>
				<!-- list berita -->
				<?php foreach ($berita as $value): ?>
					
					<h3 class="mt-3"><?php echo $value->judul; ?></h3>
					<ul class="list-inline"  style="color: #2B7A7B">
						<li class="list-inline-item"><?php echo $value->kategori ?></li>
						<li class="list-inline-item mx-4"><?php echo $value->tanggal; ?></li>
						<li class="list-inline-item mx-4"><?php echo $value->komentar; ?> Komentar</li>
					</ul>
					<div class="row">
						<div class="col-4">
							<img src="<?php echo $value->img ?>" alt="" class="img-fluid">
						</div>
						<div class="col-8">
							<p>
								<?php echo substr($value->teks, 0, 350)."..."; ?>
							</p>
						</div>
					</div>
					<form action="<?php echo(base_url("Berita")); ?>" method="GET">
						<input type="hidden" name="id" value=" <?php echo($value->id); ?> ">
						<button type="submit" class="btn btn-info mb-2 col-4">Lanjutkan membaca..</button>
					</form>
					<hr>
				<?php endforeach ?>
			<?php endif ?>


		</div>

		<div class="col-4 pl-5">
			<form action="<?php echo(base_url("Berita/search")); ?>" class="form-inline mt-3" method="GET">
				<input class="form-control ml-auto" type="search" placeholder="Cari judul berita.." name="judul">
      	<button class="btn btn-info" type="submit">Search</button>
			</form>

			<!-- Terpopuler -->
			<!-- Terpopuler -->
			<center>
				<hr>
				<h5 class="txt-sec">TERPOPULER</h5>
				<hr>
			</center>
			<ul class="list-group">
				<?php foreach ($populer as $value): ?>
					<a href="<?php echo base_url("Berita/berita/".$value->id) ?>">
						<li class="list-group-item item">> <?php echo $value->judul ?></li>
					</a>
				<?php endforeach ?>
			</ul>

			<!-- Terbaru -->
			<center>
				<hr>
				<h5 class="txt-sec">TERBARU</h5>
				<hr>
			</center>
			<ul class="list-group">
				<?php foreach ($terbaru as $value): ?>
					<a href="<?php echo base_url("Berita/berita/".$value->id) ?>">
						<li class="list-group-item item">> <?php echo $value->judul ?></li>
					</a>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
</div>	