<?php  ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="icon" href="<?php echo(base_url()); ?>assets/img/favicon.ico" type="image/x-icon">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Job Listing</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="<?php echo(base_url()); ?>assets/css/linearicons.css">
		<link rel="stylesheet" href="<?php echo(base_url()); ?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo(base_url()); ?>assets/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo(base_url()); ?>assets/css/magnific-popup.css">
		<link rel="stylesheet" href="<?php echo(base_url()); ?>assets/css/nice-select.css">
		<link rel="stylesheet" href="<?php echo(base_url()); ?>assets/css/animate.min.css">
		<link rel="stylesheet" href="<?php echo(base_url()); ?>assets/css/owl.carousel.css">
		<link rel="stylesheet" href="<?php echo(base_url()); ?>assets/css/main.css">
	</head>
	<body
	<?php if (isset($search)): ?>
		<?php echo "onload='myFunction()'" ?>
	<?php endif; ?>
	>

		<header id="header" id="home">
			<div class="container">
				<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="<?php echo base_url() ?>"><img src="<?php echo base_url(); ?>assets/img/logo2.png" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li class="menu-active"><a href="<?php echo base_url(); ?>">Home</a></li>
								<li class="menu-has-children"><?php echo anchor('profile', 'Profile'); ?>
									<ul>
										<li><?php echo anchor('profile', 'Visi Misi'); ?></li>
										<li><?php echo anchor('profile', 'Struktur Organisasi'); ?></li>
										<li><?php echo anchor('profile', 'Gambaran Umum'); ?></li>
										<li><?php echo anchor('profile', 'Program Kerja'); ?></li>
										<li><?php echo anchor('contact', 'Contact Us'); ?></li>
					        </ul>
								</li>
			          <li><?php echo anchor('supply', 'Supply'); ?></li>
								<li class="menu-has-children"><?php echo anchor('demand', 'Demand'); ?>
									<ul>
										<li><a href="#">Pertanian</a></li>
										<li><a href="Pengolahan.php">Pengolahan</a></li>
										<li><a href="Hotel.php">Perdagangan, Eceran, Hotel & Restoran</a></li>
										<li><a href="Industri.php">Manufaktur/Industri</a></li>
										<li class="#"><a href="">Lain-lain</a>
											<ul>
												<li><a href="Kesehatan.php">Kesehatan</a></li>
												<li><a href="SDA.php">Sumber Daya Alam</a></li>
												<li><a href="Distributor.php">Distributor</a></li>
												<li><a href="BBM.php">Bahan Bakar</a></li>
												<li><a href="Otomotif.php">Otomotif</a></li>
												<li><a href="Gudang.php">Gudang</a></li>
											</ul>
										</li>
			            </ul>
								</li>
								<li class="menu-has-children"><a href="#">Others</a>
									<ul>
										<li><a href="#">Workplace</a></li>
										<li><a href="#">Data Penempatan</a>
											<ul>
												<li><a href="#">Hubungan Kerja</a></li>
												<li><a href="#">Usaha Mandiri</a></li>
												<li><a href="#">Data Sertifikasi</a></li>
					            </ul>
										</li>
										<li><a href="#">Regulasi</a>
											<ul>
												<li><a href="#">Khusus SK</a></li>
					            </ul>
										</li>
									</ul>
								</li>

								<?php if ($this->session->has_userdata('UserLogged_in')): ?>
									<li><a href="#"><?php echo $this->session->userdata('User')->Nama; ?></a></li>
									<li><a class="ticker-btn" href="<?php echo base_url() ?>home/logout">Logout</a></li>
								<?php else: ?>
									<li><a class="ticker-btn" href="<?php echo base_url() ?>signup">Signup</a></li>
				          <li><a class="ticker-btn" href="<?php echo base_url() ?>login">Login</a></li>
								<?php endif; ?>

			        </ul>
			      </nav><!-- #nav-menu-container -->
				</div>
			</div>
		</header><!-- #header -->
