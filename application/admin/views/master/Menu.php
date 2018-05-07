<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center">
                <h2 class="h5"><?= $_SESSION['nama']; ?></h2><span>Admin</span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="<?= site_url('dashboard'); ?>"" class="brand-small text-center">
                    <strong>F</strong><strong class="text-primary">G</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <h5 class="sidenav-heading">Main</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="<?= site_url('dashboard'); ?>"> <i class="icon-home"></i>Dashboard </a></li>
                <li>
                    <a href="#misc" aria-expanded="false" data-toggle="collapse"><i class="fas fa-filter"></i>Misc</a>
                    <ul id="misc" class="collapse list-unstyled ">
                        <li><a href="<?= site_url('kategori'); ?>"><i class="fas fa-angle-right"></i>Kategori </a></li>
                        <li><a href="<?= site_url('ukuran'); ?>"><i class="fas fa-angle-right"></i>Ukuran </a></li>
                        <li><a href="<?= site_url('seri'); ?>"><i class="fas fa-angle-right"></i>Seri </a></li>
                        <li><a href="<?= site_url('warna'); ?>"><i class="fas fa-angle-right"></i>Warna </a></li>
                    </ul>
                </li>
                <li><a href="#item" aria-expanded="false" data-toggle="collapse"><i class="fas fa-shopping-cart"></i>Item</a>
                    <ul id="item" class="collapse list-unstyled">
                        <li><a href="<?= site_url('item'); ?>"><i class="fas fa-angle-right"></i>Semua</a></li>
                    <?php foreach ($this->kategori->get_all() as $kat): ?>
                        <li><a href="<?= site_url('item/by/' . $kat->k_kode); ?>"><i class="fas fa-angle-right"></i><?= $kat->k_nama ;?></a></li>
                    <?php endforeach; ?>
                    </ul>
                </li>
                <li><a href="#transaksi" aria-expanded="false" data-toggle="collapse"><i class="fas fa-exchange-alt"></i>Transaksi</a>
                    <ul id="transaksi" class="collapse list-unstyled">
                        <li>
                            <a href="<?= site_url('order'); ?>"><i class="fas fa-file-alt"></i>Order</a>
                        </li>
                        <li>
                            <a href="<?= site_url('order/konfirmasi'); ?>"><i class="fas fa-file-alt"></i>Konfirmasi Pembayaran</a>
                        </li>
                        <li>
                            <a href="<?= site_url('order/invoice'); ?>"><i class="fas fa-file-alt"></i>Invoice</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#pelanggan" aria-expanded="false" data-toggle="collapse"><i class="fa fa-users"></i>Pelanggan </a>
                    <ul id="pelanggan" class="collapse list-unstyled">
                        <li>
                            <a href="<?= site_url('customers'); ?>"><i class="fas fa-user"></i>Semua</a>
                        </li>
                        <li>
                            <a href="<?= site_url('customers/by_vip'); ?>"><i class="fas fa-user"></i>VIP</a>
                        </li>
                        <li>
                            <a href="<?= site_url('customers/by_reseller'); ?>"><i class="fas fa-user"></i>Reseller</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="admin-menu">
            <h5 class="sidenav-heading">
                Admin
            </h5>
            <ul id="side-admin-menu" class="side-menu list-unstyled">
                <li>
                    <a href="<?= site_url('users'); ?>"><i class="fa fa-users"></i>Pengguna Admin
                    </a>
                </li>
                <li><a href="#"><i class="fa fa-cogs"></i>Opsi </a></li>
            </ul>
        </div>
    </div>
</nav>