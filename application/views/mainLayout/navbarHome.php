<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li <?= activeMenuHome(['', 'index']) ?>><a href="<?= base_url() ?>">Beranda</a></li>
                <?php if ($this->session->userdata('username')) : ?>
                    <li <?= $this->uri->segment(1) == 'user' && $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="<?= base_url('user') ?>">Profil</a></li>
                    <li <?= activeMenu(['password']) ?>><a href="<?= base_url('user/password') ?>">Ganti Password</a></li>
                    <li <?= activeMenu(['pesanan']) ?>><a href="<?= base_url('user/pesanan') ?>">Pesanan Anda</a></li>
                    <li><a href="<?= base_url('auth/logout') ?>">Keluar</a></li>
                <?php endif ?>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->