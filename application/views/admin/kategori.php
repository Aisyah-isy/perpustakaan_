<?php require_once('_header.php'); ?>


<div class="card">
	<h5 class="card-header">Data kategori</h5>
	<div class="card-body">
		<form action="<?= base_url('admin/add_kategori') ?>" method="post">
			<div class="row mb-3">
			<label class="form-label">Kategori</label>
				<div class="col-10 text-start">
					<input required type="text" name="kategori" class="form-control" placeholder="Masukkan Kategori" />
				</div>
				<div class="col-2 d-flex text-end ">
					<button class="btn btn-primary" type="submit">Save</button>
				</div>
			</div>
		</form>
		<div class="table-responsive text-nowrap">
			<h5>Data Kategori</h5>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Kategori</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($kategori as $u) { ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $u['kategori'] ?></td>
							<td>
								<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal<?= $u['kategori_id'] ?>"><i class="bx bx-edit-alt me-1"></i> </button>
								<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data kategori?')" href="<?= base_url('admin/delete_kategori/' . $u['kategori_id']) ?>"><i class="bx bx-trash me-1"></i> </a>
							</td>
							<!-- Large Modal -->
							<div class="modal fade" id="largeModal<?= $u['kategori_id'] ?>" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel3">Edit data kategori</h5>
											<button
												type="button"
												class="btn-close"
												data-bs-dismiss="modal"
												aria-label="Close"></button>
										</div>
										<form action="<?= base_url('admin/update_kategori') ?>" method="post">
											<input type="hidden" name="kategori_id" value="<?= $u['kategori_id'] ?>">
											<div class="modal-body">
												<div class="row">
													<div class="col mb-3">
														<label for="nameLarge" class="form-label">Nama</label>
														<input type="text" name="kategori" value="<?= $u['kategori'] ?>" id="nameLarge" class="form-control" placeholder="Enter Name" />
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
						</tr>
					<?php $no++;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php require_once('_footer.php'); ?>
