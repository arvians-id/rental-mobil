<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li class="active"><a href="<?= base_url() ?>">Beranda</a></li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- STORE -->
			<div id="store" class="col-md-12">
				<div class="section-title">
					<h3 class="title">List Mobil Family Rent Car</h3>
				</div>
				<div class="row">
					<!-- store products -->
					<?php foreach ($getAllMobilPagination as $mobil) : ?>
						<!-- product -->
						<div class="col-12 col-sm-6 col-md-4 col-lg-3">
							<div class="product">
								<div class="product-img">
									<img src="<?= base_url() ?>assets/img/mobil/<?= $mobil['photo'] ?>" height="200" alt="">
								</div>
								<div class="product-body">
									<p class="product-category"><?= $mobil['nama_tipe'] ?></p>
									<h3 class="product-name"><a href="<?= base_url('home/detail/') . $mobil['id_mobil'] ?>"><?= $mobil['merek'] ?></a></h3>
									<h4 class="product-price"><?= 'Rp. ' . number_format($mobil['harga'], 0, ',', '.') ?></h4>
									<div class="product-rating">
										<i><?= $mobil['dipinjam'] == null ? 'Tersedia' : 'Tidak Tersedia' ?></i>
									</div>
								</div>
								<div class="add-to-cart">
									<button onclick="location.href='<?= base_url('home/checkout/') . $mobil['id_mobil'] ?>';" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Pesan sekarang</button>
								</div>
							</div>
						</div>
						<!-- /product -->
					<?php endforeach ?>
				</div>
				<!-- /store products -->

				<!-- store bottom filter -->
				<?= $this->pagination->create_links(); ?>
				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
