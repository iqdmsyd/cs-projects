<div class="container mt-5">
	<div class="row">
		<div class="col-8 p-4" style="background-color: #EEEEEE">
			<h3 class="mt-3"><?php echo $berita->judul ?></h3>
			<ul class="list-inline">
				<li class="list-inline-item"><?php echo $berita->kategori ?></li>
				<li class="list-inline-item mx-2"><?php echo $berita->tanggal ?></li>
				<li class="list-inline-item mx-2"><?php echo $berita->komentar ?> Komentar</li>
			</ul>
			<img src="<?php echo $berita->img ?>" alt="iphone-x" class="img-fluid">
			<br>
			<small style="font-size: 12px"><?php echo $berita->judul ?></small>
			<br>
			<br>
			<p>
				<?php echo $berita->teks; ?>
			</p>
			<p>
				<small>#tags : <?php echo $berita->tags; ?></small>
				<br>
				Author : <?php echo $berita->author ?>
			</p>
		</div>
		
		<!-- SIDEBAR -->
		<div class="col-4 pl-5">
			<form action="<?php echo base_url("Berita/search"); ?>" class="form-inline mt-3" method="GET">
				<input class="form-control ml-auto" type="search" placeholder="Cari judul berita.." name="judul">
      	<button class="btn btn-info" type="submit">Search</button>
			</form>

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
	
	<!-- JANGAN LEWATKAN -->
	<div class="row mt-3">
		<div class="col-8 p-4" style="background-color: #EEEEEE">
			<h5>JANGAN LEWATKAN</h5>
			<div class="row">
				<?php foreach ($list as $value): ?>
					<div class="col-3 mt-3">
						<img src="<?php echo $value->img ?>" alt="" class="img-fluid">
					</div>
				<?php endforeach ?>
			</div>
			<div class="row">
				<?php foreach ($list as $value): ?>
					<div class="col-3 mt-3">
						<a href="<?php echo base_url("Berita/berita/".$value->id) ?>" style="color: #17252A">
							<h5 style="font-size: 18px"><?php echo $value->judul ?></h5>
						</a>				
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	
	<!-- KOMENTAR -->
	<div class="row mt-3">
		<div class="col-8 p-4" style="background-color: #EEEEEE">
			<h5><?php echo $berita->komentar ?> KOMENTAR</h5>
			<div class="row my-3">
				<div class="col-2">
					<img src="<?php echo $this->session->userdata('img'); ?>" alt="" class="img-fluid">
				</div>
				<div class="col-10">
					<form action="<?php echo base_url("Berita/addKomentar"); ?>" method="POST">
						<input type="hidden" name="id_berita" value="<?php echo $berita->id ?>">
						<input type="hidden" name="username" value="<?php echo $this->session->userdata('nama'); ?>">
						<input type="hidden" name="waktu" value="<?php echo date("Y-m-d H:i:s") ?>">
						<textarea name="komentar" id="" col="50" rows="3" placeholder="Berikan komentar positif.." class="form-control"></textarea>
						<input type="submit" value="Kirim" class="btn btn-info mt-2" <?php if (!$this->session->has_userdata('nama')): ?>
							disabled
						<?php endif ?>>
					</form>
				</div>
			</div>
			
			<!-- LIST KOMENTAR -->
			<?php foreach ($komentar as $value): ?>
				<div class="row my-3">
					<div class="col-2">
						<!-- <img src="https://pbs.twimg.com/profile_images/969255048122318850/C8WZql9s_400x400.jpg" alt="" class="img-fluid"> -->
					</div>
					<div class="col-10">
						<p><b><?php echo $value->username ?></b>
							<br>
							<?php echo $value->komentar ?>
							<br>
							<?php echo $value->waktu ?>
						</p>

					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>