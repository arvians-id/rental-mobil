<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="<?= base_url() ?>">Beranda</a></li>
					<li class="active"><a href="" <?= base_url() ?>">Masuk</a></li>
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
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<form method="post">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
					<h3 class="box-title m-b-20">Masuk</h3>
					<small>Belum punya akun? <a href="<?= base_url('auth/registrasi') ?>">Daftar</a> </small>
					<hr>
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success mt-2" role="alert">
							<?= $this->session->flashdata('success'); ?>
						</div>
					<?php elseif ($this->session->flashdata('error')) : ?>
						<div class="alert alert-danger mt-2" role="alert">
							<?= $this->session->flashdata('error'); ?>
						</div>
					<?php endif; ?>
					<div class="form-group">
						<label>Username</label>
						<input class="form-control" value="<?= set_value('username') ?>" name="username" type="text" placeholder="Masukkan username anda">
						<small class="text-danger"><?= form_error('username') ?></small>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input class="form-control" name="password" type="password" placeholder="Masukkan password anda">
						<small class="text-danger"><?= form_error('password') ?></small>
						<small type="button" id="showPassword" style="cursor: pointer">Lihat Password</small>
					</div>
					<div class="form-group text-center">
						<button class="btn btn-block btn-md btn-danger" type="submit">Masuk</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<script>
	const inputPassword = document.querySelector('[name="password"]');
	// Show Hide Password
	const resetPassword = () => {
		inputPassword.setAttribute('type', 'password');
		document.querySelector('#showPassword').innerHTML = 'Lihat Password';
	}
	const showPassword = (show, idPassword) => {
		if (idPassword.getAttribute('type') == 'password') {
			idPassword.setAttribute('type', 'text');
			show.innerHTML = 'Tutup Password';
		} else {
			idPassword.setAttribute('type', 'password');
			show.innerHTML = 'Lihat Password';
		}
	}
	document.querySelector('#showPassword').addEventListener('click', function() {
		showPassword(this, inputPassword);
	})
</script>
