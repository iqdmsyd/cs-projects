<?php  ?>
	<!-- start banner Area -->
	<section class="banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row fullscreen d-flex align-items-center justify-content-center">
				<div class="banner-content col-lg-12">
					<h1 class="text-white">
						Pusat Pengembangan <span>Keterampilan Daerah</span>
					</h1>
					<h3 class="text-white">
						Kabupaten Bandung Barat, Jawa Barat
					</h3>
					<form action="<?php echo base_url() ?>search" class="serach-form-area" method="GET">
						<div class="row justify-content-center form-wrap">
							<div class="col-lg-6 form-cols">
								<input type="text" class="form-control" name="Kategori" placeholder="Bidang pekerjaan apa yang Anda inginkan?">
							</div>
							<div class="col-lg-2 form-cols">
							    <button type="submit" class="btn btn-info">
							      <span class="lnr lnr-magnifier"></span> Search
										</a>
							    </button>
							</div>
						</div>
					</form>
					<p class="text-white"> <span>Masukan kata kunci:</span> Marketing-Admin-Hotel-Resto-Industri-SPBU-Farmasi</p>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start features Area -->
	<section class="features-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="single-feature">
						<h4>Searching</h4>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing.
						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-feature">
						<h4>Applying</h4>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing.
						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-feature">
						<h4>Notifications</h4>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing.
						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-feature">
						<h4>Start Working</h4>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End features Area -->

	<div id="mading">

	</div>

	<!-- Start feature-cat Area -->
	<section class="feature-cat-area pt-100" id="category">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-60 col-lg-10">
					<div class="title text-center">
						<h1 class="mb-10">Mading Lowongan Pekerjaan Kab. Bandung Barat</h1>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End feature-cat Area -->

	<!-- Start post Area -->
	<section class="post-area">
		<div class="container">
			<div class="row justify-content-center d-flex">
				<div class="col-lg-8 post-list">
					<?php if (isset($InfoLowongan)): ?>
						<?php foreach ($InfoLowongan as $Lowongan): ?>
						<div class="single-post row">
							<div class="col-12 mb-3 mb-md-0 col-md-3">
								<img src="<?php echo base_url(); ?>assets/img/post.png" alt="">
							</div>
							<div class="col-12 col-md-9">
								<div class="d-flex mb-1">
									<div class="title" id="<?php echo $Lowongan->ID ?>">
										<a href="#"><h4><?php echo $Lowongan->Judul ?></h4></a>
										<h6><?php echo $Lowongan->Kategori ?></h6>
									</div>
									<ul class="btns ml-auto">
										<!-- <li><a href="#"><span class="lnr lnr-heart"></span></a></li> -->
										<?php if ($this->session->has_userdata('User')): ?>
											<li><a href="<?php echo base_url() ?>apply/<?php echo $Lowongan->ID ?>/<?php echo $this->session->userdata('User')->ID ?>" onclick="popUpApply(<?php echo $Lowongan->ID ?>)">Apply</a></li>
										<?php else: ?>
											<li><a href="<?php echo base_url() ?>login">Apply</a></li>
										<?php endif; ?>
									</ul>
								</div>
								<p>
									<?php echo $Lowongan->Deskripsi ?>
								</p>
								<h5>Kuota : <?php echo $Lowongan->Pendaftar ?>/<?php echo $Lowongan->Kuota ?></h5>
								<p class="address"><span class="lnr lnr-map"></span> <?php echo $Lowongan->Kecamatan ?></p>
								<p class="address"><span class="lnr lnr-database"></span> Rp. <?php echo number_format($Lowongan->Gaji) ?></p>
							</div>
						</div>
						<?php endforeach; ?>
					<?php else: ?>
						<?php echo "Maaf, kategori yang Anda cari tidak ada"; ?>
					<?php endif;?>


					<?php if (isset($InfoLowongan)): ?>
						<div class="pb-5">
							<a class="text-uppercase loadmore-btn mx-auto mb-5 d-block" href="category.html">Load More job Posts</a>
						</div>
					<?php endif; ?>


				</div>

				<div class="col-lg-4 sidebar">
					<div class="single-slidebar">
						<h4>Pekerjaan berdasarkan lokasi</h4>
						<ul class="cat-list">
							<?php foreach ($LowonganByLokasi as $Lowongan): ?>
								<li><a class="justify-content-between d-flex" href="category.html"><p><?php echo $Lowongan->Kecamatan ?></p><span><?php echo $Lowongan->Total ?></span></a></li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div class="single-slidebar">
						<h4>Pekerjaan ranking tinggi</h4>
						<div class="active-relatedjob-carusel">
							<?php foreach ($LowonganByRank as $Lowongan): ?>
								<div class="single-rated">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/r1.jpg" alt="">
									<a href="single.html"><h4><?php echo $Lowongan->Judul ?></h4></a>
									<h6><?php echo $Lowongan->Kategori ?></h6>
									<p>
										<?php echo $Lowongan->Deskripsi ?>
									</p>
									<h5>Kuota : <?php echo $Lowongan->Pendaftar ?>/<?php echo $Lowongan->Kuota ?></h5>
									<p class="address"><span class="lnr lnr-map"></span> <?php echo $Lowongan->Kecamatan ?></p>
									<p class="address"><span class="lnr lnr-database"></span> Rp.<?php echo number_format($Lowongan->Gaji); ?></p>
									<a href="#" class="btns text-uppercase">Apply job</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<div class="single-slidebar">
						<h4>Pekerjaan berdasarkan kategori</h4>
						<ul class="cat-list">
							<?php foreach ($LowonganByKategori as $Lowongan): ?>
								<li><a class="justify-content-between d-flex" href="category.html"><p><?php echo $Lowongan->Kategori ?></p><span><?php echo $Lowongan->Total ?></span></a></li>
							<?php endforeach; ?>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End post Area -->
