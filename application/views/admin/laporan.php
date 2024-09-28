<?php require_once('_header.php'); ?>

<div class="card">
	<div class="card-header">
		<h5>Laporan Peminjaman Buku</h5>
	</div>
	<div class="card-body">
		<button
			type="button"
			class="btn btn-danger mb-3"
			data-bs-toggle="modal"
			data-bs-target="#basicModal">
			Cetak
		</button>

		<!-- Modal -->
		<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel1">Pilih Tanggal</h5>
						<button
							type="button"
							class="btn-close"
							data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
					<form action="<?= base_url('admin/cetak') ?>" target="_blank" method="post">
						<div class="modal-body">
							<div class="row">
								<div class="col mb-3">
									<label for="nameBasic" class="form-label">Tanggal Awal</label>
									<input required type="date" name="tanggal1" id="nameBasic" class="form-control" placeholder="" />
								</div>
							</div>
							<div class="row">
								<div class="col mb-3">
									<label for="nameBasic" class="form-label">Tanggal Akhir</label>
									<input required type="date" name="tanggal2" id="nameBasic" class="form-control" placeholder="" />
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
								Close
							</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="table-responsive text-nowrap">
			<h5>Total denda : Rp. <?= number_format($total); ?></h5>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Peminjam</th>
						<th>Stok Tersedia</th>
						<th>Denda</th>
						<th>Detail</th>
						<th>Status Peminjaman</th>
					</tr>
				</thead>
				<tbody>

					<?php $no = 1;
					foreach ($peminjaman as $s) { ?>
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
								<?= $s['status_peminjaman'] ?> </td>
						</tr>
					<?php $no++;
					} ?>
				</tbody>
			</table>
		</div>

	</div>
</div>



<?php require_once('_footer.php'); ?>
