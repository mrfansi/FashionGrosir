<body>

<!-- Alert Promo -->
<div class="container-fluid text-center clear-header">
    Selamat datang di <b><?= $brandname; ?></b>
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
        <div class="col-12 col-lg-3 col-md-2">
            <a href="index.html" class="navbar-brand f-logo">
                <img src="assets/brand/citrus-logo.png" alt="">
            </a>
        </div>
        <!-- End Brand -->

        <!-- Search -->
        <div class="col-10 col-lg-6 col-md-8">
            <div class="row">
                <div class="col">
                    <form class="form" action="<?= site_url('cari'); ?>"method="get">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Cari Produk"
                                   aria-label="Search" id="cari" name="cari" autocomplete="off">
                            <div class="input-group-addon">
                                <button class="btn btn-search-color f-btn-search" type="submit" style=""
                                        id="search-btn"><i
                                            class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php if (isset($_SESSION['id'])): ?>
            <div class="row">
                <div class="col f-hover">
                    <a class="small" href="<?= site_url('resi'); ?>">Cek Resi</a>
                    <span class="f-span">|</span>
                    <a class="small" href="<?= site_url('pending'); ?>">Status Order</a>
                    <span class="f-span">|</span>
                    <a class="small" href="<?= site_url('riwayat'); ?>">Histori Belanja</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <!-- End Search -->
        <div class="col-2 col-lg-3 col-md-2 mb-2">
            <a tabindex="0" class="btn btn-primary r-btn-pink f-media-right"
               title="Cart"
               data-toggle="popover"
               data-placement="bottom"
               data-content="">
                <i class="fa fa-shopping-cart fa-lg"></i>
                <span class="badge"><?= $counter_cart = isset($_SESSION['id']) ? $this->cart->where_p_kode($_SESSION['id'])->count_rows() : ''; ?></span>
            </a>
        </div>
    </div>
</div>