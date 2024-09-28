<!doctype html>
<html lang="zxx">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>aranoz</title>
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

	<!--================login_part Area =================-->
	<section class="login_part mt-3">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-6">
					<div class="login_part_text text-center">
						<div class="login_part_text_iner">
							<h2>Have an account PERPUS SIE?</h2>
							<p>Log in terlebih dahulu untuk memulai menjelajahi jendela duni bersama PERPUS SIE</p>
							<a href="<?= base_url('auth') ?>" class="btn_3">log in</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="login_part_form">
						<div class="login_part_form_iner">
							<h3>Welcome ! <br>
								Register untuk membuat akun!</h3>
							<form class="row contact_form" action="<?= base_url('auth/proccess_register') ?>" method="post" novalidate="novalidate">
								<div class="col-md-12 form-group p_star">
									<input require type="text" class="form-control" id="name" name="nama" value=""
										placeholder="Nama">
								</div>
								<div class="col-md-12 form-group p_star">
									<input require type="email" class="form-control" id="name" name="email" value=""
										placeholder="Email">
								</div>
								<div class="col-md-12 form-group p_star">
									<input require type="text" class="form-control" id="name" name="username" value=""
										placeholder="Username">
								</div>
								<div class="col-md-12 form-group p_star">
									<input require type="password" class="form-control" id="password" name="password" value=""
										placeholder="Password">
								</div>
								<div class="col-md-12 form-group p_star">
									<textarea type="text" class="form-control" id="name" name="alamat" value=""
										placeholder="Alamat"></textarea>
								</div>
								<div class="col-md-12 form-group">
									<button type="submit" value="submit" class="btn_3">
										Register
									</button>
									<div id="done">
										<?= $this->session->flashdata('alert', true) ?>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================login_part end =================-->

	<!--::footer_part start::-->
	<footer class="footer_part">
		<div class="container">
		</div>
	</footer>
	<!--::footer_part end::-->

	<!-- jquery plugins here-->
	<!-- jquery -->
	<script src="<?= base_url('assets/aranoz/') ?>js/jquery-1.12.1.min.js"></script>
	<!-- popper js -->
	<script src="<?= base_url('assets/aranoz/') ?>js/popper.min.js"></script>
	<!-- bootstrap js -->
	<script src="<?= base_url('assets/aranoz/') ?>js/bootstrap.min.js"></script>
	<!-- easing js -->
	<script src="<?= base_url('assets/aranoz/') ?>js/jquery.magnific-popup.js"></script>
	<!-- swiper js -->
	<script src="<?= base_url('assets/aranoz/') ?>js/swiper.min.js"></script>
	<!-- swiper js -->
	<script src="<?= base_url('assets/aranoz/') ?>js/masonry.pkgd.js"></script>
	<!-- particles js -->
	<script src="<?= base_url('assets/aranoz/') ?>js/owl.carousel.min.js"></script>
	<script src="<?= base_url('assets/aranoz/') ?>js/jquery.nice-select.min.js"></script>
	<!-- slick js -->
	<script src="<?= base_url('assets/aranoz/') ?>js/slick.min.js"></script>
	<script src="<?= base_url('assets/aranoz/') ?>js/jquery.counterup.min.js"></script>
	<script src="<?= base_url('assets/aranoz/') ?>js/waypoints.min.js"></script>
	<script src="<?= base_url('assets/aranoz/') ?>js/contact.js"></script>
	<script src="<?= base_url('assets/aranoz/') ?>js/jquery.ajaxchimp.min.js"></script>
	<script src="<?= base_url('assets/aranoz/') ?>js/jquery.form.js"></script>
	<script src="<?= base_url('assets/aranoz/') ?>js/jquery.validate.min.js"></script>
	<script src="<?= base_url('assets/aranoz/') ?>js/mail-script.js"></script>
	<script src="<?= base_url('assets/aranoz/') ?>js/stellar.js"></script>
	<script src="<?= base_url('assets/aranoz/') ?>js/price_rangs.js"></script>
	<!-- custom js -->
	<script src="<?= base_url('assets/aranoz/') ?>js/custom.js"></script>
</body>

</html>
