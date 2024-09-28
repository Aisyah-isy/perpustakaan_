<?php require_once('_header.php'); ?>

<div class="card">
	<div class="card-header">
		<h5>Data Peminjaman</h5>
	</div>
	<div class="card-body">
		<div class="demo-inline-spacing mt-3">
			<div class="list-group list-group-horizontal-md text-md-center">
				<a class="list-group-item list-group-item-action active" id="home-list-item" data-bs-toggle="list" href="#pengajuan">Pengajuan</a>
				<a class="list-group-item list-group-item-action" id="profile-list-item" data-bs-toggle="list" href="#pengembalian">Pengembalian</a>
				<a class="list-group-item list-group-item-action" id="messages-list-item" data-bs-toggle="list" href="#Peminjaman">Dikembalikan</a>
			</div>
			<div class="tab-content px-0 mt-0">
				<div class="tab-pane fade show active" id="pengajuan">
					<div class="table-responsive text-nowrap">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Judul</th>
									<th>Peminjam</th>
									<th>Stok Tersedia</th>
									<th>Detail</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($dipesan as $u) { ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $u['judul'] ?></td>
										<td><?= $u['peminjam_username'] ?></td>
										<td><?= $u['stok'] ?></td>
										<td>
											<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detail<?= $u['buku_id'] ?>"><i class="bx bx-book-open me-1"></i> Detail</button>
											<!-- Large Modal -->
											<div class="modal fade" id="detail<?= $u['buku_id'] ?>" tabindex="-1" aria-hidden="true">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel3">Detail Peminjaman</h5>
															<button
																type="button"
																class="btn-close"
																data-bs-dismiss="modal"
																aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<div class="">
																<img class="card-img-top" src="<?= base_url('assets/uploads/') . $u['cover'] ?>" alt="Card image cap">
																<div class="card-body">
																	<style>
																		.card-text {
																			white-space: normal;
																		}
																	</style>
																	<h5 class="card-title"> Judul : <?= $u['judul'] ?></h5>
																	<ul class="list-group mb-2">
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-user me-2"></i>
																			Peminjam : <?= $u['peminjam_username'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Tanggal Pinjam : <?= $u['tanggal_pinjam'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Batas Pengembalian : <?= $u['batas_pengembalian'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Tanggal Pengembalian : <?= $u['tanggal_kembali'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Denda : Rp. <?= number_format($u['denda']) ?>
																		</li>
																	</ul>
																	<ul class="list-group">
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-pen me-2"></i>
																			Penulis : <?= $u['penulis'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-bell me-2"></i>
																			Penerbit : <?= $u['penerbit'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Tahun Terbit : <?= $u['tahun_terbit'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-package me-2"></i>
																			Stok : <?= $u['stok'] ?>
																		</li>
																		<?php $relasi = $this->Model->get_buku_relasi($u['buku_id']); ?>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-box me-2"></i>
																			Kategori :
																			<ul>
																				<?php foreach ($relasi as $r) { ?>
																					<li><?= $r['kategori'] ?></li>
																				<?php } ?>
																			</ul>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-closet me-2"></i>
																			<p class="card-text">
																				Sinopsis : <?= $u['sinopsis'] ?>
																			</p>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
																Close
															</button>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td>
											<a class="btn btn-sm btn-success" onclick="return confirm('Yakin ingin menyetujui peminjaman buku?')" href="<?= base_url('petugas/aprove/' . $u['peminjaman_id']) ?>"><i class="bx bx-check"></i> </a>
											<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menolak peminjaman buku?')" href="<?= base_url('petugas/tolak/' . $u['peminjaman_id']) ?>"><i class="bx bx-x me-1"></i> </a>
										</td>
									</tr>
								<?php $no++;
								} ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="pengembalian">
					<div class="table-responsive text-nowrap">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Judul</th>
									<th>Peminjam</th>
									<th>Stok Tersedia</th>
									<th>Detail</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($dipinjam as $p) { ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $p['judul'] ?></td>
										<td><?= $p['peminjam_username'] ?></td>
										<td><?= $p['stok'] ?></td>
										<td>
											<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detail<?= $p['peminjaman_id'] ?>"><i class="bx bx-book-open me-1"></i> Detail</button>
											<!-- Large Modal -->
											<div class="modal fade" id="detail<?= $p['peminjaman_id'] ?>" tabindex="-1" aria-hidden="true">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel3">Detail Peminjaman</h5>
															<button
																type="button"
																class="btn-close"
																data-bs-dismiss="modal"
																aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<div class="">
																<img class="card-img-top" src="<?= base_url('assets/uploads/') . $p['cover'] ?>" alt="Card image cap">
																<div class="card-body">
																	<style>
																		.card-text {
																			white-space: normal;
																		}
																	</style>
																	<h5 class="card-title"> Judul : <?= $p['judul'] ?></h5>
																	<ul class="list-group mb-2">
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-user me-2"></i>
																			Peminjam : <?= $p['peminjam_username'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Tanggal Pinjam : <?= $p['tanggal_pinjam'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Batas Pengembalian : <?= $p['batas_pengembalian'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Tanggal Pengembalian : <?= $p['tanggal_kembali'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Denda : Rp. <?= number_format($p['denda']) ?>
																		</li>
																	</ul>
																	<ul class="list-group">
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-pen me-2"></i>
																			Penulis : <?= $p['penulis'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-bell me-2"></i>
																			Penerbit : <?= $p['penerbit'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Tahun Terbit : <?= $p['tahun_terbit'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-package me-2"></i>
																			Stok : <?= $p['stok'] ?>
																		</li>
																		<?php $relasi = $this->Model->get_buku_relasi($p['buku_id']); ?>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-box me-2"></i>
																			Kategori :
																			<ul>
																				<?php foreach ($relasi as $r) { ?>
																					<li><?= $r['kategori'] ?></li>
																				<?php } ?>
																			</ul>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-closet me-2"></i>
																			<p class="card-text">
																				Sinopsis : <?= $p['sinopsis'] ?>
																			</p>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
																Close
															</button>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td>
											<a class="btn btn-sm btn-primary" onclick="return confirm('Yakin sudah menerima pengembalian buku?')" href="<?= base_url('petugas/kembali/' . $p['peminjaman_id']) ?>"><i class="bx bx-check"></i> </a>
										</td>
									</tr>
								<?php $no++;
								} ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="Peminjaman">
					<div class="table-responsive text-nowrap">
					<table class="table table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Judul</th>
									<th>Peminjam</th>
									<th>Stok Tersedia</th>
									<th>Denda</th>
									<th>Detail</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($dikembalikan as $s) { ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $s['judul'] ?></td>
										<td><?= $s['peminjam_username'] ?></td>
										<td><?= $s['stok'] ?></td>
										<td>Rp. <?= number_format($s['denda']) ?></td>
										<td>
											<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detail<?= $s['peminjaman_id'] ?>"><i class="bx bx-book-open me-1"></i> Detail</button>
											<!-- Large Modal -->
											<div class="modal fade" id="detail<?= $s['peminjaman_id'] ?>" tabindex="-1" aria-hidden="true">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel3">Detail Peminjaman Buku</h5>
															<button
																type="button"
																class="btn-close"
																data-bs-dismiss="modal"
																aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<div class="">
																<img class="card-img-top" src="<?= base_url('assets/uploads/') . $s['cover'] ?>" alt="Card image cap">
																<div class="card-body">
																	<style>
																		.card-text {
																			white-space: normal;
																		}
																	</style>
																	<h5 class="card-title"> Judul : <?= $s['judul'] ?></h5>
																	<ul class="list-group mb-2">
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-user me-2"></i>
																			Peminjam : <?= $s['peminjam_username'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Tanggal Pinjam : <?= $s['tanggal_pinjam'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Batas Pengembalian : <?= $s['batas_pengembalian'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Tanggal Pengembalian : <?= $s['tanggal_kembali'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Denda : Rp. <?= number_format($s['denda']) ?>
																		</li>
																	</ul>
																	<ul class="list-group">
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-pen me-2"></i>
																			Penulis : <?= $s['penulis'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-bell me-2"></i>
																			Penerbit : <?= $s['penerbit'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-table me-2"></i>
																			Tahun Terbit : <?= $s['tahun_terbit'] ?>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-package me-2"></i>
																			Stok : <?= $s['stok'] ?>
																		</li>
																		<?php $relasi = $this->Model->get_buku_relasi($s['buku_id']); ?>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-box me-2"></i>
																			Kategori :
																			<ul>
																				<?php foreach ($relasi as $r) { ?>
																					<li><?= $r['kategori'] ?></li>
																				<?php } ?>
																			</ul>
																		</li>
																		<li class="list-group-item d-flex align-items-center">
																			<i class="bx bx-closet me-2"></i>
																			<p class="card-text">
																				Sinopsis : <?= $s['sinopsis'] ?>
																			</p>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
																Close
															</button>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td>
											<?= $s['status_peminjaman'] ?>
										</td>
									</tr>
								<?php $no++;
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<?php require_once('_footer.php'); ?>
