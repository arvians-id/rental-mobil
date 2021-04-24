<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="<?= base_url() ?>">Beranda</a></li>
                    <li class="active"><a href="" <?= base_url() ?>">Checkout</a></li>
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
        <div class="row" style="margin:0px">
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success mt-2" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php elseif ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger mt-2" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form method="post" onsubmit="return confirm('Do you really want to submit the form?');">
                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">data profil anda</h3>
                        </div>
                        <div class="alert alert-info" role="alert">Data dibawah ini akan sama dengan data di profil anda.</div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="input" type="text" name="username" value="<?= $cekUser['username'] ?>" readonly>
                            <small class="text-danger"><?= form_error('username') ?></small>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input class="input" type="text" name="nama_lengkap" value="<?= $cekUser['nama_lengkap'] ?>" readonly>
                            <small class="text-danger"><?= form_error('nama_lengkap') ?></small>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="input" type="email" name="email" value="<?= $cekUser['email'] ?>" readonly>
                            <small class="text-danger"><?= form_error('email') ?></small>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input class="input" type="text" name="alamat" value="<?= $cekUser['alamat'] ?>" readonly>
                            <small class="text-danger"><?= form_error('alamat') ?></small>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input class="input" type="text" name="jenis_kelamin" value="<?= $cekUser['jenis_kelamin'] == 1 ? 'Laki-laki' : 'Perempuan' ?>" readonly>
                            <small class="text-danger"><?= form_error('jenis_kelamin') ?></small>
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input class="input" type="text" name="no_telepon" value="<?= $cekUser['no_telepon'] ?>" readonly>
                            <small class="text-danger"><?= form_error('no_telepon') ?></small>
                        </div>
                        <div class="form-group">
                            <label>NIK</label>
                            <input class="input" type="text" name="nik" value="<?= $cekUser['nik'] ?>" readonly>
                            <small class="text-danger"><?= form_error('nik') ?></small>
                        </div>
                        <small class="text-info">*Data tidak bisa diubah. Jika ingin mengubah data profil anda, <a href="<?= base_url('user') ?>">Klik disini</a></small>
                    </div>
                    <!-- /Billing Details -->
                </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Pesanan Anda</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>MOBIL</strong></div>
                            <div><strong>DETAIL</strong></div>
                        </div>
                        <div class="order-products">
                            <div class="order-col">
                                <div>Nama Tipe</div>
                                <div><?= $getMobilById['nama_tipe'] ?></div>
                            </div>
                            <div class="order-col">
                                <div>Nama Merek</div>
                                <div><?= $getMobilById['merek'] ?></div>
                            </div>
                        </div>
                        <div class="order-col">
                            <div>Ketersediaan</div>
                            <div><strong><?= $getMobilById['dipinjam'] == null ? 'TERSEDIA' : 'TIDAK TERSEDIA' ?></strong></div>
                        </div>
                    </div>
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Pesan
                            </div>
                        </div>
                        <div class="panel-body">
                            Pesanan yang anda buat akan kadaluarsa selama 2 jam, pastikan anda datang ke tempat Family Rent Car sebelum jam yang ditentukan. Jika tidak, makan pesanan akan otomatis dibatalkan
                            <br><br>
                            Anda harus datang ke tempat Family Rent Car Sebelum : <?= date('Y-m-d h:i:s', time() + (60 * 60 * 2)) ?>
                        </div>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" name="check" id="terms">
                        <label for="terms">
                            <span></span>
                            Saya setuju dengan syarat & ketentuan yang berlaku
                        </label>
                        <small class="text-danger"><?= form_error('check') ?></small>
                    </div>
                    <button type="submit" class="primary-btn order-submit">Pesan sekarang</button>
                </div>
                <!-- /Order Details -->
            </form>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->