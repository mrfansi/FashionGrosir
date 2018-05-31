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
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?= site_url('cart'); ?>">Keranjang</a>
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
                <div class="card f-padding-card">
                    <div class="row f-margin-bangsat">
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
                <div class="card f-padding-card r-active-step">
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
    <div class="container">
        <h5 class="mb-3"><i class="fa fa-money"></i> Konfirmasi Pembayaran</h5>

        <!-- Konten -->
        <div class="row">

            <!-- KOTAK KIRI -->
            <div class="col-lg-12 col-md-12">

                <div class="card r-posisi-kartu mb-3 container-fluid">
                    <h5 class="r-judul-kotak4">
                        Detail Pesanan
                    </h5>

                    <div class="container-fluid">
                        <!-- START KONTEN ATAS -->
                        <div class="row">
                            <div class="col">
                                ORDER ID : 23923u1289378912
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 r-posisi-kotak4-1">
                                <h6 class="r-judul-kotak4-1">
                                    <i class="fa fa-map-marker" style="font-size: 20px;"></i> Alamat Pengiriman :
                                </h6>
                            </div>
                            <div class="col-12">
                                <p class="r-konten-kotak4-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col r-posisi-kotak4-1">
                                <h6 class="r-judul-kotak4-1">
                                    <i class="fa fa-truck" style="font-size: 20px;"></i>
                                    Metode Pengiriman :
                                </h6>
                                <p class="r-konten-kotak4-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                            <div class="col r-posisi-kotak4-1">
                                <h6 class="r-judul-kotak4-1">
                                    <i class="fa fa-credit-card" style="font-size: 20px;"></i>
                                    Metode Pembayaran:
                                </h6>
                                <p class="r-konten-kotak4-1">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                        </div>

                        <hr>
                        <!-- END KONTEN ATAS -->

                        <!--  START KONTEN BAWAH -->
                        <h5 class="r-judul-kotak4-bawah">
                            Konfirmasi Pembayaran
                        </h5>
                        <div class="row">
                            <div class="col">
                                <form>


                                    <div class="form-group">
                                        <label for="sel1">Payment To / Transfer Ke : *</label>
                                        <div class="r-container-konten">
                                            <select class="form-control r-style-input f-border-form" id="sel1">
                                                <option>BCA FashionGrosir - 8934083084</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="id_order">Payment From Bank / Pembayaran Dari Bank : *</label>
                                        <div class="r-container-konten">
                                            <input type="text" class="form-control r-style-input f-border-form"
                                                   id="id_order">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_order">Payment From Account Name / Rekening Atas Nama : *</label>
                                        <div class="r-container-konten">
                                            <input type="text" class="form-control r-style-input f-border-form"
                                                   id="id_order">
                                        </div>
                                    </div>

                            </div>

                            <!-- konten pembayaran sisi kanan -->

                            <div class="col">
                                <div class="form-group">
                                    <label for="id_order">Payment Amount / Total Pembayan : *</label>
                                    <div class="r-container-konten">
                                        <input type="text" class="form-control r-style-input f-border-form"
                                               id="id_order">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="id_order">Upload Bukti Pembayaran : *</label>
                                    <br>
                                    <div class="r-upload-f-button-font-wrapper">
                                        <button class="r-btn"><i class="fa fa-upload" style="font-size: 18px;"></i>Unggah
                                            File
                                        </button>
                                        <input type="file" name="myfile">
                                        <small id="fileHelp" class="form-text text-muted">Isi dengan isi isian</small>
                                    </div>
                                </div>
                            </div>
                            <!-- konten pembayaran sisi kanan -->
                        </div>
                        <a href="form_pengiriman.html"
                           class="btn btn-primary btn-lg mb-3 btn-block col-md-2 col-6 f-button-font">Konfirmasi</a>

                        <!--  END KONTEN BAWAH -->
                    </div>
                </div>  <!-- Saya pusing mas ini untuk apa tidak tahu -->
            </div>  <!-- yang penting jalan lah mas -->
            <!-- END KOTAK KIRI -->

            <!-- KOTAK KANAN -->
            <div class="col-lg-6 col-md-12 f-font-troli">
                <div class="border f-border-padding f-radius">
                    <h5>Perhitungan Harga</h5>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-7 col-6">
                            <h6>Sub Total</h6>
                        </div>
                        <div class="col-md-6 col-md-6 col-sm-5 col-6">
                            <div class="row">
                                <div class="col-lg col-md-6 col-sm-7 col">
                                    <h5 id="rupiah"
                                        class="card-title f-sub-total"><?= $cart_total($_SESSION['id']); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-7 col-6">
                            <h6>Biaya Pengiriman</h6>
                        </div>
                        <div class="col-md-6 col-md-6 col-sm-5 col-6">
                            <div class="row">
                                <div class="col-lg col-md-6 col-sm-7 col">
                                    <h5 id="rupiah" class="card-title f-sub-total"><?= $cart_total($_SESSION['id']); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-7 col-6">
                            <h6>Total</h6>
                        </div>
                        <div class="col-md-6 col-md-6 col-sm-5 col-6">
                            <div class="row">
                                <div class="col-lg col-md-6 col-sm-7 col">
                                    <h5 id="rupiah" class="card-title f-sub-total"><?= $cart_total($_SESSION['id']); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

<?php
include "layout/Footer.php";
?>