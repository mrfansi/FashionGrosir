<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <br>
    <!-- Content -->
    <!-- SHOP -->
    <div class="container f-padding">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb f-hover">
                        <li class="breadcrumb-item">
                            <a href="<?= site_url('/'); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="#">Pencarian "<?= $this->input->get('keyword'); ?>"</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <?php if (isset($keywords) && $keywords != NULL): ?>
                <?php foreach ($keywords as $keyword): ?>
                    <?php $stok = $qty($keyword->i_kode); ?>
                    <?php if ($stok > 1): ?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="thumbnail"
                                 data-url="<?= site_url('produk-terbaru/' . $keyword->i_url . '/detil'); ?>">
                                <?php if ($item_img($keyword->i_kode) != NULL): ?>
                                    <img class="img-fluid"
                                         src="data:<?= $item_img($keyword->i_kode)->ii_type . ';base64,' . (base64_encode($item_img($keyword->i_kode)->ii_data)); ?>"
                                         alt="<?= $item_img($keyword->i_kode)->ii_kode; ?>">
                                <?php else: ?>
                                    <img class="img-fluid" src="<?= base_url('assets/img/noimg.png'); ?>"
                                         alt="No Image">
                                <?php endif; ?>
                                <div class="col-12 col-md-12 col-sm-12 text-center">
                                    <h6 id="title" class="mt-2"><?= $keyword->i_nama; ?></h6>
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
                                        <p id="rupiah" class="mt-1 price"><?= $keyword->i_hrg_vip; ?></p>
                                    <?php else: ?>
                                        <p id="rupiah"
                                           class="mt-1 align-middle price"><?= $keyword->i_hrg_reseller; ?></p>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col">
                    <p>Tidak ada item yang ditampilkan</p>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <script>
        $('[id="title"]').ellipsis();
    </script>
<?php
include "layout/Footer.php";
?>