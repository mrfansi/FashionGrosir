<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <br>


    <!-- Content -->
    <div class="container">
        <div class="row">
            <?php if (isset($_SESSION['gagal']) && $_SESSION['gagal'] != ""): ?>
                <div class="col">
                    <div class="alert alert-danger alert-dismissible fade show"
                         role="alert">
                        <?php echo $_SESSION['gagal']; ?>
                        <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] != ""): ?>
                <div class="col">
                    <div class="alert alert-success alert-dismissible fade show"
                         role="alert">
                        <?php echo $_SESSION['berhasil']; ?>
                        <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                <h5 class="card-title mb-0 text-left">Kategori</h5>
                <hr>
                <ul class="nav flex-column c-ul-footer">
                    <li class="nav-item mb-1 ml-1 r-itmkathome">
                        <a class="" href="">
                            dddd
                        </a>
                    </li>
                </ul>

            </div>

            <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                <div class="">
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
                <div class="row">
                    <?php if ($terbaru_items() != NULL): ?>
                        <?php foreach ($terbaru_items() as $terbaru): ?>
                            <?php $stok = $qty($terbaru->i_kode); ?>
                            <?php if ($stok >= 1): ?>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3">
                                    <div class="thumbnail">
                                        <div class="image mx-auto d-block"
                                             data-url="<?= site_url('produk-terbaru/' . $terbaru->i_url . '/detil'); ?>">
                                            <?php if ($item_img($terbaru->i_kode) != NULL): ?>
                                                <img class="img-fluid"
                                                     src="<?= base_url('upload/' . $item_img($terbaru->i_kode)->ii_nama); ?>"
                                                     alt="<?= $item_img($terbaru->i_kode)->ii_nama; ?>">
                                            <?php else: ?>
                                                <img class="img-fluid"
                                                     src="https://upload.wikimedia.org/wikipedia/commons/archive/a/ac/20121003093557%21No_image_available.svg"
                                                     alt="No Image">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-12 col-md-12 col-sm-12 text-center">
                                            <h6 id="title" class="mt-2"><?= $terbaru->i_nama; ?></h6>
                                        </div>
                                        <div class="ratings">
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star-empty"></span>
                                        </div>
                                        <hr class="line">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-sm-12 text-center">
                                                <?php if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == '1'): ?>
                                                    <p id="rupiah"
                                                       class="mt-1 align-middle price"><?= $terbaru->i_hrg_vip; ?></p>
                                                <?php else: ?>
                                                    <p id="rupiah"
                                                       class="mt-1 align-middle price"><?= $terbaru->i_hrg_reseller; ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <!--                                            <div class="col-4 col-md-4 col-sm-4">-->
                                            <!--                                                <a class="btn btn-primary btn-sm r-btn-pink right"-->
                                            <!--                                                   href="--><!--">-->
                                            <!--                                                    <i class="fa fa-shopping-cart"></i> Beli-->
                                            <!--                                                </a>-->
                                            <!--                                            </div>-->

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="col">Tidak ada item yang ditampilkan</p>
                    <?php endif; ?>
                    <br>
                </div>
            </div>
        </div>

    </div>
    <!-- End Content -->
    <script>
        $('[id="title"]').ellipsis();
    </script>
<?php
include "layout/Footer.php";
?>