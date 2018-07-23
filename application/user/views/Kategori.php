<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <br>
    <!-- Content -->
    <!-- SHOP -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                <h6 class="card-title mb-2 text-left r-title-kat">KATEGORI</h6>
                <?php if ($menu_kategori != NULL): ?>
                    <ul class="nav flex-column c-ul-footer">
                        <?php foreach ($menu_kategori as $menukat): ?>

                                <a class="r-item-kat mb-1" href="<?= site_url('kategori/' . $menukat->k_url); ?>">
                                    <?= $menukat->k_nama; ?>
                                </a>

                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Tidak ada kategori</p>
                <?php endif; ?>
            </div>

            <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb f-hover r-title-kat">
                        <li class="breadcrumb-item">
                            <a href="<?= site_url('/'); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="<?= $breadcumburl; ?>"><?= $breadcumb; ?></a>
                        </li>
                    </ol>
                </nav>
                <div class="row">
                    <?php if (isset($item_kategori) && $item_kategori != NULL): ?>
                        <?php foreach ($item_kategori as $kat): ?>

                            <?php $stok = $qty($kat->item->i_kode); ?>
                            <?php if ($stok >= 1): ?>
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3 mb-3">
                                    <div class="thumbnail"
                                         data-url="<?= site_url('kategori/' . $k_url . '/' . $kat->item->i_url . '/detil'); ?>">
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
                                        <h6 id="title" class="mt-2"><?= $kat->item->i_nama; ?></h6>
                                        <div class="ratings">
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star-empty"></span>
                                        </div>
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
                                                   href="<?= site_url('kategori/' . $k_url . '/' . $kat->item->i_url . '/detil'); ?>">
                                                    <i class="fa fa-shopping-cart"></i> Beli
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 mb-3">
                            <p>Tidak ada item yang ditampilkan</p>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <script>
        $('[id="title"]').ellipsis();
    </script>
<?php
include "layout/Footer.php";
?>