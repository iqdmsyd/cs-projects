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
			<div class="row justify-content-md-center align-items-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<a href="<?php echo base_url("Berita/home"); ?>"><img src="<?php echo base_url("img/logo.jpg"); ?>"></a>
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Lupa Password</h4>
							<form method="POST" action="<?php echo base_url("Login/forgotProses"); ?>">
							 
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="form-text text-muted">
										Dengan mengklik "Reset Password" kami akan mengirim alamat untuk mereset password akun Anda.
									</div>
								</div>

								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										Reset Password
									</button>
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
</body>
</html>