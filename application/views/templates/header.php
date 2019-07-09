<!doctype html>
<html lang="en" id="home">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Mapbox -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.css' rel='stylesheet' />

    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700|Varela+Round|Viga&display=swap" rel="stylesheet">
    <!-- font-family: 'Viga', sans-serif;
font-family: 'Nunito', sans-serif;
font-family: 'Varela Round', sans-serif; -->

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/swiper.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/daterangepicker.css">

    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/icon/logo_hadds.png" type="image/png">
    <title><?= $judul; ?></title>
  </head>

  <body data-spy="scroll" data-target="#navbarNavAltMarkup">

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" id="mainNav">
			<div class="container">
				<a class="navbar-brand page-scroll" href="#home"><img src="<?= base_url(); ?>assets/img/icon/hadds_logo_navbar.png" style="height:50px;"> HADDS</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav ml-auto">
						<a class="nav-item nav-link page-scroll" href="#definition">Apa itu HADDS ?</a>
						<a class="nav-item nav-link page-scroll" href="#heatmap">Heatmap</a>
						<a class="nav-item nav-link page-scroll" href="#team">Tentang Kami</a>
					</div>
				</div>
			</div>  
    </nav>
    <!-- Akhir Navbar -->