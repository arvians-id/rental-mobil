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
					<li class="active"><a href="<?= base_url('user') ?>">Profil</a></li>
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
			<div class="col-md-6">
				<form method="post" enctype="multipart/form-data">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
					<!-- Billing Details -->
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">data profil anda</h3>
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
						<div class="alert alert-info" role="alert">Isi profil anda dengan sebaik-baiknya, guna untuk memudahkan pemesanan mobil rental.</div>
						<div class="form-group">
							<label>Username</label> <small class="text-danger">*Tidak dapat diubah</small>
							<input class="input" type="text" value="<?= $cekUser['username'] ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input class="input" type="text" name="nama_lengkap" value="<?= set_value('nama_lengkap', $cekUser['nama_lengkap']) ?>" placeholder="nama lengkap">
							<small class="text-danger"><?= form_error('nama_lengkap') ?></small>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input class="input" type="text" name="email" value="<?= set_value('email', $cekUser['email']) ?>" placeholder="example@example.com">
							<small class="text-danger"><?= form_error('email') ?></small>
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="input" name="jenis_kelamin">
								<option value="" selected disabled>Pilih</option>
								<option value="1" <?= set_value('jenis_kelamin', $cekUser['jenis_kelamin']) != 1 ?: 'selected' ?>>Laki-laki</option>
								<option value="2" <?= set_value('jenis_kelamin', $cekUser['jenis_kelamin']) != 2 ?: 'selected'  ?>>Perempuan</option>
							</select>
							<small class="text-danger"><?= form_error('jenis_kelamin') ?></small>
						</div>
						<div class="form-group">
							<label>No Telepon</label>
							<input class="input" type="text" name="no_telepon" value="<?= set_value('no_telepon', $cekUser['no_telepon']) ?>" placeholder="diawali dengan 0">
							<small class="text-danger"><?= form_error('no_telepon') ?></small>
						</div>
						<div class="form-group">
							<label>NIK</label>
							<input class="input" type="text" name="nik" value="<?= set_value('nik', $cekUser['nik']) ?>" placeholder="nomor nik pada ktp">
							<small class="text-danger"><?= form_error('nik') ?></small>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="input" type="text" name="alamat"><?= set_value('alamat', $cekUser['alamat']) ?></textarea>
							<small class="text-danger"><?= form_error('alamat') ?></small>
						</div>
						<div class="form-group">
							<label>KTP/KK Peminjam</label>
							<input type="file" name="u_peminjam" placeholder="upload photo kk/ktp peminjam">
							<small class="text-primary">Photo harus jelas dan tidak blur</small>
						</div>
						<div class="form-group">
							<label>KTP/KK Penjamin</label>
							<input type="file" name="u_penjamin" value="<?= set_value('u_penjamin', $cekUser['u_penjamin']) ?>" placeholder="upload photo kk/ktp penjamin">
							<small class="text-primary">Photo harus jelas dan tidak blur</small>
						</div>
						<div class="form-group">
							<button class="btn btn-danger">Simpan</button>
						</div>
					</div>
					<!-- /Billing Details -->
				</form>
			</div>
			<div class="col-md-6">
				<!-- Billing Details -->
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">data profil anda</h3>
					</div>
					<table class="table">
						<tbody>
							<tr>
								<td>Username</td>
								<td>:</td>
								<td><?= ucfirst($cekUser['username']) ?></td>
							</tr>
							<tr>
								<td>Nama Lengkap</td>
								<td>:</td>
								<td><?= ucwords($cekUser['nama_lengkap']) ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><?= $cekUser['email'] ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>:</td>
								<td><?= $cekUser['jenis_kelamin'] == 1 ? 'Laki-laki' : 'Perempuan' ?></td>
							</tr>
							<tr>
								<td>No Telepon</td>
								<td>:</td>
								<td><?= $cekUser['no_telepon'] ?></td>
							</tr>
							<tr>
								<td>NIK</td>
								<td>:</td>
								<td><?= $cekUser['nik'] ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td><?= $cekUser['alamat'] ?></td>
							</tr>
							<tr>
								<td>KTP/KK Peminjam</td>
								<td>:</td>
								<td><?= $cekUser['u_peminjam'] ? 'Sudah terisi' : 'Tidak ditemukan' ?></td>
							</tr>
							<tr>
								<td>KTP/KK Penjamin</td>
								<td>:</td>
								<td><?= $cekUser['u_penjamin'] ? 'Sudah terisi' : 'Tidak ditemukan' ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- /Billing Details -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
