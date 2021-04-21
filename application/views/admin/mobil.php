<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-7 col-md-5 align-self-center">
                <h3 class="text-themecolor">Data Mobil</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
                    <li class="breadcrumb-item active">Mobil</li>
                </ol>
            </div>
            <div class="col-5 col-md-7 align-self-center text-right d-md-block">
                <a href="<?= base_url('admin/create_mobil') ?>" class="btn btn-info"><i class="fa fa-plus-circle"></i> Tambah</a>
            </div>
        </div>
        <!-- table responsive -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Data Mobil</h4>
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
                    <table id="mobil-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Tipe</th>
                                <th>Merek Mobil</th>
                                <th>No Plat</th>
                                <th>Ketersediaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($getAllMobil as $mobil) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $mobil['nama_tipe'] ?></td>
                                    <td><?= $mobil['merek'] ?></td>
                                    <td><?= $mobil['no_plat'] ?></td>
                                    <td><?= $mobil['dipinjam'] == null ? 'Tersedia' : 'Tidak Tersedia' ?></td>
                                    <td style="text-align: center;">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="<?= base_url('admin/mobil/') . $mobil['id_mobil'] ?>" class="btn btn-secondary btn-sm">Detail</a>
                                            <a href="<?= base_url('admin/edit_mobil/') . $mobil['id_mobil'] ?>" class="btn btn-secondary btn-sm">Edit</a>
                                            <a href="<?= base_url('admin/destroy_mobil/') . $mobil['id_mobil'] ?>" id="hapus-mobil" class="btn btn-secondary btn-sm">Hapus</a>
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
        $('#mobil-table').DataTable({
            "autoWidth": false,
            "responsive": true,
            "columnDefs": [{
                "targets": [-1],
                "className": "text-center",
                "orderable": false,
            }, ],
        })

        $(document).on('click', '#hapus-mobil', function(event) {
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