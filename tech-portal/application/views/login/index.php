<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<link rel="icon" href="<?php echo base_url("img/logo.jpg"); ?>">
	<title>Login &mdash; Tech Portal</title>
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
					<?php if (isset($success)): ?>
						<p style="color: #2B7A7B" class="text-center"><?php echo $success ?></p>
					<?php endif ?>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" action="<?php echo base_url("Login/loginProses"); ?>">
							 
								<div class="form-group">
									<label for="email">E-Mail Address</label>

									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="<?php echo(base_url("Login/forgot")); ?>" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								</div>

								<div class="form-group">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>

								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="margin-top20 text-center">
									Don't have an account? <a href=" <?php echo(base_url("Login/register")) ?> ">Create One</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; Tech Portal
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