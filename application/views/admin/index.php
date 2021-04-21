<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex p-10 no-block">
                            <div class="align-self-center display-6 m-r-20"><i class="text-success icon-Big-Data"></i></div>
                            <div class="align-slef-center">
                                <h2 class="m-b-0"><?= $countAllMobil ?></h2>
                                <h6 class="text-muted m-b-0">Jumlah Mobil</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex p-10 no-block">
                            <div class="align-self-center display-6 m-r-20"><i class="text-info icon-Big-Data"></i></div>
                            <div class="align-slef-center">
                                <h2 class="m-b-0"><?= $countAllProses ?></h2>
                                <h6 class="text-muted m-b-0">Dalam Proses</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex p-10 no-block">
                            <div class="align-self-center display-6 m-r-20"><i class="text-primary icon-Big-Data"></i></div>
                            <div class="align-slef-center">
                                <h2 class="m-b-0"><?= $countAllPeminjaman ?></h2>
                                <h6 class="text-muted m-b-0">Dalam Peminjaman</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex p-10 no-block">
                            <div class="align-self-center display-6 m-r-20"><i class="text-danger icon-Big-Data"></i></div>
                            <div class="align-slef-center">
                                <h2 class="m-b-0"><?= $countAllSelesai ?></h2>
                                <h6 class="text-muted m-b-0">Selesai</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
        </div>
    </div>
</div>