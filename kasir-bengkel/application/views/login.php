<!DOCTYPE html>
<html>
<head>
	<!-- Bootswatch link -->
	<link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
	<!-- Fontawesome link -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<title>Login PastiBeres.com</title>
</head>
<body>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-4 mt-5">
				<h5 class="text-center">Login</h5>
				<?php echo form_open('Login/login'); ?>
				<input type="text" name="username" class="form-control" placeholder="Username" autofocus> <br>
				<input type="password" name="password" class="form-control" placeholder="Password"> <br>
				<input type="submit" name="submit" class="form-control btn btn-info" value="Login">
			</div>
		</div> 
	</div>


</body>
</html>