<?php require_once('_header.php'); ?>

<div class="card">
	<img class="card-img-top" src="<?= base_url('assets/uploads/') . $detail->cover; ?>" alt="Card image cap">
	<div class="card-body">
		<style>
			.card-text {
				white-space: normal;
			}
		</style>
		<h5 class="card-title"> Judul : <?= $detail->judul; ?></h5>
		<ul class="list-group">
			<li class="list-group-item d-flex align-items-center">
				<i class="bx bx-pen me-2"></i>
				Penulis : <?= $detail->penulis; ?>
			</li>
			<li class="list-group-item d-flex align-items-center">
				<i class="bx bx-bell me-2"></i>
				Penerbit : <?= $detail->penerbit; ?>
			</li>
			<li class="list-group-item d-flex align-items-center">
				<i class="bx bx-table me-2"></i>
				Tahun Terbit : <?= $detail->tahun_terbit; ?>
			</li>
			<li class="list-group-item d-flex align-items-center">
				<i class="bx bx-package me-2"></i>
				Stok : <?= $detail->stok; ?>
			</li>
			<?php $relasi = $this->Model->get_buku_relasi($detail->buku_id); ?>
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
					Sinopsis : <?= $detail->sinopsis; ?>
				</p>
			</li>
		</ul>
	</div>
	<div class="card-footer">
		<?php foreach ($ulasan as $u) { ?>
			<div class="card alert-secondary">
				<div class="card-body">
					<div class="row">
						<div class="col-10 text-start">
							<h5 class="card-title"><?= $u['username'] ?></h5>
							<span>Rating : <?= $u['rating'] ?> / 5</span>
						</div>
						<div class="col-2 text-end">
							<a class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus komentar ini?')" href="<?= base_url('petugas/delete_ulasan/' . $u['ulasan_id'].'/' . $u['buku_id']) ?>"><i class="bx bx-trash me-1"></i> </a>
						</div>
					</div>
					<p class="card-text">
						<?= $u['ulasan'] ?>
					</p>
					<p class="card-text"><small class="text-muted"><?= $u['tgl'] ?></small></p>
				</div>
			</div>
		<?php } ?>
	</div>
</div>


<?php require_once('_footer.php'); ?>
