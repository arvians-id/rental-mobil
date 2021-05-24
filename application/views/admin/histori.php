<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-7 col-md-5 align-self-center">
				<h3 class="text-themecolor">Riwayat</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
					<li class="breadcrumb-item active">Riwayat</li>
				</ol>
			</div>
		</div>
		<!-- table responsive -->
		<div class="card shadow-sm">
			<div class="card-body">
				<h4 class="card-title">Riwayat Peminjaman Selesai</h4>
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
				<div class="table-responsive">
					<table id="peminjaman-table" class="table display table-bordered table-striped no-wrap">
						<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Nama Lengkap</th>
								<th>Nama Tipe</th>
								<th>Merek Mobil</th>
								<th>Lama Pinjam</th>
								<th>Disetujui pada</th>
								<th>Dikembalikan pada</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($getAllHistori as $persetujuan) : ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $persetujuan['username'] ?></td>
									<td><?= $persetujuan['nama_lengkap'] ?></td>
									<td><?= $persetujuan['nama_tipe'] ?></td>
									<td><?= $persetujuan['merek'] ?></td>
									<td><?= $persetujuan['jam_pinjam'] ?> Hari</td>
									<td><?= $persetujuan['disetujui'] ?></td>
									<td><?= $persetujuan['tanggal_selesai'] ?></td>
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
		$('#peminjaman-table').DataTable({
			"autoWidth": false,
			"responsive": true,
			"columnDefs": [{
				"targets": [-1, -2],
				"className": "text-center",
				"orderable": false,
			}, ],
		})
	})
</script>
