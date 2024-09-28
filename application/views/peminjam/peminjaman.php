<?php require_once('_header.php'); ?>

<section class="product_description_area">
	<div class="container">
		<ul class="nav nav-tabs text-center" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#pesanan" role="tab" aria-controls="home"
					aria-selected="true">Pesanan-ku</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#pinjam" role="tab" aria-controls="profile"
					aria-selected="false">Peminjaman-ku</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="contact-tab" data-toggle="tab" href="#kembali" role="tab" aria-controls="contact"
					aria-selected="false">History</a>
			</li>
		</ul>
  		<div id="done">
  			<?= $this->session->flashdata('alert', true) ?>
  		</div>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="pesanan" role="tabpanel" aria-labelledby="home-tab">
				<div class="row align-items-center">
					<?php foreach ($dipesan as $b) { ?>
						<div class="col-lg-3 col-sm-6">
							<div class="single_product_item">
								<img src="<?= base_url('assets/uploads/' . $b['cover']) ?>" alt="">
								<div class="single_product_text">
									<h4><?= $b['judul'] ?></h4>
									<h3>Penulis : <?= $b['penulis'] ?></h3>
									<?php $rate = $this->Model->rating($b['buku_id']);
									if ($rate == true) { ?>
										<h5>Rate : <?= $rate; ?></h5>
									<?php } else { ?>
										<h5>Rate : - </h5>
									<?php } ?>
									<a href="<?= base_url('peminjam/detail_buku/' . $b['buku_id']) ?>" class="add_cart">detail</a>
									<?php if ($this->Model->isDipesan($b['buku_id']) != NULL) { ?>
										<a onclick="return confirm('Batal mengajukan peminjaman buku <?= $b['judul'] ?>?')" href="<?= base_url('peminjam/batal/' . $b['peminjaman_id']) ?>" class="add_cart">Batal</i></a>
									<?php } ?>
									<?php if ($this->Model->cek_koleksi($this->session->userdata('user_id'), $b['buku_id']) == NULL) { ?>
										<a onclick="return confirm('Tambahkan buku <?= $b['judul'] ?> ke favoritemu?')" href="<?= base_url('peminjam/add_koleksi/' . $b['buku_id']) ?>" class="add_cart"><i class="ti-heart"></i></a>
									<?php } else if ($this->Model->cek_koleksi($this->session->userdata('user_id'), $b['buku_id']) != NULL) { ?>
										<a class="add_cart"><i class="ti-check"></i></a>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="tab-pane fade" id="pinjam" role="tabpanel" aria-labelledby="profile-tab">
				<div class="row align-items-center">
					<?php foreach ($dipinjam as $b) { ?>
						<div class="col-lg-3 col-sm-6">
							<div class="single_product_item">
								<img src="<?= base_url('assets/uploads/' . $b['cover']) ?>" alt="">
								<div class="single_product_text">
									<h4><?= $b['judul'] ?></h4>
									<h3>Penulis : <?= $b['penulis'] ?></h3><?php $rate = $this->Model->rating($b['buku_id']);
																			if ($rate == true) { ?>
										<h5>Rate : <?= $rate; ?></h5>
									<?php } else { ?>
										<h5>Rate : - </h5>
									<?php } ?>
									<a href="<?= base_url('peminjam/detail_buku/' . $b['buku_id']) ?>" class="add_cart">detail</a>
									<?php if ($this->Model->cek_koleksi($this->session->userdata('user_id'), $b['buku_id']) == NULL) { ?>
										<a onclick="return confirm('Tambahkan buku <?= $b['judul'] ?> ke favoritemu?')" href="<?= base_url('peminjam/add_koleksi/' . $b['buku_id']) ?>" class="add_cart"><i class="ti-heart"></i></a>
									<?php } else if ($this->Model->cek_koleksi($this->session->userdata('user_id'), $b['buku_id']) != NULL) { ?>
										<a class="add_cart"><i class="ti-check"></i></a>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="tab-pane fade" id="kembali" role="tabpanel" aria-labelledby="contact-tab">
				<div class="row align-items-center">
					<?php foreach ($dikembalikan as $b) { ?>
						<div class="col-lg-3 col-sm-6">
							<div class="single_product_item">
								<img src="<?= base_url('assets/uploads/' . $b['cover']) ?>" alt="">
								<div class="single_product_text">
									<h4><?= $b['judul'] ?></h4>
									<h3>Penulis : <?= $b['penulis'] ?></h3><?php $rate = $this->Model->rating($b['buku_id']);
																			if ($rate == true) { ?>
										<h5>Rate : <?= $rate; ?></h5>
									<?php } else { ?>
										<h5>Rate : - </h5>
									<?php } ?>
									<a href="<?= base_url('peminjam/detail_buku/' . $b['buku_id']) ?>" class="add_cart">detail</a>
									<?php if ($this->Model->cek_koleksi($this->session->userdata('user_id'), $b['buku_id']) == NULL) { ?>
										<a onclick="return confirm('Tambahkan buku <?= $b['judul'] ?> ke favoritemu?')" href="<?= base_url('peminjam/add_koleksi/' . $b['buku_id']) ?>" class="add_cart"><i class="ti-heart"></i></a>
									<?php } else if ($this->Model->cek_koleksi($this->session->userdata('user_id'), $b['buku_id']) != NULL) { ?>
										<a class="add_cart"><i class="ti-check"></i></a>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- awesome_shop start-->
<section class="our_offer section_padding">
	<div class="container">
		<div class="row align-items-center justify-content-between">
			<div class="col-lg-6 col-md-6">
				<div class="offer_img">
					<img src="<?= base_url('assets/images/') ?>dash2.jpg" alt="">
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="offer_text">
					<h2>Tentang bukumu!</h2>
					<div class="date_countdown">
						<div id="timer">
							<div class="date">Buku <span><?= $this->Model->get_total_buku(); ?></span></div>
							<div class="date">Koleksi mu <span><?= $this->Model->get_total_koleksi($this->session->userdata('user_id')); ?></span></div>
						</div>
					</div>
				</div>
				<form action="<?= base_url('peminjam/cari_buku') ?>" method="post">
					<div class="input-group">
						<input required type="text" name="judul" class="form-control" placeholder="Cari buku"
							aria-label="Recipient's username" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button type="submit" class="input-group-text btn_2" id="basic-addon2">Cari</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- awesome_shop part start-->

<!-- product_list part start-->
<section class="product_list best_seller section_padding">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="section_tittle text-center">
					<h2>Another <span>Book</span></h2>
				</div>
			</div>
		</div>
		<div class="row align-items-center">
			<?php foreach ($buku_limit2 as $b) { ?>
				<div class="col-lg-3 col-sm-6 mt-3">
					<div class="single_product_item">
						<img src="<?= base_url('assets/uploads/' . $b['cover']) ?>" alt="">
						<div class="single_product_text">
							<h4><?= $b['judul'] ?></h4>
							<h3>Penulis : <?= $b['penulis'] ?></h3>
							<?php $rate = $this->Model->rating($b['buku_id']);
							if ($rate == true) { ?>
								<h5>Rate : <?= $rate; ?></h5>
							<?php } else { ?>
								<h5>Rate : - </h5>
							<?php } ?>
							<a href="<?= base_url('peminjam/detail_buku/' . $b['buku_id']) ?>" class="add_cart">detail</a>
							<?php if ($this->Model->isDipesan($b['buku_id']) == NULL) { ?>
								<a onclick="return confirm('Pinjam buku <?= $b['judul'] ?>?')" href="<?= base_url('peminjam/pinjam/' . $b['buku_id']) ?>" class="add_cart">+ pinjam</i></a>
							<?php } elseif ($this->Model->isDipesan($b['buku_id']) != NULL) { ?>
								<a class="add_cart">Dalam pengajuan</a>
							<?php } elseif ($this->Model->isPinjam($b['buku_id']) == true) { ?>
								<a class="add_cart">Dipinjam</a>
							<?php } ?>
							<?php if ($this->Model->cek_koleksi($this->session->userdata('user_id'), $b['buku_id']) == NULL) { ?>
								<a onclick="return confirm('Tambahkan buku <?= $b['judul'] ?> ke favoritemu?')" href="<?= base_url('peminjam/add_koleksi/' . $b['buku_id']) ?>" class="add_cart"><i class="ti-heart"></i></a>
							<?php } else if ($this->Model->cek_koleksi($this->session->userdata('user_id'), $b['buku_id']) != NULL) { ?>
								<a class="add_cart"><i class="ti-check"></i></a>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<!-- product_list part end-->

<!-- subscribe_area part start-->
<section class="subscribe_area section_padding">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="subscribe_area_text text-center">
					<h5>Kunjungi Perpus SIE</h5>
					<h2>Kunjungi Perpus SIE</h2>
					<p>Perpus SIE adalah salah satu perpustakaan yang berada di kabupatan siapa tau. lengkapnya berada di jalan bodo amat nomer lelah seberang pasar capek. Kamu bisa memaca dan meminjam buku di sana. Terimakasih!</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!--::subscribe_area part end::-->


<?php require_once('_footer.php'); ?>
