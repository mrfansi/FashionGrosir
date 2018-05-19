<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <!-- Content -->
    <div class="container">
        <br>
        <br>
        <div class="row">
            <?php if (isset($item) && $item != NULL): ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="fotorama"
                         data-nav="thumbs"
                         data-arrows="true"
                         data-click="false"
                         data-swipe="true">
                        <?php if ($item_img($item->i_kode) != NULL): ?>
                            <?php foreach ($item_img($item->i_kode) as $img): ?>
                                <img src="<?= base_url('upload/' . $img->ii_nama); ?>" class="img-thumbnail f-img-detail">
                            <?php endforeach; ?>
                        <?php else: ?>
                            <img src="<?= base_url('assets/img/noimg.png'); ?>" class="img-thumbnail f-img-detail">
                        <?php endif; ?>
                    </div>

                </div>
                <form action="<?= site_url('item/' . $item->i_url . '/add_to_cart'); ?>" method="post" class="col-lg-8">
                    <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">
                    <h1 class="f-title-detail"><?= $item->i_nama; ?></h1>
                    <hr>
                    <p class="f-font-detail"><?= $item->i_deskripsi; ?></p>
                    <div class="row">
                        <div class="col-6">
                            <p><i class="fa fa-check fa-lg f-icon-margin f-font-detail"></i>Kondisi : Baru</p>
                            <p><i class="fa fa-cube fa-lg f-icon-margin f-font-detail"></i>Berat : 1kg</p>
                            <p><i class="fa fa-dropbox fa-lg f-icon-margin f-font-detail"></i>Min. Pesanan : 1pcs</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h1 id="rupiah"
                                class="f-harga"><?= isset($_SESSION['tipe']) && $_SESSION['tipe'] == 1 ? $item->i_hrg_vip : $item->i_hrg_reseller; ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h5>Total Stok : <?= $qty($item->i_kode); ?> pcs</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="wu">Warna [Ukuran]</label>
                            <select name="wu" id="wu" class="form-control" required>
                                <?php foreach ($item_detil($item->i_kode) as $id): ?>
                                    <option value="<?= $id->ide_kode; ?>"><?= $id->warna->w_nama; ?> [<?= $id->ukuran->u_nama; ?>]</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-2">
                            <label for="qty">Jumlah</label>
                            <input type="number" name="qty" min="1" class="form-control" id="qty" value="1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-lg btn-block f-button-font f-button-detail">Tambah</button>
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
            <?php foreach ($this->item->with_item_img('where:ii_default =1')->limit(5)->get_all() as $hot): ?>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="card f-bottom">
                        <a href="<?= site_url('item/' . $hot->i_url . '/detil'); ?>">
                            <?php if (isset($hot->item_img) && $hot->item_img != NULL): ?>
                                <img class="card-img-top"
                                     src="<?= base_url('upload/' . $hot->item_img->ii_nama); ?>"
                                     alt="Card image cap">
                            <?php else: ?>
                                <img class="card-img-top" src="<?= base_url('assets/img/noimg.png'); ?>"
                                     alt="Card image cap">
                            <?php endif; ?>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title f-hot-font"><?= $hot->i_nama; ?></h5>
                            <?php if (isset($_SESSION['vip']) && $_SESSION['vip'] == '1'): ?>
                                <p id="rupiah" class="card-text f-title-harga"><?= $hot->i_hrg_vip; ?></p>
                            <?php else: ?>
                                <p id="rupiah" class="card-text f-title-harga"><?= $hot->i_hrg_reseller; ?></p>
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