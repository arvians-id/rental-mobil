<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-7 col-md-5 align-self-center">
                <h3 class="text-themecolor">Laporan</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
                    <li class="breadcrumb-item active">Laporan</li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Buat Laporan</h4>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <form method="post">
                            <div class="form-group">
                                <label>Dari</label><span class="text-danger"> *</span>
                                <input type="date" class="form-control <?= form_error('awal') ? 'is-invalid' : '' ?>" name="awal" value="<?= set_value('awal') ?>">
                                <div class="invalid-feedback"><?= form_error('awal') ?></div>
                            </div>
                            <div class="form-group">
                                <label>Sampai</label><span class="text-danger"> *</span>
                                <input type="date" class="form-control <?= form_error('akhir') ? 'is-invalid' : '' ?>" name="akhir" value="<?= set_value('akhir') ?>">
                                <div class="invalid-feedback"><?= form_error('akhir') ?></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Buat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
    </div>
</div>

<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/jquery/jquery.min.js"></script>
<script>
    $(function() {
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