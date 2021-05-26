<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-7 col-md-5 align-self-center">
				<h3 class="text-themecolor">Data User</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
					<li class="breadcrumb-item active">User</li>
				</ol>
			</div>
		</div>
		<!-- table responsive -->
		<div class="card shadow-sm">
			<div class="card-body">
				<h4 class="card-title">Data User</h4>
				<hr>
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('success') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>
				<div class="table-responsive">
					<table id="user-table" class="table display table-bordered table-striped no-wrap">
						<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Nama Lengkap</th>
								<th>Email</th>
								<th>Alamat</th>
								<th>Jenis Kelamin</th>
								<th>No Telepon</th>
								<th>NIK</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($getAllUser as $user) : ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $user['username'] ?></td>
									<td><?= $user['nama_lengkap'] == null ? 'notset' : $user['nama_lengkap'] ?></td>
									<td><?= $user['email'] == null ? 'notset' : $user['email'] ?></td>
									<td><?= $user['alamat'] == null ? 'notset' : $user['alamat'] ?></td>
									<td><?= $user['jenis_kelamin'] == null ? 'notset' : ($user['jenis_kelamin'] == 1 ? 'Laki-laki' : 'Perempuan') ?></td>
									<td><?= $user['no_telepon'] == null ? 'notset' : $user['no_telepon'] ?></td>
									<td><?= $user['nik'] == null ? 'notset' : $user['nik'] ?></td>
									<td style="text-align: center;">
										<div class="btn-group" role="group" aria-label="Basic example">
											<a href="<?= base_url('admin/user/') . $user['id'] ?>" class="btn btn-secondary btn-sm">Detail</a>
										</div>
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
		$('#user-table').DataTable({
			"autoWidth": false,
			"responsive": true,
			"columnDefs": [{
					"targets": [-1],
					"orderable": false,
				},
				{
					"targets": [-1],
					"className": "text-center"
				},
			],
		})

		$(document).on('click', '#hapus-user', function(event) {
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
