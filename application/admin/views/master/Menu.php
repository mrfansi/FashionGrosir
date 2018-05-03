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
                <li><a href="<?= site_url('dashboard'); ?>"> <i class="icon-home"></i>DASHBOARD </a></li>
                <li>
                    <a><i class="fas fa-filter"></i> KATEGORI & UKURAN</a>
                    <ul>
                        <li><a href="<?= site_url('kategori'); ?>""> <i class="fas fa-angle-right"></i>KATEGORI </a></li>
                    </ul>
                    <ul>
                        <li><a href="<?= site_url('ukuran'); ?>""> <i class="fas fa-angle-right"></i>UKURAN </a></li>
                    </ul>
                </li>
                <li><a><i class="fas fa-shopping-cart"></i>ITEM</a></li>
                <li><a><i class="fas fa-exchange-alt"></i>TRANSAKSI</a>
                    <ul>
                        <li>
                            <a href="#"><i class="fas fa-file-alt"></i>ORDER</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-file-alt"></i>KONFIRMASI PEMBAYARAN</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-file-alt"></i>INVOICE</a>
                        </li>
                    </ul>
                </li>
                <li><a href="<?= site_url('customers'); ?>"> <i class="fa fa-users"></i>PELANGGAN </a>
                    <ul>
                        <li>
                            <a href="<?= site_url('customers/by_vip'); ?>"><i class="fas fa-user"></i>VIP</a>
                        </li>
                        <li>
                            <a href="<?= site_url('customers/by_reseller'); ?>"><i class="fas fa-user"></i>RESELLER</a>
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
                    <a href="<?= site_url('users'); ?>"><i class="fa fa-users"></i>PENGGUNA ADMIN
                    </a>
                </li>
                <li><a href="#"><i class="fa fa-cogs"></i>OPSI </a></li>
            </ul>
        </div>
    </div>
</nav>