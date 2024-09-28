<?php require_once('_header.php'); ?>


<div class="card">
	<h5 class="card-header">Data User</h5>
	<div class="card-body">
		<a class="btn btn-sm mb-3 btn-primary" href="<?= base_url('admin/add_userC') ?>"><i class="bx bx-plus me-1"></i> Add User </a>
		<div class="table-responsive text-nowrap">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Email</th>
						<th>Role</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($user as $u) { ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $u['nama'] ?></td>
							<td><?= $u['username'] ?></td>
							<td><?= $u['email'] ?></td>
							<td><?= $u['role'] ?></td>
							<td>
								<?php if ($this->Model->cek_username( $u['username'])->role == 'admin') { ?>
									<a disabled class="btn btn-sm btn-seccondary"><i class="bx bx-trash me-1"></i> </a>
								<?php } else { ?>
									<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data user?')" href="<?= base_url('admin/delete_user/' . $u['user_id']) ?>"><i class="bx bx-trash me-1"></i> </a>
								<?php } ?>
								<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal<?= $u['user_id'] ?>"><i class="bx bx-edit-alt me-1"></i> </button>

							</td>
							<!-- Large Modal -->
							<div class="modal fade" id="largeModal<?= $u['user_id'] ?>" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel3">Edit data user</h5>
											<button
												type="button"
												class="btn-close"
												data-bs-dismiss="modal"
												aria-label="Close"></button>
										</div>
										<form action="<?= base_url('admin/update_user') ?>" method="post">
											<input type="hidden" name="user_id" value="<?= $u['user_id'] ?>">
											<div class="modal-body">
												<div class="row">
													<div class="col mb-3">
														<label for="nameLarge" class="form-label">Nama</label>
														<input type="text" name="nama" value="<?= $u['nama'] ?>" id="nameLarge" class="form-control" placeholder="Enter Name" />
													</div>
												</div>
												<div class="row g-2 mt-2">
													<div class="col mb-0">
														<label for="emailLarge" class="form-label">Email</label>
														<input type="email" name="email" disabled value="<?= $u['email'] ?>" id="emailLarge" class="form-control" placeholder="xxxx@xxx.xx" />
													</div>
													<div class="col mb-0">
														<label class="form-label" for="basic-default-phone">Role</label>
														<select class="form-control" name="role" id="">
															<option class="form-input" <?php if ($u['role'] == 'admin') {
																							echo 'selected';
																						} ?> value="admin">Admin</option>
															<option class="form-input" <?php if ($u['role'] == 'petugas') {
																							echo 'selected';
																						} ?> value="petugas">Petugas</option>
															<option class="form-input" <?php if ($u['role'] == 'peminjam') {
																							echo 'selected';
																						} ?> value="peminjam">Peminjam</option>
														</select>
													</div>
												</div>
												<div class="row g-2 mt-2">
													<div class="col mb-0">
														<label for="nameLarge" class="form-label">Username</label>
														<input type="text" name="username" disabled value="<?= $u['username'] ?>" id="nameLarge" class="form-control" placeholder="Enter Name" />
													</div>
													<div class="col mb-0">
														<label for="nameLarge" class="form-label">Password</label>
														<input type="password" name="password" disabled value="<?= $u['password'] ?>" id="nameLarge" class="form-control" placeholder="Enter Name" />
													</div>
												</div>
												<div class="row">
													<div class="col mb-3">
														<label for="nameLarge" class="form-label">Alamat</label>
														<input type="text" name="alamat" value="<?= $u['alamat'] ?>" id="nameLarge" class="form-control" placeholder="Enter Name" />
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
