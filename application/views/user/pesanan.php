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
					<li class="active"><a href="<?= base_url('user/pesanan') ?>">Pesanan</a></li>
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
		<div class="row" style="margin-bottom: 100px; margin:5px">
			<div class="section-title">
				<h3 class="title">Data Pesanan anda</h3>
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
			<div class="alert alert-info" style="margin-bottom:20px" role="alert">
				<strong>Perhatian</strong> <br>
				<hr>
				Halaman ini adalah daftar pesanan anda. Jika anda telah memesan, pastikan anda datang ke Family Rent Car sebelum waktu yang ditentukan. Pesanan baru yang anda lakukan akan kadaluarsa selama 2 jam
				<br><br>
				<strong>*Catatan: Bawa KK/KTP asli ke tempat Rent Family Car</strong>
			</div>
			<table id="myTable" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Mobil</th>
						<th>Status</th>
						<th>Datang Sebelum</th>
						<th>Lama Peminjaman</th>
						<th>Kembalikan Sebelum</th>
						<th>Keterlambatan</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($getPemesananMobil as $mobil) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $mobil['merek'] ?></td>
							<td><?= $mobil['keterangan'] == 'dalam peminjaman' ? '<span class="label label-info">' . $mobil['keterangan'] . '</span>' : $mobil['keterangan'] ?></td>
							<td><?= $mobil['kadaluarsa'] == null ? 'Tidak ada' : date('Y-m-d h:i:s', $mobil['kadaluarsa']) ?></td>
							<td><?= $mobil['jam_pinjam'] == null ? 'Tidak ada' : $mobil['jam_pinjam'] . " Hari" ?></td>
							<td><?= $mobil['created_time'] == null ? 'Tidak ada' : date('Y-m-d h:i:s', $mobil['created_time'] + (60 * 60 * 24 * $mobil['jam_pinjam'])) ?></td>
							<td><?= $mobil['created_time'] == null ? 'Tidak ada' : (time() < $mobil['created_time'] + (60 * 60 * 24 * $mobil['jam_pinjam']) ? 'Tidak Ada' : '<span class="label label-danger">Terlambat</span>') ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
	$(document).ready(function() {
		$('#myTable').DataTable({
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
