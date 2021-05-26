<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h3 class="text-themecolor">Edit Data Mobil</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
					<li class="breadcrumb-item active">Edit Data Mobil</li>
				</ol>
			</div>
		</div>
		<div class="card shadow-sm">
			<div class="card-body">
				<h4 class="card-title">Edit Data Mobil</h4>
				<hr>
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('success') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php elseif ($this->session->flashdata('error')) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('error') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>
				<form method="post" enctype="multipart/form-data">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
					<div class="row justify-content-center">
						<div class="col-12 col-lg-6">
							<div class="form-group">
								<label>Tipe Mobil</label><span class="text-danger"> *</span>
								<select class="custom-select col-12 <?= form_error('tipe_id') ? 'is-invalid' : '' ?>" name="tipe_id">
									<option selected disabled>Pilih...</option>
									<?php foreach ($getAllTipe as $tipe) : ?>
										<option value="<?= $tipe['id_tipe'] ?>" <?= $tipe['id_tipe'] == $getMobilById['tipe_id'] ? 'selected' : '' ?>><?= $tipe['kode_tipe'] . ' - ' . $tipe['nama_tipe'] ?></option>
									<?php endforeach ?>
								</select>
								<div class="invalid-feedback"><?= form_error('tipe_id') ?></div>
							</div>
							<div class="form-group">
								<label>Merek</label>
								<input type="text" class="form-control <?= form_error('merek') ? 'is-invalid' : '' ?>" name="merek" value="<?= set_value('merek', $getMobilById['merek']) ?>">
								<div class="invalid-feedback"><?= form_error('merek') ?></div>
							</div>
							<div class="form-group">
								<label>No Plat</label>
								<input type="text" class="form-control <?= form_error('no_plat') ? 'is-invalid' : '' ?>" name="no_plat" value="<?= set_value('no_plat', $getMobilById['no_plat']) ?>">
								<div class="invalid-feedback"><?= form_error('no_plat') ?></div>
							</div>
							<div class="form-group">
								<label>Warna</label>
								<input type="text" class="form-control <?= form_error('warna') ? 'is-invalid' : '' ?>" name="warna" value="<?= set_value('warna', $getMobilById['warna']) ?>">
								<div class="invalid-feedback"><?= form_error('warna') ?></div>
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea type="text" class="form-control <?= form_error('deskripsi') ? 'is-invalid' : '' ?>" name="deskripsi"><?= set_value('deskripsi', $getMobilById['deskripsi']) ?></textarea>
								<div class="invalid-feedback"><?= form_error('deskripsi') ?></div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="form-group">
								<label>Tahun</label>
								<input type="text" class="form-control <?= form_error('tahun') ? 'is-invalid' : '' ?>" name="tahun" value="<?= set_value('tahun', $getMobilById['tahun']) ?>">
								<div class="invalid-feedback"><?= form_error('tahun') ?></div>
							</div>
							<div class="form-group">
								<label>Harga</label>
								<input type="text" class="form-control <?= form_error('harga') ? 'is-invalid' : '' ?>" name="harga" value="<?= set_value('harga', $getMobilById['harga']) ?>" placeholder="contoh: 20000">
								<div class="invalid-feedback"><?= form_error('harga') ?></div>
							</div>
							<div class="form-group">
								<label>Photo</label>
								<input type="file" class="form-control" name="photo" value="<?= set_value('photo') ?>">
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<img src="<?= base_url() ?>/assets/img/mobil/<?= $getMobilById['photo'] ?>" class="img-thumbnail mt-3 col-lg-4 col-sm-12" id="img-mobil" width="200" alt="">
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	const inputPhoto = document.querySelector('[name="photo"]');
	inputPhoto.addEventListener('change', function(event) {
		let file = event.target.files[0];
		if (file) {
			let src = URL.createObjectURL(file);
			let preview = document.querySelector('#img-mobil');
			preview.setAttribute('src', src);
			preview.style.display = 'block';
		}
	})
</script>
