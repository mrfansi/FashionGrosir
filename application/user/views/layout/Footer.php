<!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="cart"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>

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
                        <?php if ($menu_kategori != NULL): ?>
                            <?php foreach ($menu_kategori as $menukat): ?>
                                <li class="nav-item">
                                    <a class="nav-link f-footer-new"
                                       href="<?= site_url('kategori/' . $menukat->kategori->k_url); ?>"><?= $menukat->kategori->k_nama; ?></a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
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

<div id="pop_cart" style="display: none">
    <?php
    $p_kode = isset($_SESSION['id']) ? $_SESSION['id'] : '';
    $pop_carts = $this->cart->where_p_kode($p_kode)->get_all();
    if ($pop_carts): ?>
        <table class="table table-sm table-borderless">
            <thead>
            <tr>
                <th scope="col" colspan="2">Item</th>
                <th scope="col">QTY</th>
                <th scope="col"></th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($pop_carts as $pop_cart): ?>
                <tr>
                    <td>
                        <img src="<?= base_url('upload/' . $item_img($item_detil($pop_cart->ide_kode)->item->i_kode)->ii_nama); ?>"
                             alt="" width="50" height="50">
                    </td>
                    <td id="title"><?= $item_detil($pop_cart->ide_kode)->item->i_nama; ?></td>
                    <td>x <?= $pop_cart->ca_qty; ?></td>
                    <td id="rupiah"><?= $pop_cart->ca_tharga; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="2">
                </th>
                <th>Total :</th>
                <th>
                    <div id="rupiah"><?= $cart_total($p_kode); ?></div>
                </th>
            </tr>
            </tfoot>
        </table>
        <a class="btn btn-primary btn-sm r-btn-pink btn-block" href="<?= site_url('cart'); ?>">Check Out</a>
    <?php else: ?>
        <p>Tidak ada item di keranjang.</p>
    <?php endif; ?>
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

    $('[id="rupiah"]').each(function (index) {
        var value = parseInt($(this).html()),
            hasil = moneyFormat.to(value);

        $(this).html(hasil);
    });
</script>
<script>
    $('[tooltip]').tooltip();
</script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover({
            container: 'body',
            trigger: 'focus',
            content: $('#pop_cart').html(),
            html: true
        })
    })
</script>
<script>
    $('[id="title"]').ellipsis();
</script>
<?php if (isset($_SESSION['modal'])): ?>
    <script>
        $('#cart').modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
        $('#cart > div > div > div.modal-body').load('<?= site_url('cart/modal_cart'); ?>');
    </script>
<?php endif; ?>
</body>
</html>