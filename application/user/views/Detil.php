s<?php
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
                        <img src="https://upload.wikimedia.org/wikipedia/commons/archive/a/ac/20121003093557%21No_image_available.svg"
                             class="card-img-top">
                    <?php endif; ?>
                </div>

            </div>
            <form action="add_to_cart" method="post" class="col-lg-7">
                <input type="hidden" name="ecommerce_eazy" value="<?= $this->security->get_csrf_hash(); ?>">
                <h2><?= $item->i_nama; ?></h2>
                <hr>
                <div class="row mb-2 mt-2">
                    <div class="col">
                        <div class="f-font-detail"><?= $item->i_deskripsi; ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col">
                                <p>
                                    <b>Berat</b><br>
                                    <?= $item->i_berat; ?> Gram
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>
                                    <b>Kategori</b><br>
                                    <?= print_r($kategori($item->i_kode)); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-4">
                        <input type="hidden" name="harga"
                               value="<?= isset($_SESSION['tipe']) && $_SESSION['tipe'] == 1 ? $item->i_hrg_vip : $item->i_hrg_reseller; ?>">
                        <h1 id="rupiah"
                            class="f-harga"><?= isset($_SESSION['tipe']) && $_SESSION['tipe'] == 1 ? $item->i_hrg_vip : $item->i_hrg_reseller; ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-12 col-sm-6 col-md-5 col-lg-6">
                        <label for="wu"></i>Warna - Ukuran</label>
                        <select name="wu" id="wu" class="form-control" required>
                            <?php foreach ($item_detil_with_item_all($item->i_kode) as $id): ?>
                                <option data-qty="<?= $qty_detil($id->item_detil_kode); ?>"
                                        value="<?= $id->item_detil_kode; ?>">
                                    <?= $id->warna->w_nama; ?> -
                                    <?= $id->item_detil_ukuran ?>
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
                    <div class="col-12 col-sm-10 col-md-9 col-lg-10">
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

<div class="container f-padding">
    <hr>
    <h5>Hot Item</h5>
    <div class="row">
        <?php foreach ($this->item->with_item_img('where:ii_default =1')->limit(5)->get_all() as $hot): ?>
            <div class="col-12 col-sm-6  col-md-4 col-lg-4 col-xl-3 mb-3">
                <div class="thumbnail"
                     data-url="<?= site_url('hot-item/' . $hot->i_url . '/detil'); ?>">
                    <div class="image mx-auto d-block">

                        <?php if ($item_img($hot->i_kode) != NULL): ?>
                            <img class="img-fluid" src="<?= base_url('upload/' . $item_img($hot->i_kode)->ii_nama); ?>"
                                 alt="<?= $item_img($hot->i_kode)->ii_nama; ?>">
                        <?php else: ?>
                            <img class="img-fluid"
                                 src="https://upload.wikimedia.org/wikipedia/commons/archive/a/ac/20121003093557%21No_image_available.svg"
                                 alt="No Image">
                        <?php endif; ?>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 text-center">
                        <h6 id="title" class="mt-2"><?= $hot->i_nama; ?></h6>
                    </div>

                    <div class="ratings">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                    </div>
                    <hr class="mb-2 mt-0">
                    <div class="col-12 col-md-12 col-sm-12 text-center">
                        <?php if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == '1'): ?>
                            <p id="rupiah" class="mt-1 price"><?= $hot->i_hrg_vip; ?></p>
                        <?php else: ?>
                            <p id="rupiah" class="mt-1 align-middle price"><?= $hot->i_hrg_reseller; ?></p>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    $(document).ready(function () {
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
    });
</script>
<script>
    $(document).ready(function () {
        var options = $('#wu option');
        var arr = options.map(function (_, o) {
            return {t: $(o).text(), v: o.value, q: $(o).attr('data-qty')};
        }).get();
        arr.sort(function (o1, o2) {
            var t1 = o1.t.toLowerCase(), t2 = o2.t.toLowerCase();

            return t1 > t2 ? 1 : t1 < t2 ? -1 : 0;
        });
        options.each(function (i, o) {
            o.value = arr[i].v;
            $(o).text(arr[i].t);
            $(o).attr('data-qty', arr[i].q);
        });
        $("#wu").prepend("<option value='' selected='selected'>Pilih warna & ukuran</option>");
    })
</script>
<?php
include "layout/Footer.php";
?>


