<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <!-- Content -->
    <div class="container">
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
                <div class="col-lg-5 col-md-6 col-sm-12 col-12 mb-4">
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
                        <div class="col-lg-12">
                            <p><i class="fa fa-check fa-lg f-icon-margin f-font-detail"></i>Kondisi : Baru</p>
                            <p><i class="fa fa-cube fa-lg f-icon-margin f-font-detail"></i>Berat
                                : <?= $item->i_berat; ?> Gr</p>
                            <p><i class="fa fa-dropbox fa-lg f-icon-margin f-font-detail"></i>Min. Pesanan : 1pcs</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-4">
                            <input type="hidden" name="harga" value="<?= isset($_SESSION['tipe']) && $_SESSION['tipe'] == 1 ? $item->i_hrg_vip : $item->i_hrg_reseller; ?>">
                            <h1 id="rupiah"
                                class="f-harga"><?= isset($_SESSION['tipe']) && $_SESSION['tipe'] == 1 ? $item->i_hrg_vip : $item->i_hrg_reseller; ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-12 col-sm-4 col-md-3 col-lg-4">
                            <label for="wu"></i>Warna - Ukuran</label>
                            <select name="wu" id="wu" class="form-control" required>
                                <option data-qty="0" value="">Pilih Warna & Ukuran</option>
                                <?php foreach ($item_detil_with_item_all($item->i_kode) as $id): ?>
                                    <option data-qty="<?= $qty_detil($id->ide_kode); ?>" value="<?= $id->ide_kode; ?>">
                                        <?= $id->warna->w_nama; ?> -
                                        <?= $id->ukuran->u_nama; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-2 col-12 col-sm-2 col-md-2 col-lg-2">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" value="0" disabled>
                        </div>
                        <div class="mb-2 col-12 col-sm-2 col-md-2 col-lg-2">
                            <label for="qty">Jumlah</label>
                            <input type="number" name="qty" min="1" class="form-control" id="qty" value="1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-8 col-md-7 col-lg-8">
                            <label id="check"></label>
                        </div>
                        <div class="col-12 col-sm-8 col-md-7 col-lg-8">
                            <button type="submit"
                                    class="btn btn-primary btn-lg btn-block f-button-font">Tambah ke Keranjang
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

    <div class="container-fluid f-padding">
        <hr>
        <h5>Hot Item</h5>
        <div class="row">
            <?php foreach ($this->item->with_item_img('where:ii_default =1')->limit(5)->get_all() as $hot): ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="thumbnail">
                        <?php if ($item_img($hot->i_kode) != NULL): ?>
                            <img class="img-fluid" src="<?= base_url('upload/' . $item_img($hot->i_kode)->ii_nama); ?>"
                                 alt="<?= $item_img($hot->i_kode)->ii_nama; ?>">
                        <?php else: ?>
                            <img class="img-fluid" src="<?= base_url('assets/img/noimg.png'); ?>" alt="No Image">
                        <?php endif; ?>
                        <h4 id="title"><?= $hot->i_nama; ?></h4>
                        <div class="ratings">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </div>
                        <p tooltip title="<?= $hot->i_deskripsi; ?>" id="title"><?= $hot->i_deskripsi; ?></p>
                        <hr class="line">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <?php if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == '1'): ?>
                                    <p id="rupiah" class="mt-1 price"><?= $hot->i_hrg_vip; ?></p>
                                <?php else: ?>
                                    <p id="rupiah" class="mt-1 align-middle price"><?= $hot->i_hrg_reseller; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <a class="btn btn-primary btn-sm r-btn-pink right"
                                   href="<?= site_url('produk-terbaru/item/' . $hot->i_url . '/detil'); ?>">
                                    <i class="fa fa-shopping-cart"></i> Beli
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        $('[id="title"]').ellipsis();
    </script>
    <script>
        $('#wu').change(function () {
            var qty = $(this).find(':selected').data('qty');
            var value = $(this).val();
            $.when(
                $('#stok').val(qty),
                $('#qty').attr('max', qty)
            );
            if (qty === 0 && value !== '') {
                $('body > div.container > div > form > div:nth-child(8) > div:nth-child(2)').removeClass('mt-3');
                $('#check').show()
                    .removeClass('text-success')
                    .addClass('text-danger')
                    .html('Stok habis');
            } else if (qty > 0 && value !== '') {
                $('body > div.container > div > form > div:nth-child(8) > div:nth-child(2)').removeClass('mt-3');
                $('#check').show()
                    .removeClass('text-danger')
                    .addClass('text-success')
                    .html('Stok tersedia');
            } else {
                $('body > div.container > div > form > div:nth-child(8) > div:nth-child(2)').addClass('mt-3');
                $('#check').hide();
            }
        })
    </script>
<?php
include "layout/Footer.php";
?>