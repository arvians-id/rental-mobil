<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Detail Mobil</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
                    <li class="breadcrumb-item active">Detail Mobil</li>
                </ol>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card"> <img class="card-img" src="<?= base_url() ?>assets/img/mobil/<?= $getMobilById['photo'] ?>" alt="Card image">
                    <div class="card-img-overlay card-inverse social-profile d-flex justify-content-center">
                        <div class="align-self-center justify-content-center">
                            <h4 class="card-title"><?= $getMobilById['nama_tipe'] ?></h4>
                            <h6 class="card-subtitle"><?= $getMobilById['merek'] ?></h6>
                            <p class="text-white"><?= $getMobilById['tahun'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#detail" role="tab">Detail</a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!--second tab-->
                        <div class="tab-pane active" id="detail" role="tabpanel">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Kode Tipe</strong>
                                        <br>
                                        <p class="text-muted"><?= $getMobilById['kode_tipe'] ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Nama Tipe</strong>
                                        <br>
                                        <p class="text-muted"><?= $getMobilById['nama_tipe'] ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>No Plat</strong>
                                        <br>
                                        <p class="text-muted"><?= $getMobilById['no_plat'] ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Warna</strong>
                                        <br>
                                        <p class="text-muted"><?= $getMobilById['warna'] ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Tahun</strong>
                                        <br>
                                        <p class="text-muted"><?= $getMobilById['tahun'] ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>Status</strong>
                                        <br>
                                        <p class="text-muted"><?= $getMobilById['dipinjam'] == null ? 'Tersedia' : 'Tidak Tersedia' ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>Dibuat</strong>
                                        <br>
                                        <p class="text-muted"><?= $getMobilById['created_at'] ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>Terakhir diubah</strong>
                                        <br>
                                        <p class="text-muted"><?= $getMobilById['updated_at'] ?></p>
                                    </div>
                                </div>
                                <hr>
                                <p class="m-t-30"><?= $getMobilById['deskripsi'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
</div>