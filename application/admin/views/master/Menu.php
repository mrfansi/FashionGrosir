<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <h5 class="sidenav-heading">Main</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="<?= site_url('dashboard'); ?>"> <i class="icon-home"></i>DASHBOARD </a></li>
                <li><a> <i class="icon-interface-windows"></i>KATEGORI </a>
                    <ul>
                        <li><a href="#"> <i class="fa fa-plus"></i> BUAT
                                KATEGORI</a></li>
                        <li><a href="#">ALL</a></li>
                        <li><a href="#">HOT <div class="badge badge-danger">New</div></a></li>
                    </ul>
                </li>
                <li><a> <i class="icon-interface-windows"></i>ITEMS </a></li>
                <li><a><i class="icon-interface-windows"></i>TRANSAKSI</a>
                    <ul>
                        <li>
                            <a href="#">ORDER</a>
                        </li>
                        <li>
                            <a href="#">INVOICE</a>
                        </li>
                    </ul>
                </li>
                <li><a href="<?= site_url('customers'); ?>"> <i class="fa fa-users"></i>CUSTOMERS </a></li>
            </ul>
        </div>
        <div class="admin-menu">
            <h5 class="sidenav-heading">
                Admin
            </h5>
            <ul id="side-admin-menu" class="side-menu list-unstyled">
                <li>
                    <a href="#"><i class="fa fa-user"></i>PROFIL
                        <div class="badge badge-info">Coming soon</div>
                    </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users"></i>USERS
                    </a>
                </li>
                <li><a href="#"><i class="fa fa-cogs"></i>OPSI </a></li>
            </ul>
        </div>
    </div>
</nav>