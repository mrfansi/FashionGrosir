<!-- Footer -->
<div class="container-fluid navbar-light f-footer-bg" role="alert">
    <div class="row">
        <div class="col-xl-4 col-lg-3 col-md-4 col-sm-5 col-12">
            <div class="text-center f-bottom">
                <a href="index.html" class="navbar-brand f-logo-footer">
                    <img src="assets/brand/citrus-logo.png" alt="">
                </a>
            </div>
        </div>
        <div class="col-xl-8 col-lg-9 col-md-8 col-sm-7 col-12">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 f-margin-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link f-footer-new" href="#">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link f-footer-new" href="#">Hubungi Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link f-footer-new" href="#">Menjadi Reseler</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link f-footer-new" href="#">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link f-footer-new" href="#">Bantuan</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 f-margin-nav">
                    <ul class="navbar-nav">
                        <?php foreach ($this->menu_kategori as $menukat): ?>
                        <li class="nav-item">
                            <a class="nav-link f-footer-new" href="<?= site_url('kategori/' . $menukat->k_kode); ?>"><?= $menukat->k_nama; ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 f-margin-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link f-footer-new" href="#">Fashion Promo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link f-footer-new" href="#">Fashion Sale</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link f-footer-new" href="#">Hot Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link f-footer-new" href="#">Produk Baru</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 f-margin-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link f-footer-new" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link f-footer-new" href="#">Syarat & Ketentuan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link f-footer-new" href="#">Konfirmasi Pembayaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link f-footer-new" href="#">Status Order</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container f-margin-nav">
        <hr class="f-hr-footer">
        <div class="text-center">
            <h6 class="f-font-footer">Ikuti Kami</h6>
            <a href=""><i class="fa fa-facebook fa-lg f-sosmed"></i></a>
            <a href=""><i class="fa fa-twitter fa-lg f-sosmed"></i></a>
            <a href=""><i class="fa fa-instagram fa-lg f-sosmed"></i></a>
            <a href=""><i class="fa fa-thumbs-o-up fa-lg f-sosmed"></i></a>
        </div>
    </div>
</div>
<div class="container-fluid text-center clear-footer" role="alert">
    &copy; Copyright Fashion Grosir 2018 | Develop By. <a href="" class="alert-link f-footer-link">EazyDevTeam</a>
    <!-- <a href="" class="btn btn-danger"><i class="glyphicon glyphicon-love"></i></a> -->
</div>
<!-- End Footer -->



<script>
    // ------------------------------------------------------ //
    // Format Rupiah
    // ------------------------------------------------------ //
    var moneyFormat = wNumb({
        mark: ',',
        decimals: 2,
        thousand: '.',
        prefix: 'Rp. ',
        suffix: ''
    });

    $(document).ready(function () {
        $('[id="rupiah"]').each(function (index) {
            var value = parseInt($(this).html()),
                hasil = moneyFormat.to(value);

            $(this).html(hasil);
        })
    });
</script>
</body>
</html>