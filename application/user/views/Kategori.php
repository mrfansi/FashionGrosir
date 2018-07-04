<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <br>
    <!-- Content -->
    <!-- SHOP -->
    <div class="container-fluid f-padding">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb f-hover">
                <li class="breadcrumb-item">
                    <a href="<?= site_url('/'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?= $breadcumburl; ?>"><?= $breadcumb; ?></a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid f-padding">
        <div class="row">
            <?php if (isset($item_kategori) && $item_kategori != NULL): ?>
                <?php foreach ($item_kategori as $kat): ?>

                    <?php $stok = $qty($kat->item->i_kode); ?>
                    <?php if ($stok >= 1): ?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3">
                            <div class="thumbnail">
                                <div class="image mx-auto d-block">
                                    <?php if ($item_img($kat->item->i_kode) != NULL): ?>
                                        <img class="img-fluid"
                                             src="<?= base_url('upload/' . $item_img($kat->item->i_kode)->ii_nama); ?>"
                                             alt="<?= $item_img($kat->item->i_kode)->ii_nama; ?>">
                                    <?php else: ?>
                                        <img class="img-fluid"
                                             src="https://upload.wikimedia.org/wikipedia/commons/archive/a/ac/20121003093557%21No_image_available.svg"
                                             alt="No Image">
                                    <?php endif; ?>
                                </div>
                                <h4 id="title" class="mt-2"><?= $kat->item->i_nama; ?></h4>
                                <div class="ratings">
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </div>
                                <p tooltip title="<?= $kat->item->i_deskripsi; ?>"
                                   id="title"><?= $kat->item->i_deskripsi; ?></p>
                                <hr class="line">
                                <div class="row">
                                    <div class="col-7 col-md-7 col-sm-7">
                                        <?php if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == '1'): ?>
                                            <p id="rupiah"
                                               class="mt-1 price"><?= $kat->item->i_hrg_vip; ?></p>
                                        <?php else: ?>
                                            <p id="rupiah"
                                               class="mt-1 align-middle price"><?= $kat->item->i_hrg_reseller; ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-5 col-md-5 col-sm-5">
                                        <a class="btn btn-primary btn-sm r-btn-pink right"
                                           href="<?= site_url('kategori/' . $k_url . '/item/' . $kat->item->i_url . '/detil'); ?>">
                                            <i class="fa fa-shopping-cart"></i> Beli
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada item yang ditampilkan</p>
            <?php endif; ?>

        </div>
    </div>
    <script>
        $('[id="title"]').ellipsis();
    </script>
<?php
include "layout/Footer.php";
?>