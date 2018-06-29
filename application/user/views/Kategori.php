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
            <?php if (isset($kategori->item_kategori) && $kategori->item_kategori != NULL): ?>
                <?php foreach ($kategori->item_kategori as $kat): ?>

                    <?php $stok = $qty($kat->i_kode); ?>
                    <?php if ($stok >= 1): ?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3">
                            <div class="thumbnail">
                                <?php if ($item_img($kat->i_kode) != NULL): ?>
                                    <img class="img-fluid"
                                         src="<?= base_url('upload/' . $item_img($kat->i_kode)->ii_nama); ?>"
                                         alt="<?= $item_img($kat->i_kode)->ii_nama; ?>">
                                <?php else: ?>
                                    <img class="img-fluid" src="<?= base_url('assets/img/noimg.png'); ?>"
                                         alt="No Image">
                                <?php endif; ?>
                                <h4 id="title" class="mt-2"><?= $item_kategori($kat->k_kode)->item->i_nama; ?></h4>
                                <div class="ratings">
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </div>
                                <p tooltip title="<?= $item_kategori($kat->k_kode)->item->i_deskripsi; ?>"
                                   id="title"><?= $item_kategori($kat->k_kode)->item->i_deskripsi; ?></p>
                                <hr class="line">
                                <div class="row">
                                    <div class="col-6 col-md-6 col-sm-6">
                                        <?php if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == '1'): ?>
                                            <p id="rupiah"
                                               class="mt-1 price"><?= $item_kategori($kat->k_kode)->item->i_hrg_vip; ?></p>
                                        <?php else: ?>
                                            <p id="rupiah"
                                               class="mt-1 align-middle price"><?= $item_kategori($kat->k_kode)->item->i_hrg_reseller; ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6">
                                        <a class="btn btn-primary btn-sm r-btn-pink right"
                                           href="<?= site_url('kategori/' . $kategori->k_url . '/item/' . $item_kategori($kat->k_kode)->item->i_url . '/detil'); ?>">
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