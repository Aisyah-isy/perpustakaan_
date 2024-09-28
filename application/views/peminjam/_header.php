<!doctype html>
<html lang="zxx">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Perpus SIE | <?= $title; ?></title>
	<link rel="icon" href="<?= base_url('assets/aranoz/') ?>img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/aranoz/') ?>css/bootstrap.min.css">
	<!-- animate CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/aranoz/') ?>css/animate.css">
	<!-- owl carousel CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/aranoz/') ?>css/owl.carousel.min.css">
	<!-- font awesome CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/aranoz/') ?>css/all.css">
	<!-- flaticon CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/aranoz/') ?>css/flaticon.css">
	<link rel="stylesheet" href="<?= base_url('assets/aranoz/') ?>css/themify-icons.css">
	<!-- font awesome CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/aranoz/') ?>css/magnific-popup.css">
	<!-- swiper CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/aranoz/') ?>css/slick.css">
	<!-- style CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/aranoz/') ?>css/style.css">
</head>

<body>
	<!--::header part start::-->
	<header class="main_menu home_menu">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="<?= base_url('peminjam') ?>"> <img src="<?= base_url('assets/aranoz/') ?>img/logo.png" alt="logo"> </a>
						<button class="navbar-toggler" type="button" data-toggle="collapse"
							data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="menu_icon"><i class="fas fa-bars"></i></span>
						</button>

						<div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link" href="<?= base_url('peminjam') ?>">Home</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= base_url('peminjam/buku') ?>">Buku</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= base_url('peminjam/koleksi') ?>">Favorite-ku</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= base_url('peminjam/peminjaman') ?>">Peminjaman-ku</a>
								</li>
							</ul>
						</div>
						<div class="hearer_icon d-flex">
							<a onclick="return confirm('yakin ingin logout?')" href="<?= base_url('auth/logout') ?>"><i class="ti-user"></i></a>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>
	
	<!-- Header part end-->
