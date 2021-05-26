<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="<?= base_url() ?>">Beranda</a></li>
					<li><a href="<?= base_url('user') ?>">User</a></li>
					<li class="active"><a href="<?= base_url('user/password') ?>">Password</a></li>
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
			<form method="post">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
				<div class="col-md-7">
					<!-- Billing Details -->
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">ubah password</h3>
						</div>
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
							<label>Password Saat Ini</label>
							<input class="input" name="cpassword" type="password" placeholder="Masukkan password anda saat ini">
							<small class="text-danger"><?= form_error('cpassword') ?></small>
						</div>
						<div class="form-group">
							<label>Password Baru</label>
							<input class="input" name="password" type="password" placeholder="Masukkan password baru anda">
							<small class="text-danger"><?= form_error('password') ?></small>
							<small type="button" id="showPassword" style="cursor: pointer">Lihat Password</small>
						</div>
						<div class="form-group">
							<label>Ulangi Password Baru</label>
							<input class="input" name="rpassword" type="password" placeholder="Masukkan ulang password baru anda">
							<small class="text-danger"><?= form_error('rpassword') ?></small>
							<small type="button" id="showRepeatPassword" style="cursor: pointer">Lihat Password</small>
						</div>
						<div class="form-group">
							<button class="btn btn-danger">Simpan</button>
						</div>
					</div>
					<!-- /Billing Details -->
				</div>
			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<script>
	const idShowPassword = document.querySelector('#showPassword');
	const idShowRPassword = document.querySelector('#showRepeatPassword');
	const inputPassword = document.querySelector('[name="password"]');
	const inputRPassword = document.querySelector('[name="rpassword"]');

	// Show Hide Password
	const resetPassword = () => {
		inputPassword.setAttribute('type', 'password');
		idShowPassword.innerHTML = 'Lihat Password';
		inputRPassword.setAttribute('type', 'password');
		idShowRPassword.innerHTML = 'Lihat Password';
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
	idShowPassword.addEventListener('click', function() {
		showPassword(this, inputPassword);
	})
	idShowRPassword.addEventListener('click', function() {
		showPassword(this, inputRPassword);
	})
</script>
