<body>

<!-- Alert Promo -->
<div class="container-fluid text-center clear-header" role="alert">
    Selamat datang di <b>Fashion Grosir</b> &nbsp;|&nbsp; Info Promo <a href="" class="alert-link f-link">(Klik)</a>
    <!-- <a href="" class="btn btn-danger"><i class="glyphicon glyphicon-love"></i></a> -->
</div>
<!-- End Alert Promo -->
<br>
<!-- Header -->
<div class="container-fluid f-color">
    <div class="row f-padding-header">
        <!-- Brand -->
        <div class="col-lg-3 col-md-4">
            <a href="index.html" class="navbar-brand f-logo">
                <img src="assets/brand/citrus-logo.png" alt="">
            </a>
        </div>
        <!-- End Brand -->

        <!-- Search -->
        <div class="col-lg-6 col-md-8">
            <form class="form">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Cari Produk"
                           aria-label="Search" id="search">
                    <div class="input-group-addon">
                        <button class="btn btn-search-color f-btn-search" type="submit" style="" id="search-btn"><i
                                    class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Search -->

        <!-- User -->
        <div class="col-lg-3 col-md-12">
            <a class="btn btn-ez" href="#">
                <i class="fa fa-file"></i> Cek Resi
            </a>
            <a class="btn btn-ez" href="#">
                <span class="fa fa-shopping-cart"></span>
                <span class="badge badge-light">9</span>
            </a>

            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
            <div class="dropdown">
                <a class="btn btn-ez" href="#" role="button" id="profil" data-toggle="dropdown">
                    <i class="fa fa-user"></i> <?= $_SESSION['nama']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="profil">
                    <a class="dropdown-item" href="<?= site_url('profil'); ?>">Profil</a>
                    <a class="dropdown-item" href="<?= site_url('logout'); ?>">Logout</a>
                </div>
            </div>
            <?php else: ?>
            <a class="btn btn-ez" href="<?= site_url('login'); ?>"><i class="fa fa-user"></i> Login</a>
            <?php endif; ?>
        </div>
        <!-- End User -->
    </div>
</div>
<br>