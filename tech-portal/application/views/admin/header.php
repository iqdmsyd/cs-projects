<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <title>Admin &mdash; Tech Portal</title>
  <link rel="icon" href="<?php echo base_url("img/logo.jpg"); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo(base_url("bootstrap/css/bootstrap.min.css")) ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo(base_url("css/style.css")); ?> ">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar fixed-top navbar-expand-lg bg-prim mb-5">
    <div class="container">
      <a class="navbar-brand link-prim" href="#">Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <?php if ($this->session->has_userdata('nama')){ ?>
        	<a class="nav-link link-prim ml-auto" href="#">Hai, Admin.</a>
        	<a class="nav-link link-prim btn btn-danger" href="<?php echo(base_url("Admin/logout")); ?>">Logout</a>
        <?php } ?>
      </div>
    </div>
  </nav>

  <div class="container my-3">
  	Hello
  </div>

  <div class="container mt-5">
		<div class="row">
			<div class="col-2">
				<ul class="list-group">
					<a href="<?php echo base_url("Admin"); ?>">
						<li class="list-group-item item">Berita</li>
					</a>
					<a href="<?php echo base_url("Admin/komentar"); ?>">
						<li class="list-group-item item">Komentar</li>
					</a>
					<a href="<?php echo base_url("Admin/user"); ?>">
						<li class="list-group-item item">User</li>
					</a>
				</ul>
			</div>