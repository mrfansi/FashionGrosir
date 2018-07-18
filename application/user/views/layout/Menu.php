<!-- Navigasi Bar -->
<div class="container f-color">
    <hr class="f-hr">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light f-nav f-color">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav f-nav-size">
                    <li class="nav-item f-nav-margin">
                        <a class="nav-link" href="<?= site_url(); ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item f-nav-margin">
                        <a class="nav-link" href="<?= site_url('produk-terbaru'); ?>">
                            Produk Terbaru
                        </a>
                    </li>
                    <li class="nav-item f-nav-margin">
                        <a class="nav-link" href="<?= site_url('produk-terbaru'); ?>">
                            Seri
                        </a>
                    </li>
                    <?php if ($menu_kategori != NULL): ?>
                        <?php foreach ($menu_kategori as $menukat): ?>
                            <li class="nav-item f-nav-margin">
                                <a class="nav-link"
                                   href="<?= site_url('kategori/' . $menukat->k_url); ?>"><?= $menukat->k_nama; ?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
    <hr class="f-hr">
    <!-- End Navigasi Bar -->
</div>
<!-- End Header -->