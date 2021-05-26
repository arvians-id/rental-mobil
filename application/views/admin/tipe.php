<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-7 col-md-5 align-self-center">
				<h3 class="text-themecolor">Data Tipe Mobil</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
					<li class="breadcrumb-item active">Tipe</li>
				</ol>
			</div>
		</div>
		<!-- row -->
		<div class="card shadow-sm">
			<div class="card-body">
				<h4 class="card-title">Buat Tipe Mobil</h4>
				<hr>
				<div class="row justify-content-center">
					<div class="col-12 col-lg-8">
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
						<form method="post">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
							<div class="form-group">
								<label>Kode Tipe Mobil</label><span class="text-danger"> *</span>
								<input type="text" class="form-control <?= form_error('kode_tipe') ? 'is-invalid' : '' ?>" name="kode_tipe" value="<?= set_value('kode_tipe') ?>">
								<div class="invalid-feedback"><?= form_error('kode_tipe') ?></div>
							</div>
							<div class="form-group">
								<label>Nama Tipe</label><span class="text-danger"> *</span>
								<input type="text" class="form-control <?= form_error('nama_tipe') ? 'is-invalid' : '' ?>" name="nama_tipe" value="<?= set_value('nama_tipe') ?>">
								<div class="invalid-feedback"><?= form_error('nama_tipe') ?></div>
							</div>
							<button type="submit" class="btn btn-primary">Buat</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- row -->
		<!-- table responsive -->
		<div class="card shadow-sm">
			<div class="card-body">
				<h4 class="card-title">Data Tipe Mobil</h4>
				<hr>
				<div class="table-responsive">
					<table id="tipe-table" class="table display table-bordered table-striped no-wrap">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Tipe</th>
								<th>Nama Tipe</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($getAllTipe as $tipe) : ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $tipe['kode_tipe'] ?></td>
									<td><?= $tipe['nama_tipe'] ?></td>
									<td style="text-align: center;">
										<a href="<?= base_url('admin/destroy_tipe/') . $tipe['id_tipe'] ?>" id="hapus-tipe" class="btn btn-secondary btn-sm">Hapus</a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/jquery/jquery.min.js"></script>
<script>
	$(function() {
		$('#tipe-table').DataTable({
			"autoWidth": false,
			"responsive": true,
			"columnDefs": [{
				"targets": [-1],
				"className": "text-center",
				"orderable": false,
			}, ],
		})

		$(document).on('click', '#hapus-tipe', function(event) {
			event.preventDefault();
			let href = $(this).attr('href');
			Swal.fire({
				title: 'Perhatian!',
				text: 'Yakin ingin menghapus?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#1d96c3',
				cancelButtonColor: '#ff5c6c',
				confirmButtonText: 'Ya, Hapus!'
			}).then((result) => {
				if (result.value) {
					document.location.href = href;
				}
			})
		})
	})
</script>
