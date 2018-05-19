<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <br>
    <!-- Content -->
    <!-- SHOP -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 col-lg-2">
                <div class="card card-borderbottom">
                    <div class="titlecard">
                        Ukuran
                    </div>
                    <div class="card-content container">
                        <?php foreach ($this->ukuran->get_all() as $ukuran): ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value=""><?= $ukuran->u_nama; ?>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <br>

                <div class="card card-borderbottom">
                    <div class="titlecard">
                        Warna
                    </div>
                    <div class="card-content container">

                        <?php foreach ($this->warna->get_all() as $warna): ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value=""><?= $warna->w_nama; ?>
                            </label>
                        </div>
                        <?php endforeach;; ?>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-10" >
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="card f-bottom">
                                <a href="detail.html"><img class="card-img-top" src="assets/img/kaos.jpg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="card-title">Nama Produk</h5>
                                    <p class="card-text f-title-harga">Rp. 50.000,-</p>
                                    <a href="#" class="btn btn-primary f-button-font" data-toggle="modal" data-target="#tambahkekeranjang">Tambah Ke Keranjang</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SHOP -->
<?php
include "layout/Footer.php";
?>