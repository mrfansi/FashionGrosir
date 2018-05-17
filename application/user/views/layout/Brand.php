<body>

<!-- Alert Promo -->
<div class="container-fluid text-center clear-header" role="alert">
    Selamat datang di <b>Fashion Grosir</b> &nbsp;|&nbsp; Info Promo <a href="" class="alert-link f-link">(Klik)</a>
    <?php if (isset($_SESSION['isonline']) && $_SESSION['isonline'] == true): ?>
        | <a href="<?= site_url('profil'); ?>" class="alert-link f-link">
            <i class="fa fa-user"></i> <?= $_SESSION['nama']; ?>
        </a>
        | <a class="alert-link f-link" href="<?= site_url('logout'); ?>">
            Log Out
        </a>
    <?php else: ?>
        | <a class="alert-link f-link" href="<?= site_url('login'); ?>">
            <i class="fa fa-user"></i> Login
        </a>
    <?php endif; ?>
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
            <a class="btn btn-primary r-btn-pink" href="#">
                <i class="fa fa-file"></i> Cek Resi
            </a>
            <a class="btn btn-primary r-btn-pink" href="<?= site_url('cart'); ?>">
                <span class="fa fa-shopping-cart"></span>
                <?php if (isset($_SESSION['id'])): ?>
                <?php $cart = $this->cart->where_p_kode($_SESSION['id'])->count_rows(); ?>
                <?php if (isset($cart) && $cart != NULL): ?>
                <span class="badge badge-light"><?= $cart; ?></span>
                <?php endif; ?>
                <?php endif; ?>
            </a>


        </div>
        <!-- End User -->
    </div>
</div>
<br>