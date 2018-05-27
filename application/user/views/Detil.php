<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <!-- Content -->
    <div class="container-fluid">
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb f-hover">
                <li class="breadcrumb-item">
                    <a href="<?= site_url('/'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= $breadcumburl; ?>"><?= $breadcumb; ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?= $breadcumburl1; ?>"><?= $breadcumb1; ?></a>
                </li>
            </ol>
        </nav>
        <div class="row">
            <?php if (isset($item) && $item != NULL): ?>
                <div class="col-lg-5 col-md-6 col-sm-12 col-12">
                    <div class="fotorama"
                         data-fit="cover"
                         data-navposition="bottom"
                         data-transition="dissolve"
                         data-nav="thumbs"
                         data-allowfullscreen="native"
                         data-width="600"
                         data-height="400">
                        <?php if ($item_img_all($item->i_kode) != NULL): ?>
                            <?php foreach ($item_img_all($item->i_kode) as $img): ?>
                                <img src="<?= base_url('upload/' . $img->ii_nama); ?>" class="card-img-top">
                            <?php endforeach; ?>
                        <?php else: ?>
                            <img src="<?= base_url('assets/img/noimg.png'); ?>" class="card-img-top">
                        <?php endif; ?>
                    </div>

                </div>
                <form action="add_to_cart" method="post" class="col-lg-7">
                    <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">
                    <h2><?= $item->i_nama; ?></h2>
                    <hr>
                    <p class="f-font-detail"><?= $item->i_deskripsi; ?></p>
                    <div class="row">
                        <div class="col-6">
                            <p><i class="fa fa-check fa-lg f-icon-margin f-font-detail"></i>Kondisi : Baru</p>
                            <p><i class="fa fa-cube fa-lg f-icon-margin f-font-detail"></i>Berat : 1gr</p>
                            <p><i class="fa fa-dropbox fa-lg f-icon-margin f-font-detail"></i>Min. Pesanan : 1pcs</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="harga" value="<?= isset($_SESSION['tipe']) && $_SESSION['tipe'] == 1 ? $item->i_hrg_vip : $item->i_hrg_reseller; ?>">
                            <h1 id="rupiah"
                                class="f-harga"><?= isset($_SESSION['tipe']) && $_SESSION['tipe'] == 1 ? $item->i_hrg_vip : $item->i_hrg_reseller; ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="wu">Warna - Ukuran - QTY</label>
                            <select name="wu" id="wu" class="form-control" required>
                                <?php foreach ($item_detil_with_item_all($item->i_kode) as $id): ?>
                                    <option value="<?= $id->ide_kode; ?>">
                                        <?= $id->warna->w_nama; ?> -
                                        <?= $id->ukuran->u_nama; ?> -
                                        <?= $qty_detil($id->ide_kode); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-2">
                            <label for="qty">Jumlah</label>
                            <input type="number" name="qty" min="1" class="form-control" id="qty" value="1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="submit"
                                    class="btn btn-primary btn-lg btn-block f-button-font f-button-detail">Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </form>
            <?php else: ?>
                <div class="col">
                    <h2 class="text-center text-muted">Item tidak ditemukan</h2>

                </div>
            <?php endif; ?>

        </div>
    </div>

    <!-- End Content -->
    <br>

    <div class="container-fluid">
        <hr>
        <h5>Hot Item</h5>
        <div class="row">
            <?php foreach ($this->item->with_item_img('where:ii_default =1')->limit(5)->get_all() as $hot): ?>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="card f-bottom">
                        <a href="<?= site_url('hot-item/' . $hot->i_url . '/detil'); ?>">
                            <?php if (isset($hot->item_img) && $hot->item_img != NULL): ?>
                                <?php foreach ($hot->item_img as $img): ?>
                                <img class="card-img-top"
                                     src="<?= base_url('upload/' . $img->ii_nama); ?>"
                                     alt="Card image cap">
                                <?php endforeach; ?>
                            <?php else: ?>
                                <img class="card-img-top" src="<?= base_url('assets/img/noimg.png'); ?>"
                                     alt="Card image cap">
                            <?php endif; ?>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title f-hot-font"><a title="<?= $hot->i_nama; ?>" id="title" href="<?= site_url('hot-item/' . $hot->i_url . '/detil'); ?>"><?= $hot->i_nama; ?></a></h5>
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
    <script>
        $('[id="title"]').ellipsis();
    </script>
<?php
include "layout/Footer.php";
?>