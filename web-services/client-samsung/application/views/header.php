<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="<?php echo base_url("img/samsung.png"); ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .sidebar {
      color: black;
      background-color: #EEEEEE;
    }
		.sidebar:hover{
			color: white;
			background-color: #004da3;
		}
    tr, td {
        line-height: 10px;
    }
    .btn-prim {
    	color: white;
    	background-color: #004da3;
    }
    .btn-prim:hover {
    	color: white;
    	background-color: #002957;			
    }
    .text-prim {
    	color: #004da3;
    }
    .tab-prim {
    	line-height: 120%;
    }

  </style>

  <title>Samsung Store</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
    <a class="navbar-brand" href="<?php echo base_url("Barang"); ?>"><img class="img-fluid" width= "10%" src="<?php echo base_url(); ?>img/samsung.png" alt=></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        
      </ul>
        <a href="<?php echo base_url("Login/logout") ?>"><button class="btn btn-prim my-2 my-sm-0">Logout</button></a>
    </div>
    </div>
  </nav>

  <div class="container">
    <h1 class="text-center"><img class="img-fluid" width= "30%" src="<?php echo base_url(); ?>img/samsung1.png" alt=> </h1>
  </div>