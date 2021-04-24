<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="<?= base_url() ?>">Beranda</a></li>
                    <li class="active"><a href="" <?= base_url() ?>">Mobil</a></li>
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
            <!-- Product main img -->
            <div class="col-md-6" style="margin-bottom: 25px;">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="<?= base_url() ?>assets/img/mobil/<?= $getMobilById['photo'] ?>" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Order Details -->
            <div class="col-md-6 order-details" style="margin-top: 16px;">
                <div class="section-title text-center">
                    <h3 class="title">Detail Mobil</h3>
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
                        <div class="order-col">
                            <div>Warna</div>
                            <div><?= $getMobilById['warna'] ?></div>
                        </div>
                        <div class="order-col">
                            <div>Tahun</div>
                            <div><?= $getMobilById['tahun'] ?></div>
                        </div>
                    </div>
                    <div class="order-col">
                        <div>Ketersediaan</div>
                        <div><strong><?= $getMobilById['dipinjam'] == null ? 'TERSEDIA' : 'TIDAK TERSEDIA' ?></strong></div>
                    </div>
                </div>
                <button onclick="location.href='<?= base_url('home/checkout/') . $getMobilById['id_mobil'] ?>';" class="primary-btn order-submit">Pesan sekarang</button>
            </div>
            <!-- /Order Details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Deskripsi</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><?= $getMobilById['deskripsi'] ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab2  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Mobil Lainnya</h3>
                </div>
            </div>

            <?php foreach ($getAllNewMobil as $mobil) : ?>
                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <!-- product -->
                    <div class="product">
                        <div class="product-img">
                            <img src="<?= base_url() ?>assets/img/mobil/<?= $mobil['photo'] ?>" height="200" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category"><?= $mobil['nama_tipe'] ?></p>
                            <h3 class="product-name"><a href="<?= base_url('home/detail/') . $mobil['id_mobil'] ?>"><?= $mobil['merek'] ?></a></h3>
                            <h4 class="product-price"><?= $mobil['dipinjam'] == null ? 'Tersedia' : 'Tidak Tersedia' ?></h4>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn" onclick="location.href='<?= base_url('home/checkout/') . $mobil['id_mobil'] ?>';"><i class="fa fa-shopping-cart"></i> Pesan sekarang</button>
                        </div>
                    </div>
                    <!-- /product -->
                </div>
                <!-- /product -->
            <?php endforeach ?>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->