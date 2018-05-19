<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <br>
    <!-- Content -->
    <!-- SHOP -->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= site_url('/'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?= $breadcumburl; ?>"><?= $breadcumb; ?></a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <?php if (isset($kats) && $kats != NULL): ?>
                <?php foreach ($kats as $kat): ?>
                    <?php if (isset($kat->item) && isset($kat->kategori) && $kat->item != NULL): ?>
                        <?php $stok = $qty($kat->item->i_kode); ?>
                        <?php if ($stok > 1): ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="card f-bottom">
                                    <a href="<?= site_url('kategori/' . $kat->kategori->k_url . '/item/' . $kat->item->i_url . '/detil'); ?>">
                                        <?php if ($item_img($kat->item->i_kode) != NULL): ?>
                                            <img class="card-img-top"
                                                 src="<?= base_url('upload/' . $item_img($kat->item->i_kode)->ii_nama); ?>"
                                                 alt="Card image cap">
                                        <?php else: ?>
                                            <img class="card-img-top"
                                                 src="<?= base_url('assets/img/noimg.png'); ?>"
                                                 alt="Card image cap">
                                        <?php endif; ?>
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $kat->item->i_nama; ?></h5>
                                        <?php if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == '1'): ?>
                                            <p id="rupiah"
                                               class="card-subtitle mb-2 text-muted"><?= $kat->item->i_hrg_vip; ?></p>
                                        <?php else: ?>
                                            <p id="rupiah"
                                               class="card-subtitle mb-2 text-muted"><?= $kat->item->i_hrg_reseller; ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada item yang ditampilkan</p>
            <?php endif; ?>

        </div>
    </div>

<?php
include "layout/Footer.php";
?>