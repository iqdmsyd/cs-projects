<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tech Portal</title>
  <link rel="icon" href="<?php echo base_url("img/logo.jpg"); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo(base_url("bootstrap/css/bootstrap.min.css")) ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo(base_url("css/style.css")); ?> ">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar fixed-top navbar-expand-lg bg-prim mb-5">
    <div class="container">
      <!-- <a class="navbar-brand link-prim" href="#">Tech Portal</a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item mr-3 active">
            <a class="nav-link link-prim" href="<?php echo(base_url("Berita/home")); ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link link-prim" href="<?php echo base_url("Berita/about"); ?>">About</a>
          </li>
          <li class="nav-item">
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 ml-auto" action="<?php echo base_url("Berita/search"); ?>" method="GET">
          <input class="form-control" type="search" placeholder="Cari judul berita.." name="judul">
          <button class="btn btn-info" type="submit">Search</button>
        </form>
        <?php if ($this->session->has_userdata('nama')){ ?>
        	<a class="nav-link link-prim" href="#">Hai, <?php echo $this->session->userdata('nama'); ?></a>
        	<a class="nav-link link-prim btn btn-danger" href="<?php echo(base_url("Login/logout")); ?>">Logout</a>
        <?php } else { ?>
        	<a class="nav-link link-prim" href="<?php echo(base_url("Login")); ?>">Login</a>
      	<?php } ?>
      </div>
    </div>
  </nav>

  <div class="container my-3">
  	Hello
  </div>
	
	<?php if (!isset($about)): ?>
	  <div class="container my-5">
	  	<ul class="nav justify-content-center bg-sec">
			  <li class="nav-item">
			    <a class="nav-link link-prim active" href="<?php echo(base_url("Berita/smartphone")); ?>">Smartphone</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link link-prim" href="<?php echo(base_url("Berita/computer")); ?>">Computer</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link link-prim" href="<?php echo(base_url("Berita/camera")); ?>">Camera</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link link-prim" href="<?php echo(base_url("Berita/programming")); ?>">Programming</a>
			  </li>
			</ul>
	  </div>
	<?php endif ?>