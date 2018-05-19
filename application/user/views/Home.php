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
            <?php if (isset($items) && $items != NULL): ?>
                <?php foreach ($items as $item): ?>
                    <?php $stok = $qty($item->i_kode); ?>
                    <?php if ($stok > 1): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card f-bottom">
                            <a href="<?= site_url('item/' . $item->i_url . '/detil'); ?>">
                                <?php if ($item_img($item->i_kode) != NULL): ?>
                                    <img class="card-img-top"
                                         src="<?= base_url('upload/' . $item_img($item->i_kode)->ii_nama); ?>"
                                         alt="Card image cap">
                                <?php else: ?>
                                    <img class="card-img-top" src="<?= base_url('assets/img/noimg.png'); ?>"
                                         alt="Card image cap">
                                <?php endif; ?>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><?= $item->i_nama; ?></h5>
                                <?php if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == '1'): ?>
                                    <p id="rupiah"
                                       class="card-subtitle mb-2 text-muted"><?= $item->i_hrg_vip; ?></p>
                                <?php else: ?>
                                    <p id="rupiah"
                                       class="card-subtitle mb-2 text-muted"><?= $item->i_hrg_reseller; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada item yang ditampilkan</p>
            <?php endif; ?>
            <br>
        </div>
    </div>
    <!-- End Content -->
    <script>
        $(window).load(function () {
            $('#cart').modal('show');
        });
    </script>
<?php
include "layout/Footer.php";
?>