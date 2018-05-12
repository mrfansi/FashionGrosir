<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
include "layout/Slide.php";
?>
    <br>
    <!-- Title Content -->
    <div class="container">
        <h5 class="f-title-color">Produk Baru</h5>
        <hr>
    </div>
    <!-- Title Content -->

    <!-- Content -->
    <div class="container">
        <div class="row">
            <?php foreach ($items as $item): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card f-bottom">
                        <?php if ($item->ii_nama != NULL): ?>
                            <img class="card-img-top" src="<?= base_url('upload/' . $item->ii_nama); ?>"
                                 alt="Card image cap">
                        <?php else: ?>
                            <img class="card-img-top" src="<?= base_url('assets/img/noimg.png'); ?>"
                                 alt="Card image cap">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= $item->i_nama; ?></h5>
                            <?php if (isset($_SESSION['vip']) && $_SESSION['vip'] == '1'): ?>
                                <p id="rupiah" class="card-text f-title-harga"><?= $item->i_hrg_vip; ?></p>
                            <?php else: ?>
                                <p id="rupiah" class="card-text f-title-harga"><?= $item->i_hrg_reseller; ?></p>
                            <?php endif; ?>
                            <a href="#" class="btn btn-primary f-button-font">Tambah Ke Keranjang</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <br>
        </div>
    </div>
    <!-- End Content -->

<?php
include "layout/Footer.php";
?>