<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">--- MAIN MENU</li>
                <li> <a class="waves-effect waves-dark bg-white" href="<?= base_url('admin') ?>" aria-expanded="false"><i class="icon-Home-2"></i><span class="hide-menu">Dashboard</span></a></li>
                <li <?= activeMenu(['mobil', 'edit_mobil', 'create_mobil', 'user']) ?>> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false"><i class="icon-Big-Data"></i><span class="hide-menu">Master Data</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= base_url('admin/tipe') ?>">Data Tipe</a></li>
                        <li><a href="<?= base_url('admin/mobil') ?>" <?= activeMenu(['mobil', 'edit_mobil', 'create_mobil']) ?>>Data Mobil</a></li>
                        <li><a href="<?= base_url('admin/user') ?>" <?= activeMenu(['user']) ?>>Data User</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false"><i class="icon-Handshake"></i><span class="hide-menu">Transaksi</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= base_url('admin/persetujuan') ?>">Persetujuan</a></li>
                        <li><a href="<?= base_url('admin/peminjaman') ?>">Dalam Peminjaman</a></li>
                        <li><a href="<?= base_url('admin/histori') ?>">Histori</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false"><i class="icon-Box-Full"></i><span class="hide-menu">Kelola Laporan</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">Laporan</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- LAINNYA</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false"><i class="icon-Settings-Window"></i><span class="hide-menu">Pengaturan</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= base_url('auth/logout') ?>">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>