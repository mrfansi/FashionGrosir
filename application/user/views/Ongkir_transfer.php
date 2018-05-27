<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <!-- Content -->
    <div class="container-fluid">
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= site_url('/'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= site_url('cart'); ?>">Keranjang</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= site_url('checkout/alamat_pengiriman'); ?>">Alamat Pengiriman</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?= site_url('checkout/kirim_bayar'); ?>">Metode Pengiriman & Pembayaran</a>
                </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-3">
                <div class="card f-padding-card">
                    <div class="row f-margin-bangsat">
                        <div class="col-1">
                            <span class="badge badge-pill badge-dark f-color-pink">1</span>
                        </div>
                        <div class="col-4">
                            <i class="fa fa-shopping-cart f-troli-text"></i>
                        </div>
                        <div class="col-6 f-font-ricky">
                            Troli Belanja
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-3">
                <div class="card f-padding-card">
                    <div class="row f-margin-bangsat">
                        <div class="col-1">
                            <span class="badge badge-pill badge-dark f-color-pink">2</span>
                        </div>
                        <div class="col-4">
                            <i class="fa fa-truck f-troli-text"></i>
                        </div>
                        <div class="col-6 f-font-ricky">
                            Alamat Pengiriman
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-3">
                <div class="card f-padding-card r-active-step">
                    <div class="row f-margin-bangsat ">
                        <div class="col-1">
                            <span class="badge badge-pill badge-dark f-color-pink">3</span>
                        </div>
                        <div class="col-4">
                            <i class="fa fa-handshake-o f-troli-text"></i>
                        </div>
                        <div class="col-6 f-font-ricky" style="font-size: 13px">
                            Metode Pengiriman & Pembayaran
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-3">
                <div class="card f-padding-card">
                    <div class="row f-margin-bangsat">
                        <div class="col-1">
                            <span class="badge badge-pill badge-dark f-color-pink">4</span>
                        </div>
                        <div class="col-4">
                            <i class="fa fa-money f-troli-text"></i>
                        </div>
                        <div class="col-6 f-font-ricky">
                            Konfirmasi Pembayaran
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <h5 class="mb-3">Metode Pengiriman & Pembayaran</h5>
        <!-- Konten -->
        <div class="row">
            <!-- KOTAK KIRI -->
            <div class="col-lg-12 col-md-12">
                <div class="card r-posisi-kartu mb-3 container-fluid">
                    <h5 class="r-judul-kotak3">
                        Metode Pengiriman
                    </h5>
                    <form>
                        <div class="radio">
                            <label><input type="radio" name="optradio"> JNE - REGULER (2 - 3 Hari) (IDR 9.000)</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="optradio"> JNE - YES (1 - 2 Hari) (IDR 18.000)</label>
                        </div>
                        <!-- <div class="radio disabled">
                          <label><input type="radio" name="optradio" > J&T (2 - 3 Hari) (IDR 9.000)</label>
                        </div>
                        <div class="radio disabled">
                          <label><input type="radio" name="optradio" > J&T (2 - 3 Hari) (IDR 9.000)</label>
                        </div> -->
                    </form>
                    <h5 class="r-judul-kotak3">
                        Metode Pembayaran
                    </h5>
                    <form>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optradio"> BANK TRANSFER - BCA an Lorem Ipsum 23829839289
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optradio"> BANK TRANSFER - BNI an Lorem Ipsum 23829839289
                            </label>
                        </div>

                    </form>
                </div>
            </div>

            <!-- END KOTAK KIRI -->

            <!-- KOTAK KANAN -->
            <div class="col-lg-6 col-md-12 f-font-troli border f-border-padding f-radius ml-3">
                <h5>Perhitungan Harga</h5>
                <hr>
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-8 col-7">
                        <div class="media">
                            <img class="mr-3 f-img-sidebar" src="assets/img/kaos.jpg" alt="Generic placeholder image">
                            <div class="media-body">
                                <h6 class="mt-0">Anzel Peplum (ZP01-ZP04)</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-1 col-1 f-sub-total">
                        <h5>3</h5>
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm col f-sub-total">
                        <h5 class="card-title">10.000.000</h5>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-8 col-7">
                        <div class="media">
                            <img class="mr-3 f-img-sidebar" src="assets/img/kaos.jpg" alt="Generic placeholder image">
                            <div class="media-body">
                                <h6 class="mt-0">Anzel Peplum (ZP01-ZP04)</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-1 col-1 f-sub-total">
                        <h5>1</h5>
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm col f-sub-total">
                        <h5 class="card-title">10.000.000</h5>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-7 col-6">
                        <h6>Subtotal</h6>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-5 col-6">
                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-5 col-4">
                                <h5>IDR</h5>
                            </div>
                            <div class="col-lg col-md-6 col-sm-7 col">
                                <h5 class="card-title f-sub-total">1.000.000</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-7 col-6">
                        <h6>Biaya Pengiriman</h6>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-5 col-6">
                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-5 col-4">
                                <h5>IDR</h5>
                            </div>
                            <div class="col-lg col-md-6 col-sm-7 col">
                                <h5 class="card-title f-sub-total">125.000</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-7 col-6">
                        <h6>Biaya Pengiriman</h6>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-5 col-6">
                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-5 col-4">
                                <h5>IDR</h5>
                            </div>
                            <div class="col-lg col-md-6 col-sm-7 col">
                                <h5 class="card-title f-sub-total">-</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <a href="pembayaran.html" class="btn btn-primary btn-lg btn-block f-button-font">Lanjut Metode
                    Pembayaran</a>
            </div>
            <!-- KOTAK KANAN -->

        </div>
        <!-- END KONTEN -->

    </div>
    <!-- End Content -->
<?php
include "layout/Footer.php";
?>