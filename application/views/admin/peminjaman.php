<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-7 col-md-5 align-self-center">
                <h3 class="text-themecolor">Peminjaman</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
                    <li class="breadcrumb-item active">Peminjaman</li>
                </ol>
            </div>
        </div>
        <!-- table responsive -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Dalam Peminjaman Aktif</h4>
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
                                <th>Status</th>
                                <th>Disetujui pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($getAllPeminjaman as $persetujuan) : ?>
                                <?php
                                if (time() < $persetujuan['created_time'] + (60 * 60 * $persetujuan['jam_pinjam'])) {
                                    $keterlambatan = 'Tidak ada';
                                } else {
                                    $time = time() - ($persetujuan['created_time'] + (60 * 60 * $persetujuan['jam_pinjam']));
                                    $minutes = floor($time / 60);
                                    $hours = $minutes / 60;

                                    $keterlambatan = $minutes . " Menit / " . number_format((float)$hours, 2, '.', '') . " Jam";
                                }
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $persetujuan['username'] ?></td>
                                    <td><?= $persetujuan['nama_lengkap'] ?></td>
                                    <td><?= $persetujuan['nama_tipe'] ?></td>
                                    <td><?= $persetujuan['merek'] ?></td>
                                    <td><?= $persetujuan['jam_pinjam'] ?> Jam</td>
                                    <td><?= time() < $persetujuan['created_time'] + (60 * 60 * $persetujuan['jam_pinjam']) ? 'Aktif' : "Terlambat" ?></td>
                                    <td><?= $persetujuan['disetujui'] ?></td>
                                    <td style="text-align: center;">
                                        <a href="<?= base_url('admin/user/') . $persetujuan['user_id'] ?>" data-toggle="modal" data-target="#checkModal" id="checkData" class="btn btn-secondary btn-sm" data-id="<?= $persetujuan['id_tr'] ?>" data-username="<?= $persetujuan['username'] ?>" data-nama="<?= $persetujuan['nama_lengkap'] ?>" data-merek="<?= $persetujuan['merek'] ?>" data-waktu="<?= $persetujuan['jam_pinjam'] ?>" data-status="<?= time() < time() + (60 * 60 * $persetujuan['jam_pinjam']) ? 'Aktif' : "Terlambat" ?>" data-keterlambatan="<?= $keterlambatan ?>">Detail</a>
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
                <h5 class="modal-title" id="checkModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold">Username</td>
                            <td>:</td>
                            <td id="username"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Nama Lengkap</td>
                            <td>:</td>
                            <td id="nama"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Merek Mobil</td>
                            <td>:</td>
                            <td id="merek"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Lama Peminjaman</td>
                            <td>:</td>
                            <td id="waktu"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Status</td>
                            <td>:</td>
                            <td id="status"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Keterlambatan</td>
                            <td>:</td>
                            <td id="keterlambatan"></td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" id="id-hid">
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-primary" id="btn-selesaikan">Selesaikan Peminjaman</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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

        $(document).on('click', '#btn-selesaikan', function(event) {
            event.preventDefault();
            let id = $('#id-hid').val();
            Swal.fire({
                title: 'Perhatian!',
                text: 'Yakin ingin menyelesaikan peminjaman?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1d96c3',
                cancelButtonColor: '#ff5c6c',
                confirmButtonText: 'Ya, Yakin!'
            }).then((result) => {
                if (result.value) {
                    document.location.href = `<?= base_url() ?>admin/create_peminjaman/${id}`;
                }
            })
        })

        $(document).on('click', '#checkData', function() {
            // Data
            let id = $(this).data('id');
            let username = $(this).data('username');
            let nama = $(this).data('nama');
            let merek = $(this).data('merek');
            let waktu = $(this).data('waktu');
            let status = $(this).data('status');
            let keterlambatan = $(this).data('keterlambatan');
            // Put Input
            $('#username').html(username);
            $('#nama').html(nama);
            $('#merek').html(merek);
            $('#waktu').html(waktu + ' Jam');
            $('#status').html(status);
            $('#keterlambatan').html(keterlambatan);
            $('#id-hid').val($(this).data('id'));

            // Show Modal
            $('#checkModal').modal('show')
        })
    })
</script>