<!-- HEADER -->
<header>
	<!-- TOP HEADER -->
	<div id="top-header">
		<div class="container">
			<ul class="header-links pull-left">
				<li><a href="#"><i class="fa fa-phone"></i> +62 857 2071 7798</a></li>
				<li><a href="#"><i class="fa fa-map-marker"></i> Jl Sriwidari No.94 RT/RW 05/02 Kota Sukabumi</a></li>
			</ul>
			<ul class="header-links pull-right">
				<?php if (!$this->session->userdata('username')) : ?>
					<li><a href="<?= base_url('auth') ?>"><i class="fas fa-sign-in-alt"></i> Masuk</a></li>
				<?php else : ?>
					<li><a><i class="fas fa-user"></i> <?= ucfirst($this->session->userdata('username')) ?></a></li>
					<li><a href="<?= base_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
				<?php endif ?>
			</ul>
		</div>
	</div>
	<!-- /TOP HEADER -->

	<!-- MAIN HEADER -->
	<div id="header">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- LOGO -->
				<div class="col-md-6">
					<div class="header-logo">
						<a href="<?= base_url() ?>" class="logo">
							<img src="<?= base_url() ?>assets/img/layout/logo.png" width="200">
						</a>
					</div>
				</div>
				<!-- /LOGO -->

				<!-- ACCOUNT -->
				<div class="col-md-6 clearfix">
					<div class="header-ctn">
						<?php if ($this->session->userdata('username')) : ?>
							<!-- Wishlist -->
							<div>
								<a href="<?= base_url($this->session->userdata('role_id') == 1 ? 'admin' : 'user') ?>">
									<i class="fas fa-user"></i>
									<span>Profil</span>
								</a>
							</div>
							<!-- /Wishlist -->
						<?php endif ?>

						<!-- Menu Toogle -->
						<div class="menu-toggle">
							<a href="#">
								<i class="fa fa-bars"></i>
								<span>Menu</span>
							</a>
						</div>
						<!-- /Menu Toogle -->
					</div>
				</div>
				<!-- /ACCOUNT -->
			</div>
			<!-- row -->
		</div>
		<!-- container -->
	</div>
	<!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
