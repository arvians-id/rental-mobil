<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-7 col-md-5 align-self-center">
                <h3 class="text-themecolor">Pesetujuan Rental</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
                    <li class="breadcrumb-item active">Persetujuan</li>
                </ol>
            </div>
        </div>
        <!-- table responsive -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Pesetujuan Rental</h4>
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
                    <table id="persetujuan-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Nama Tipe</th>
                                <th>Merek Mobil</th>
                                <th>Kadaluarsa</th>
                                <th>Persetujuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($getAllPersetujuan as $persetujuan) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $persetujuan['username'] ?></td>
                                    <td><?= $persetujuan['nama_lengkap'] ?></td>
                                    <td><?= $persetujuan['nama_tipe'] ?></td>
                                    <td><?= $persetujuan['merek'] ?></td>
                                    <td><?= $persetujuan['kadaluarsa'] < time() + (60 * 60 * 2) ? 'Kadaluarsa' : 'Aktif' ?></td>
                                    <td style="text-align: center;">
                                        <?php if ($persetujuan['kadaluarsa'] < time()) : ?>
                                            <a href="<?= base_url('admin/destroy_persetujuan/') . $persetujuan['id_tr'] ?>" id="hapus-persetujuan" class="btn btn-secondary btn-sm">Hapus</a>
                                        <?php else : ?>
                                            <a href="javascript:void(0);" id="checkout" data-toggle="modal" data-target="#checkModal" data-id="<?= $persetujuan['id_tr'] ?>" data-nama="<?= $persetujuan['nama_lengkap'] ?>" data-username="<?= $persetujuan['username'] ?>" data-merek="<?= $persetujuan['merek'] ?>" class="text-success ml-2 mr-4"><i class="fas fa-check"></i></a>
                                            <a href="<?= base_url('admin/tolak_persetujuan/') . $persetujuan['id_tr'] ?>" id="tolak-persetujuan" class="text-danger"><i class="fas fa-times"></i></a>
                                        <?php endif ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="<?= base_url('admin/user/') . $persetujuan['user_id'] ?>" class="btn btn-secondary btn-sm">Detail User</a>
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
<!-- Modal -->
<div class="modal fade" id="checkModal" tabindex="-1" aria-labelledby="checkModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkModalLabel">Persetujuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-persetujuan" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="username" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" readonly>
                    </div>
                    <div class="form-group">
                        <label>Merek Mobil</label>
                        <input type="text" class="form-control" id="merek" readonly>
                    </div>
                    <div class="form-group">
                        <label>Ingin dipinjam selama</label>
                        <div class="input-group">
                            <input type="text" class="form-control <?= form_error('dipinjam') ? 'is-invalid' : '' ?>" name="dipinjam">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Jam</div>
                            </div>
                            <div class="invalid-feedback"><?= form_error('dipinjam') ?></div>
                        </div>
                        <small>*Hanya Angka</small>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" value="<?= date('Y-m-d h:i:s') ?>" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/jquery/jquery.min.js"></script>
<script>
    $(function() {
        $('#persetujuan-table').DataTable({
            "autoWidth": false,
            "responsive": true,
            "columnDefs": [{
                "targets": [-1, -2],
                "className": "text-center",
                "orderable": false,
            }, ],
        })

        $(document).on('click', '#tolak-persetujuan', function(event) {
            event.preventDefault();
            let href = $(this).attr('href');
            Swal.fire({
                title: 'Perhatian!',
                text: 'Yakin ingin menolak?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1d96c3',
                cancelButtonColor: '#ff5c6c',
                confirmButtonText: 'Ya, Yakin!'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
        })
        $(document).on('click', '#hapus-persetujuan', function(event) {
            event.preventDefault();
            let href = $(this).attr('href');
            Swal.fire({
                title: 'Perhatian!',
                text: 'Yakin ingin menghapus?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1d96c3',
                cancelButtonColor: '#ff5c6c',
                confirmButtonText: 'Ya, Yakin!'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
        })

        $(document).on('click', '#checkout', function() {
            // Data
            let id = $(this).data('id');
            let username = $(this).data('username');
            let nama = $(this).data('nama');
            let merek = $(this).data('merek');
            // Put Input
            $('#username').val(username);
            $('#nama').val(nama);
            $('#merek').val(merek);

            $('#create-persetujuan').attr('action', `<?= base_url() ?>admin/create_persetujuan/${id}`);
            // Show Modal
            $('#checkModal').modal('show')
        })
    })
</script>