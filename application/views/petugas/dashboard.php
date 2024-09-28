<?php require_once('_header.php'); ?>

<div class="card">
	<div class="d-flex align-items-end row">
		<div class="col-sm-10">
			<div class="card-body">
				<h3 class="card-title text-primary">Welcome to Perpus SIE <?= $this->session->userdata('role'); ?> <?= $this->session->userdata('nama'); ?>! 🎉</h3>
				<p class="mb-4">
					Mulai manajemen buku dari sini!
				</p>

			</div>
		</div>
		<div class="col-sm-2 text-center text-sm-left">
			<div class="card-body pb-0 px-0 ">
				<img src="<?= base_url('assets/sneat') ?>/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
			</div>
		</div>
	</div>
</div>
<div class="col-lg-6 col-md-6 mt-3">
	<div class="d-flex">
		<div class="col-lg-6 col-md-12 col-6 p-3 mb-4">
			<div class="card alert-primary">
				<div class="card-body">
					<div class="card-title d-flex align-items-start justify-content-between">
						<div class="">
						<i class="menu-icon tf-icons bx bx-book"></i>
						</div>
					</div>
					<h4 class="card-title text-nowrap mb-1">Total Buku</h4>
					<h5 class="mt-2 fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?= $this->Model->get_total_buku();?></h5>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12 col-6 p-3 mb-4">
			<div class="card alert-secondary">
				<div class="card-body">
					<div class="card-title d-flex align-items-start justify-content-between">
						<div class="">
						<i class="menu-icon tf-icons bx bx-book"></i>
						</div>
					</div>
					<h4 class="card-title text-nowrap mb-1">Total User</h4>
					<h5 class="mt-2 fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?= $this->Model->get_total_user();?></h5>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12 col-6 p-3 mb-4">
			<div class="card alert-info">
				<div class="card-body">
					<div class="card-title d-flex align-items-start justify-content-between">
						<div class="">
						<i class="menu-icon tf-icons bx bx-book"></i>
						</div>
					</div>
					<h4 class="card-title text-nowrap mb-1">Total Peminjaman</h4>
					<h5 class="mt-2 fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?= $this->Model->get_total_peminjaman();?></h5>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12 col-6 p-3 mb-4">
			<div class="card alert-dark">
				<div class="card-body">
					<div class="card-title d-flex align-items-start justify-content-between">
						<div class="">
						<i class="menu-icon tf-icons bx bx-book"></i>
						</div>
					</div>
					<h4 class="card-title text-nowrap mb-1">Total Buku Dipesan</h4>
					<h5 class="mt-2 fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?= $this->Model->get_total_dipesan();?></h5>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-lg-6 col-md-6 mt-3">
	<div class="d-flex">
		<div class="col-lg-6 col-md-12 col-6 p-3 mb-4">
			<div class="card alert-success">
				<div class="card-body">
					<div class="card-title d-flex align-items-start justify-content-between">
						<div class="">
						<i class="menu-icon tf-icons bx bx-book"></i>
						</div>
					</div>
					<h4 class="card-title text-nowrap mb-1">Total Buku Dipinjam</h4>
					<h5 class="mt-2 fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?= $this->Model->get_total_dipinjam();?></h5>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12 col-6 p-3 mb-4">
			<div class="card alert-warning">
				<div class="card-body">
					<div class="card-title d-flex align-items-start justify-content-between">
						<div class="">
						<i class="menu-icon tf-icons bx bx-book"></i>
						</div>
					</div>
					<h4 class="card-title text-nowrap mb-1">Total Buku Dikembalikan</h4>
					<h5 class="mt-2 fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?= $this->Model->get_total_dikembalikan();?></h5>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12 col-6 p-3 mb-4">
			<div class="card alert-primary">
				<div class="card-body">
					<div class="card-title d-flex align-items-start justify-content-between">
						<div class="">
						<i class="menu-icon tf-icons bx bx-book"></i>
						</div>
					</div>
					<h4 class="card-title text-nowrap mb-1">Total Kategori</h4>
					<h5 class="mt-2 fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?= $this->Model->get_total_kategori();?></h5>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12 col-6 p-3 mb-4">
			<div class="card alert-secondary">
				<div class="card-body">
					<div class="card-title d-flex align-items-start justify-content-between">
						<div class="">
						<i class="menu-icon tf-icons bx bx-book"></i>
						</div>
					</div>
					<h4 class="card-title text-nowrap mb-1">Total Ulasan</h4>
					<h5 class="mt-2 fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?= $this->Model->get_total_ulasan_admin();?></h5>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once('_footer.php'); ?>
