<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li class="active"><a href="<?= base_url() ?>">Beranda</a></li>
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
        <div class="row">
            <!-- STORE -->
            <div id="store" class="col-md-12">
                <!-- store products -->
                <div class="row">
                    <?php foreach ($getAllMobilPagination as $mobil) : ?>
                        <!-- product -->
                        <div class="col-md-3 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="<?= base_url() ?>assets/img/mobil/<?= $mobil['photo'] ?>" height="400" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category"><?= $mobil['nama_tipe'] ?></p>
                                    <h3 class="product-name"><a href="<?= base_url('home/index/') . $mobil['id_mobil'] ?>"><?= $mobil['merek'] ?></a></h3>
                                    <h4 class="product-price"><?= $mobil['dipinjam'] == null ? 'Tersedia' : 'Tidak Tersedia' ?></h4>
                                </div>
                                <div class="add-to-cart">
                                    <button onclick="location.href='<?= base_url('home/checkout/') . $mobil['id_mobil'] ?>';" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Pesan sekarang</button>
                                </div>
                            </div>
                        </div>
                        <!-- /product -->
                    <?php endforeach ?>
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <?= $this->pagination->create_links(); ?>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->