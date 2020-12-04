<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<title>Login &mdash; Admin News Portal</title>
	<link rel="stylesheet" type="text/css" href="<?php echo(base_url("bootstrap/css/bootstrap.min.css")) ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo(base_url("css/my-login.css")) ?>">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<a href="<?php echo base_url("Berita/home") ?>">
							<img src="<?php echo base_url("img/logo.jpg"); ?>">
						</a>
					</div>
					<?php if (isset($error)): ?>
						<p style="color: red" class="text-center"><?php echo $error ?></p>
					<?php endif ?>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" action="<?php echo base_url("Admin/login"); ?>">
							 
								<div class="form-group">
									<label for="username">Username</label>

									<input id="username" type="text" class="form-control" name="username" value="" required autofocus>
								</div>

								<div class="form-group">
									<label for="password">Password
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								</div>

								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; News Portal
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo(base_url("js/jquery.min.js")); ?>"></script>
	<script src="<?php echo(base_url("bootstrap/js/bootstrap.min.js")); ?>"></script>
	<script src="<?php echo(base_url("js/my-login.js")); ?>"></script>
</body>
</html>