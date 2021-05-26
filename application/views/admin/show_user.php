<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h3 class="text-themecolor">Profil</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
					<li class="breadcrumb-item active">Profil User</li>
				</ol>
			</div>
		</div>
		<!-- Row -->
		<div class="row">
			<!-- Column -->
			<div class="col-lg-4 col-xlg-3 col-md-5">
				<div class="card">
					<div class="card-body">
						<center class="m-t-30">
							<h4 class="card-title m-t-10"><?= ucfirst($getUserById['username']) ?></h4>
							<h6 class="card-subtitle"><?= $getUserById['email'] == null ? 'notset' : $getUserById['email'] ?></h6>
						</center>
					</div>
				</div>
			</div>
			<!-- Column -->
			<!-- Column -->
			<div class="col-lg-8 col-xlg-9 col-md-7">
				<div class="card">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs profile-tab" role="tablist">
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<!--second tab-->
						<div class="tab-pane active" id="profile" role="tabpanel">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3 col-xs-6 b-r"> <strong>Nama Lengkap</strong>
										<br>
										<p class="text-muted"><?= $getUserById['nama_lengkap'] == null ? 'notset' : $getUserById['nama_lengkap'] ?></p>
									</div>
									<div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
										<br>
										<p class="text-muted"><?= $getUserById['email'] == null ? 'notset' : $getUserById['email'] ?></p>
									</div>
									<div class="col-md-3 col-xs-6 b-r"> <strong>Alamat</strong>
										<br>
										<p class="text-muted"><?= $getUserById['alamat'] == null ? 'notset' : $getUserById['alamat'] ?></p>
									</div>
									<div class="col-md-3 col-xs-6"> <strong>Jenis Kelamin</strong>
										<br>
										<p class="text-muted"><?= $getUserById['jenis_kelamin'] == null ? 'notset' : ($getUserById['jenis_kelamin'] == 1 ? 'Laki-laki' : 'Perempuan') ?></p>
									</div>
									<div class="col-md-3 col-xs-6"> <strong>No Telepon</strong>
										<br>
										<p class="text-muted"><?= $getUserById['no_telepon'] == null ? 'notset' : $getUserById['no_telepon'] ?></p>
									</div>
									<div class="col-md-3 col-xs-6"> <strong>NIK</strong>
										<br>
										<p class="text-muted"><?= $getUserById['nik'] == null ? 'notset' : $getUserById['nik'] ?></p>
									</div>
									<div class="col-md-3 col-xs-6"> <strong>KTP/KK Peminjam</strong>
										<br>
										<p class="text-muted"><button class="btn btn-secondary btn-sm" onclick="lihatKTPKK('<?= $getUserById['u_peminjam'] ?>')">Lihat</button></p>
									</div>
									<div class="col-md-3 col-xs-6"> <strong>KTP/KK Penjamin</strong>
										<br>
										<p class="text-muted"><button class="btn btn-secondary btn-sm" onclick="lihatKTPKK('<?= $getUserById['u_penjamin'] ?>')">Lihat</button></p>
									</div>
									<div class="col-md-3 col-xs-6"> <strong>Dibuat</strong>
										<br>
										<p class="text-muted"><?= $getUserById['created_at'] ?></p>
									</div>
									<div class="col-md-3 col-xs-6"> <strong>Terakhir diubah</strong>
										<br>
										<p class="text-muted"><?= $getUserById['updated_at'] ?></p>
									</div>
								</div>
								<hr>
								<!-- .row -->
								<h3>Riwayat Pemesanan User</h3>
								<hr>
								<div class="row">
									<?php foreach ($getMobilUserTransaksi as $transaksiUser) : ?>
										<!-- .col -->
										<div class="col-md-6 col-lg-6 col-xlg-4">
											<div class="card card-body shadow-sm">
												<div class="row">
													<div class="col-md-4 col-lg-3 text-center">
														<a href="<?= base_url('admin/mobil/') . $transaksiUser['mobil_id'] ?>"><img src="<?= base_url() ?>assets/img/mobil/<?= $transaksiUser['photo'] ?>" alt="user" class="img-circle img-responsive"></a>
													</div>
													<div class="col-md-8 col-lg-9">
														<h3 class="box-title m-b-0"><?= $transaksiUser['merek'] ?></h3> <small><?= $transaksiUser['nama_tipe'] ?></small>
														<address>
															Tanggal Pemesanan : <?= $transaksiUser['tanggal_submit'] ?>
															<br />
															Tanggal Dikembalikan : <?= $transaksiUser['created_time'] == null ? 'Belum ada' : date('Y-m-d h:i:s', $transaksiUser['created_time']) ?>
															<br />
															<br />
															Status : <?= $transaksiUser['keterangan'] ?>
														</address>
													</div>
												</div>
											</div>
										</div>
										<!-- /.col -->
									<?php endforeach ?>
								</div>
								<!-- /.row -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
		<!-- Row -->
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Lihat KTP/KK</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img src="photoKTPKK" id="show" alt="photo" class="img-responsive">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
	function lihatKTPKK(data) {
		$('#exampleModal').modal('show')
		const photo = '<?= base_url() ?>assets/img/uploads/' + data
		$('#show').attr('src', photo)
	}
</script>
