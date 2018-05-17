<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <!-- Content -->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb f-no-background">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pakaian</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pria</li>
            </ol>
        </nav>

        <div class="row">
            <?php if (isset($item) && $item != NULL): ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="fotorama"
                         data-nav="thumbs"
                         data-arrows="true"
                         data-click="false"
                         data-swipe="true">
                        <?php if (isset($item->item_img) && $item->item_img != NULL): ?>
                            <?php foreach ($item->item_img as $img): ?>
                                <img src="<?= base_url('upload/' . $img->ii_nama); ?>" class="img-thumbnail f-img-detail">
                            <?php endforeach; ?>
                        <?php else: ?>
                            <img src="<?= base_url('assets/img/noimg.png'); ?>" class="img-thumbnail f-img-detail">
                        <?php endif; ?>
                    </div>

                </div>
                <form action="<?= site_url('item/' . $item->ide_kode . '/add_to_cart'); ?>" method="post" class="col-lg-8">
                    <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">
                    <h1 class="f-title-detail"><?= $item->item->i_nama; ?></h1>
                    <hr>
                    <p class="f-font-detail"><?= $item->item->i_deskripsi; ?></p>
                    <div class="row">
                        <div class="col-6">
                            <p><i class="fa fa-check fa-lg f-icon-margin f-font-detail"></i>Kondisi : Baru</p>
                            <p><i class="fa fa-cube fa-lg f-icon-margin f-font-detail"></i>Berat : 1kg</p>
                            <p><i class="fa fa-dropbox fa-lg f-icon-margin f-font-detail"></i>Min. Pesanan : 1pcs</p>
                        </div>
                        <div class="col-6">
                            <p><i class="fa fa-square fa-lg f-icon-margin f-font-detail"></i>Warna
                                : <?= $item->warna->w_nama; ?></p>
                            <p><i class="fa fa-thumb-tack fa-lg f-icon-margin f-font-detail"></i>Ukuran
                                : <?= $item->ukuran->u_nama; ?></p>
                            <p><i class="fa fa-tags fa-lg f-icon-margin f-font-detail"></i>Seri</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h1 id="rupiah"
                                class="f-harga"><?= isset($_SESSION['vip']) && $_SESSION['vip'] == 1 ? $item->item->i_hrg_vip : $item->item->i_hrg_reseller; ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h5>Stok <?= $qty($item->ide_kode); ?> pcs</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label for="qty">Jumlah</label>
                            <input type="number" name="qty" min="1" class="form-control" id="qty" value="1">
                        </div>
                        <div class="col-6">
                            <a href="add_to_cart"
                               class="btn btn-primary btn-lg btn-block f-button-font f-button-detail">Tambah</a>
                        </div>
                    </div>
                </form>
            <?php else: ?>
            <div class="col">
                <h2 class="text-center text-muted">Item tidak ditemukan</h2>

            </div>
            <?php endif; ?>
        </div>

        <!-- End Content -->
        <br>
    </div>

    <div class="container">
        <hr>
        <h5 class="f-title-color f-title-margin">Hot Item <i
                    class="fa fa-angle-right fa-lg f-icon-margin f-font-detail"></i></h5>
        <div class="row">
            <?php foreach ($this->item_detil->with_item()->with_item_img()->limit(5)->get_all() as $hot): ?>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="card f-bottom">
                        <a href="<?= site_url('item/' . $hot->ide_kode . '/detil'); ?>">
                            <?php if (isset($hot->item_img) && $hot->item_img->ii_nama != NULL): ?>
                                <img class="card-img-top"
                                     src="<?= base_url('upload/' . $hot->item_img->ii_nama); ?>"
                                     alt="Card image cap">
                            <?php else: ?>
                                <img class="card-img-top" src="<?= base_url('assets/img/noimg.png'); ?>"
                                     alt="Card image cap">
                            <?php endif; ?>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title f-hot-font"><?= $hot->item->i_nama; ?></h5>
                            <?php if (isset($_SESSION['vip']) && $_SESSION['vip'] == '1'): ?>
                                <p id="rupiah" class="card-text f-title-harga"><?= $hot->item->i_hrg_vip; ?></p>
                            <?php else: ?>
                                <p id="rupiah" class="card-text f-title-harga"><?= $hot->item->i_hrg_reseller; ?></p>
                            <?php endif; ?>
                            <!-- <a href="#" class="btn btn-primary f-button-font">Tambah Ke Keranjang</a> -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php
include "layout/Footer.php";
?>