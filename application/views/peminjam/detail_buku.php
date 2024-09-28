  <?php require_once('_header.php'); ?>

  <!--================Single Product Area =================-->
  <div class="product_image_area section_padding">
  	<div class="container">
  		<div id="done">
  			<?= $this->session->flashdata('alert', true) ?>
  		</div>
  		<div class="row s_product_inner justify-content-between">
  			<div class="col-lg-7 col-xl-7">
  				<div class="product_slider_img">
  					<div id="vertical">
  						<div data-thumb="<?= base_url('assets/uploads/') . $detail->cover; ?>">
  							<img src="<?= base_url('assets/uploads/') . $detail->cover; ?>" />
  						</div>
  					</div>
  				</div>
  			</div>
  			<div class="col-lg-5 col-xl-4">
  				<div class="s_product_text">
  					<h5>Detail buku <?= $detail->judul; ?></h5>
  					<h3><?= $detail->judul; ?></h3>
  					<ul class="list">
  						<li>
  							<a> <span>Penulis</span> : <?= $detail->penulis; ?></a>
  						</li>
  						<li>
  							<a> <span>Penerbit</span> : <?= $detail->penerbit; ?></a>
  						</li>
  						<li>
  							<a> <span>Tahun terbit</span> : <?= $detail->tahun_terbit; ?></a>
  						</li>
  						<li>
  							<a>
  								<span>Kategori</span> : <?php foreach ($relasi as $r) { ?>
  									<?= $r['kategori'] ?>,
  								<?php } ?>
  							</a>
  						</li>
  						<li>
  							<a> <span>Stok</span> : <?= $detail->stok; ?></a>
  						</li>
  					</ul>
  					<p>
  						Lebih banyak sinopsis di bawah!
  					</p>
  					<div class="card_area d-flex justify-content-between align-items-center">
  						<?php if ($this->Model->isDipesan($detail->buku_id) == NULL) { ?>
  							<a onclick="return confirm('Pinjam buku <?= $detail->judul ?>?')" href="<?= base_url('peminjam/pinjam/' . $detail->buku_id) ?>" class="btn_3">+ pinjam</i></a>
  						<?php } elseif ($this->Model->isDipesan($detail->buku_id) != NULL) { ?>
  							<a class="btn_3">Dalam pengajuan</a>
  						<?php } elseif ($this->Model->isPinjam($detail->buku_id) == true) { ?>
  							<a class="btn_3">Dipinjam</a>
  						<?php } ?>
  						<?php if ($this->Model->cek_koleksi($this->session->userdata('user_id'), $detail->buku_id) == NULL) { ?>
  							<a onclick="return confirm('Tambahkan buku <?= $detail->judul ?> ke favoritemu?')" href="<?= base_url('peminjam/add_koleksi/' . $detail->buku_id) ?>" class="btn_3"><i class="ti-heart"></i></a>
  						<?php } else if ($this->Model->cek_koleksi($this->session->userdata('user_id'), $detail->buku_id) != NULL) { ?>
  							<a class=""><i class="ti-check"></i></a>
  						<?php } ?>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
  <!--================End Single Product Area =================-->

  <!--================Product Description Area =================-->
  <section class="product_description_area">
  	<div class="container">
  		<ul class="nav nav-tabs" id="myTab" role="tablist">
  			<li class="nav-item">
  				<a class="nav-link " id="home-tab" data-toggle="tab" href="#Sinopsis" role="tab" aria-controls="home"
  					aria-selected="true">Sinopsis</a>
  			</li>
  			<li class="nav-item">
  				<a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
  					aria-selected="false">Komentar</a>
  			</li>
  		</ul>
  		<div class="tab-content" id="myTabContent">
  			<div class="tab-pane fade" id="Sinopsis" role="tabpanel" aria-labelledby="home-tab">
  				<p>
  					<span>Sinopsis</span> : <?= $detail->sinopsis; ?>
  				</p>
  			</div>
  			<div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  				<div class="row">
  					<div class="col-lg-6">
  						<div class="comment_list">
  							<?php foreach ($ulasan as $u) { ?>
  								<div class="review_item">
  									<div class="media">
  										<div class="media-body">
  											<h4><?= $u['nama'] ?></h4>
  											<h5><?= $u['tgl'] ?></h5>
  											<?php $rate = $this->Model->rating($u['buku_id']);
												if ($rate == true) { ?>
  												<h5>Rate : <?= $rate; ?> / 5.00</h5>
  											<?php } else { ?>
  												<h5>Rate : - </h5>
  											<?php } ?>
  											<?php if ($this->Model->cek_ulasan($u['ulasan_id']) == true) { ?>
  												<a onclick="return confirm('Hapus komentar ini?')" class="reply_btn" href="<?= base_url('peminjam/delete_ulasan/' . $u['ulasan_id'] . '/' . $u['buku_id']) ?>">Delete</a>
  											<?php } ?>
  										</div>
  									</div>
  									<p>
  										<?= $u['ulasan'] ?>
  									</p>
  								</div>
  							<?php } ?>
  						</div>
  					</div>
  					<div class="col-lg-6">
  						<div class="">
  							<!-- <?php if ($this->Model->cek_ulasan_buku($detail->buku_id) == NULL) { ?> -->
  							<h4>Post your comment</h4>
  							<form action="<?= base_url('peminjam/add_ulasan') ?>" method="post">
  								<input req type="hidden" name="buku_id" value="<?= $detail->buku_id; ?>">
  								<div class="col-md-12">
  									<div class="form-group">
  										<div class="list-group">
  											<label class="list-group-item">
  												<input required class=" me-1" name="rating" type="radio" value="5">
  												5 - Sangat Recomended
  											</label>
  											<label class="list-group-item">
  												<input required class=" me-1" name="rating" type="radio" value="4">
  												4 - Sangat Menarik
  											</label>
  											<label class="list-group-item">
  												<input required class=" me-1" name="rating" type="radio" value="3">
  												3 - Lumayan Menarik
  											</label>
  											<label class="list-group-item">
  												<input required class=" me-1" name="rating" type="radio" value="2">
  												2 - Menarik
  											</label>
  											<label class="list-group-item">
  												<input required class=" me-1" name="rating" type="radio" value="1">
  												1 - Opsional
  											</label>
  										</div>
  									</div>
  								</div>
  								<div class="col-md-12">
  									<div class="form-group">
  										<textarea required class="form-control" name="ulasan" id="message" rows="1"
  											placeholder="Komentar"></textarea>
  									</div>
  								</div>
  								<div class="col-md-12 text-right">
  									<button type="submit" value="submit" class="btn_3">
  										Submit Now
  									</button>
  								</div>
  							</form>
  							<!-- <?php } ?> -->
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </section>
  <!--================End Product Description Area =================-->



  <?php require_once('_footer.php'); ?>
