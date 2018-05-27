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
                    <a href="#">Pencarian "<?= $this->input->get('cari'); ?>"</a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid f-padding">
        <div class="row">
            <?php if (isset($cari_s) && $cari_s != NULL): ?>
                <?php foreach ($cari_s as $cari): ?>
                    <?php $stok = $qty($cari->i_kode); ?>
                    <?php if ($stok > 1): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="card f-bottom">
                                <a href="<?= site_url('item/' . $cari->i_url . '/detil'); ?>">
                                    <?php if ($item_img($cari->i_kode) != NULL): ?>
                                        <img class="card-img-top"
                                             src="<?= base_url('upload/' . $item_img($cari->i_kode)->ii_nama); ?>"
                                             alt="Card image cap">
                                    <?php else: ?>
                                        <img class="card-img-top"
                                             src="<?= base_url('assets/img/noimg.png'); ?>"
                                             alt="Card image cap">
                                    <?php endif; ?>
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><a tooltip title="<?= $cari->i_nama; ?>" id="title"
                                                              href="<?= site_url('item/' . $cari->i_url . '/detil'); ?>"><?= $cari->i_nama; ?></a>
                                    </h5>
                                    <?php if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == '1'): ?>
                                        <h6 id="rupiah"
                                            class="card-subtitle mb-2 text-muted"><?= $cari->i_hrg_vip; ?></h6>
                                    <?php else: ?>
                                        <h6 id="rupiah"
                                            class="card-subtitle mb-2 text-muted"><?= $cari->i_hrg_reseller; ?></h6>
                                    <?php endif; ?>
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