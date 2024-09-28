<?php require_once('_header.php'); ?>

<div class="card mb-4">
	<div class="card-header justify-content-between align-items-center">
		<div class="row">
			<div class="col-6 text-start">
				<h5 class="mb-0">Tambah Buku</h5>
				<small class="text-muted float-end">Pastikan data yang dimasukkan benar</small>
			</div>
			<div class="col-6 text-end">
				<a class="btn btn-sm mb-3 btn-success" href="<?= base_url('admin/buku') ?>"><i class="bx bx-back me-1"></i> Kembali </a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<form action="<?= base_url('admin/add_buku') ?>" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="mb-0">
					<label class="form-label" for="basic-default-fullname">Judul</label>
					<input required type="text" class="form-control" id="basic-default-fullname" name="judul" placeholder="Judul Buku">
				</div>
			</div>
			<div class="row g-2 mt-2">
				<div class="col mb-0">
					<label for="nameLarge" class="form-label">Penulis</label>
					<input required type="text" name="penulis" id="nameLarge" class="form-control" placeholder="Penulis" />
				</div>
				<div class="col mb-0">
					<label for="nameLarge" class="form-label">Penerbit</label>
					<input required type="text" name="penerbit" id="nameLarge" class="form-control" placeholder="Penerbit" />
				</div>
			</div>
			<div class="row g-2 mt-2">
				<?php $kategori = $this->Model->get_kategori(); ?>
				<div class="col mb-0">
					<label for="nameLarge" class="form-label">Kategori</label>
					<select required class="form-control" name="kategori_id[]" id="" multiple>
						<?php foreach ($kategori as $k) { ?>
							<option class="form-control" value="<?= $k['kategori_id'] ?>"><?= $k['kategori'] ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col mb-0">
					<label for="nameLarge" class="form-label">Tahun Terbit</label>
					<input required type="number" name="tahun_terbit" id="nameLarge" min="1900"  class="form-control" placeholder="Tahun Terbit" />
				</div>
			</div>
			<div class="row g-2 mt-2">
				<div class="col mb-0">
					<label for="nameLarge" class="form-label">Cover</label>
					<input required type="file" accept="image/jpg, image/png, image/jpeg" name="cover" id="nameLarge" class="form-control" placeholder="Cover" />
				</div>
				<div class="col mb-0">
					<label for="nameLarge" class="form-label">Stok</label>
					<input required type="number" name="stok" min="1" id="nameLarge" class="form-control" placeholder="Stok" />
				</div>
			</div>
			<div class="row">
				<div class="mb-0">
					<label class="form-label" for="basic-default-fullname">Sinopsis</label>
					<textarea required type="text" class="form-control" id="basic-default-fullname" name="sinopsis" placeholder="Sinopsis"></textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-primary mt-3">Save</button>
		</form>
	</div>
</div>


<?php require_once('_footer.php'); ?>
<!-- Atur Tambah Buku -->
