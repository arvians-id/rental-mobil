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
                                        <p class="text-muted"><?= $getUserById['jenis_kelamin'] == null ? 'notset' : $getUserById['jenis_kelamin'] ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>No Telepon</strong>
                                        <br>
                                        <p class="text-muted"><?= $getUserById['no_telepon'] == null ? 'notset' : $getUserById['no_telepon'] ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>NIK</strong>
                                        <br>
                                        <p class="text-muted"><?= $getUserById['nik'] == null ? 'notset' : $getUserById['nik'] ?></p>
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
                                <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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