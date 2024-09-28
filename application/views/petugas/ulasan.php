<?php require_once('_header.php'); ?>


<div class="card">
	<h5 class="card-header">Data buku</h5>
	<div class="card-body">
		<div class="table-responsive text-nowrap">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Penulis</th>
						<th>Total Ulasan </th>
						<th>Detail Ulasan</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($buku as $u) { ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $u['judul'] ?></td>
							<td><?= $u['penulis'] ?></td>
							<td><?= $this->Model->get_total_ulasan($u['buku_id']) ?></td>
							<td>
							<a class="btn btn-sm btn-primary" href="<?= base_url('petugas/detail_ulasanC/' . $u['buku_id']) ?>"><i class="bx bx-comment me-1"></i> </a>
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
															<?php $relasi = $this->Model->get_buku_relasi($u['buku_id']);?>
															<li class="list-group-item d-flex align-items-center">
																<i class="bx bx-box me-2"></i>
																Kategori :
																<ul>
																<?php foreach($relasi as $r){?>
																	<li><?= $r['kategori']?></li>
																<?php }?>
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
						</tr>
					<?php $no++;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php require_once('_footer.php'); ?>
