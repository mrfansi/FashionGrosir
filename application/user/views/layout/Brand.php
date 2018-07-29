<!-- Alert Promo -->
<div class="container text-center clear-header">
    <div class="row">
        <div class="col-lg-7 col-md-5">
            <div class="float-none float-md-left">
                Selamat datang di <b><?= $brandname; ?></b>
            </div>
        </div>
        <div class="col-lg-5 col-md-7">
            <div class="float-none float-md-right f-brand-cos">
                <?php if (isset($_SESSION['id'])): ?>
                    <a class="alert-link f-link" href="<?= site_url('resi'); ?>">
                        Laporan Resi
                    </a>
                    | <a class="alert-link f-link" href="<?= site_url('pending'); ?>">
                        Status Order
                    </a>
                    | <a class="alert-link f-link" href="<?= site_url('riwayat'); ?>">
                        Riwayat Pesanan
                    </a>
                <?php endif; ?>
                <?php if (isset($_SESSION['isonline']) && $_SESSION['isonline'] == true): ?>
                    | <a href="<?= site_url('profil'); ?>" class="alert-link f-link">
                        <i class="fa fa-user"></i> <?= $_SESSION['nama']; ?>
                    </a>
                    | <a class="alert-link f-link" href="<?= site_url('logout'); ?>">
                        Log Out
                    </a>
                <?php else: ?>
                    <a class="alert-link f-link" href="<?= site_url('login'); ?>">
                        <i class="fa fa-user"></i> Login
                    </a>
                    | <a class="alert-link f-link" href="<?= site_url('register'); ?>">
                        <i class="fas fa-sign-in-alt"></i> Register
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- End Alert Promo -->
<!-- Header -->
<div class="container mt-5 mt-sm-3 mt-md-2 mt-lg-0">
    <nav class="navbar navbar-expand-lg text-sm-center">
        <div class="m-auto">
            <a class="navbar-brand" href="<?= site_url('/'); ?>">
                <?php if ($logo != NULL): ?>
                    <img src="<?= base_url('upload/' . $logo); ?>" width="150" height="80"
                         class="img-fluid mx-auto d-block"
                         alt="">
                <?php else: ?>
                    <img class="img-fluid mx-auto d-block" width="150" height="80"
                         src="https://upload.wikimedia.org/wikipedia/commons/archive/a/ac/20121003093557%21No_image_available.svg"
                         alt="No Image">
                <?php endif; ?>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="row f-width-full"">
            <div class="col-10">
                <form class="form-inline my-2 my-lg-0" action="<?= site_url('cari'); ?>" method="get">
                    <div class="input-group f-width-full"">
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

        <div class="col-2 mt-xl-0 mt-lg-0 mt-sm-2">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button class="btn btn-primary r-btn-pink my-2 my-sm-0" tabindex="0" class="nav-link"
                            title="Cart"
                            data-toggle="popover" data-placement="bottom" data-content="">
                        <i class="fa fa-shopping-cart fa-lg"></i>
                        <span><?= $counter_cart = isset($_SESSION['id']) ? $this->cart->where_pengguna_kode($_SESSION['id'])->count_rows() : ''; ?></span>
                    </button>
                </li>
            </ul>
        </div>
</div>


</div>
</nav>
</div>

