<?php require_once('_header.php'); ?>
<div id="done">
	<?= $this->session->flashdata('alert', true) ?>
</div>
<div class="card mb-4">
	<div class="card-header justify-content-between align-items-center">
		<div class="row">
			<div class="col-6 text-start">
				<h5 class="mb-0">Tambah User</h5>
				<small class="text-muted float-end">Pastikan data yang dimasukkan benar</small>
			</div>
			<div class="col-6 text-end">
				<a class="btn btn-sm mb-3 btn-success" href="<?= base_url('admin/user') ?>"><i class="bx bx-back me-1"></i> Kembali </a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<form action="<?= base_url('admin/add_user') ?>" method="post">
			<div class="mb-3">
				<label class="form-label" for="basic-default-fullname">Nama</label>
				<input required type="text" class="form-control" id="basic-default-fullname" name="nama" placeholder="John Doe">
			</div>
			<div class="mb-3">
				<label class="form-label" for="basic-default-email">Email</label>
				<div class="input-group input-group-merge">
					<input required type="text" id="basic-default-email" class="form-control" name="email" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2">
					<span class="input-group-text" id="basic-default-email2">@example.com</span>
				</div>
				<div class="form-text">You can use letters, numbers &amp; periods</div>
			</div>
			<div class="mb-3">
				<label class="form-label" for="basic-default-fullname">Username</label>
				<input required type="text" name="username" class="form-control" id="basic-default-fullname" placeholder="Username">
			</div>
			<div class="mb-3">
				<label class="form-label" for="basic-default-fullname">Password</label>
				<input required type="password" name="password" class="form-control" id="basic-default-fullname" placeholder="****">
			</div>
			<div class="mb-3">
				<label class="form-label" for="basic-default-phone">Role</label>
				<select class="form-control" name="role" id="">
					<option class="form-input" value="admin">Admin</option>
					<option class="form-input" value="petugas">Petugas</option>
					<option class="form-input" value="peminjam">Peminjam</option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label" for="basic-default-message">Alamat</label>
				<textarea required name="alamat" id="basic-default-message" class="form-control" placeholder="Alamat"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Save</button>
		</form>
	</div>
</div>


<?php require_once('_footer.php'); ?>
