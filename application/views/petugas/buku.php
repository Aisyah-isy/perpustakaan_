<?php require_once('_header.php'); ?>


<div class="card">
	<h5 class="card-header">Data buku</h5>
	<div class="card-body">
		<a class="btn btn-sm mb-3 btn-primary" href="<?= base_url('petugas/add_bukuC') ?>"><i class="bx bx-plus me-1"></i> Add buku </a>
		<div class="table-responsive text-nowrap">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Stok Tersedia</th>
						<th>Dipinjam</th>
						<th>Stok Total </th>
						<th>Detail</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($buku as $u) { ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $u['judul'] ?></td>
							<td><?= $u['stok'] ?></td>
							<?php $awal = $u['stok_total'];
							$akhir = $u['stok'];
							$hasil = $awal - $akhir;
							?>
							<td><?= $hasil; ?></td>
							<td><?= $u['stok_total'] ?></td>
							<td>
								<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detail<?= $u['buku_id'] ?>"><i class="bx bx-book-open me-1"></i> Detail</button>
								<!-- Large Modal -->
								<div class="modal fade" id="detail<?= $u['buku_id'] ?>" tabindex="-1" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel3">Detail Buku</h5>
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
								<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal<?= $u['buku_id'] ?>"><i class="bx bx-edit-alt me-1"></i> </button>
								<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data buku?')" href="<?= base_url('petugas/delete_buku/' . $u['buku_id'] . '/' . $u['cover']) ?>"><i class="bx bx-trash me-1"></i> </a>
							</td>
							<!-- Large Modal -->
							<div class="modal fade" id="largeModal<?= $u['buku_id'] ?>" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel3">Edit data buku</h5>
											<button
												type="button"
												class="btn-close"
												data-bs-dismiss="modal"
												aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<form action="<?= base_url('petugas/update_buku') ?>" method="post" enctype="multipart/form-data">
												<input type="hidden" name="buku_id" value="<?= $u['buku_id'] ?>">
												<input type="hidden" name="coverN" value="<?= $u['cover'] ?>">
												<div class="row">
													<div class="mb-0">
														<label class="form-label" for="basic-default-fullname">Judul</label>
														<input type="text" value="<?= $u['judul'] ?>" class="form-control" id="basic-default-fullname" name="judul" placeholder="Judul Buku">
													</div>
												</div>
												<div class="row g-2 mt-2">
													<div class="col mb-0">
														<label for="nameLarge" class="form-label">Penulis</label>
														<input type="text" value="<?= $u['penulis'] ?>" name="penulis" id="nameLarge" class="form-control" placeholder="Penulis" />
													</div>
													<div class="col mb-0">
														<label for="nameLarge" class="form-label">Penerbit</label>
														<input type="text" value="<?= $u['penerbit'] ?>" name="penerbit" id="nameLarge" class="form-control" placeholder="Penerbit" />
													</div>
												</div>
												<div class="row g-2 mt-2">
													<?php $kategori = $this->Model->get_kategori(); ?>
													<div class="col mb-0">
														<label for="nameLarge" class="form-label">Kategori</label>
														<select class="form-control" name="kategori_id[]" id="" multiple>
															<?php foreach ($kategori as $k) { ?>
																<option class="form-control" value="<?= $k['kategori_id'] ?>"><?= $k['kategori'] ?></option>
															<?php } ?>
														</select>
													</div>
													<div class="col mb-0">
														<label for="nameLarge" class="form-label">Tahun Terbit</label>
														<input type="number" value="<?= $u['tahun_terbit'] ?>" name="tahun_terbit" id="nameLarge" class="form-control" placeholder="Tahun Terbit" />
													</div>
												</div>
												<div class="row g-2 mt-2">
													<div class="col mb-0">
														<label for="nameLarge" class="form-label">Cover</label>
														<input type="file" accept="image/jpg, image/png, image/jpeg" name="cover" id="nameLarge" class="form-control" placeholder="Cover" />
													</div>
													<div class="col mb-0">
														<label for="nameLarge" class="form-label">Stok</label>
														<input type="number" value="<?= $u['stok'] ?>" name="stok" id="nameLarge" class="form-control" placeholder="Stok" />
													</div>
												</div>
												<div class="row">
													<div class="mb-0">
														<label class="form-label" for="basic-default-fullname">Sinopsis</label>
														<input type="text" value="<?= $u['sinopsis'] ?>" class="form-control" id="basic-default-fullname" name="sinopsis" placeholder="Sinopsis"></input>
													</div>
												</div>
												<button type="submit" class="btn btn-primary mt-3">Save</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</tr>
					<?php $no++;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php require_once('_footer.php'); ?>
