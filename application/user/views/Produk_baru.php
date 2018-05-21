<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <br>
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

    <!-- Content -->
    <div class="container">
        <div class="row">
            <?php if ($terbaru_items() != NULL): ?>
                <?php foreach ($terbaru_items() as $terbaru): ?>
                    <?php $stok = $qty($terbaru->i_kode); ?>
                    <?php if ($stok > 1): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card f-bottom">
                            <a href="<?= site_url('produk-terbaru/item/' . $terbaru->i_url . '/detil'); ?>">
                                <?php if ($item_img($terbaru->i_kode) != NULL): ?>
                                    <img class="card-img-top"
                                         src="<?= base_url('upload/' . $item_img($terbaru->i_kode)->ii_nama); ?>"
                                         alt="Card image cap">
                                <?php else: ?>
                                    <img class="card-img-top" src="<?= base_url('assets/img/noimg.png'); ?>"
                                         alt="Card image cap">
                                <?php endif; ?>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><a tooltip title="<?= $terbaru->i_nama; ?>" id="title" href="<?= site_url('produk-terbaru/item/' . $terbaru->i_url . '/detil'); ?>"><?= $terbaru->i_nama; ?></a></h5>
                                <?php if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == '1'): ?>
                                    <h6 id="rupiah"
                                       class="card-subtitle mb-2 text-muted"><?= $terbaru->i_hrg_vip; ?></h6>
                                <?php else: ?>
                                    <h6 id="rupiah"
                                       class="card-subtitle mb-2 text-muted"><?= $terbaru->i_hrg_reseller; ?></h6>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada item yang ditampilkan</p>
            <?php endif; ?>
            <br>
        </div>
    </div>
    <!-- End Content -->
    <script>
        $('[id="title"]').ellipsis();
    </script>
<?php
include "layout/Footer.php";
?>