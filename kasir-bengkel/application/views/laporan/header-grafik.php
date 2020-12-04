<!DOCTYPE html>
<html>
<head>
	<title>PastiBeres</title>
  <link rel="icon" href="<?php echo base_url("asset/icon.png") ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <style type="text/css">

        ::selection{ background-color: #E13300; color: white; }
        ::moz-selection{ background-color: #E13300; color: white; }
        ::webkit-selection{ background-color: #E13300; color: white; }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }
        
        #container{
            margin: 10px;
            border: 1px solid #D0D0D0;
            -webkit-box-shadow: 0 0 8px #D0D0D0;
        }
        </style>
</head>
<body>
<div class="container mt-3" style="background-color: #BAC3EA; height: 150px">
	<div class="row">
		<div class="col-md-2">
			<img src="<?php echo base_url("asset/icon.png")?>" style="width: 160px; height: 150px;">
		</div>
		<div class="col-md-6" style="margin-top: 13px;">
			<br><div class="row"><h2><b>PastiBeres.com</b></h2></div>
			<div class="row"><h5>Servis & Penjualan Spare Part Terbaik</h5></div>
		</div>
	</div>
    <div class="row" style="background-color: #DDDDDD">
        <div class="container">
            <a href="<?php echo site_url('Admin/laporanTransaksiPart') ?>"><-Kembali</a>
        </div>
    </div>
</div>