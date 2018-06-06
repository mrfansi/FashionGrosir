<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>

    <!-- Konten -->
    <div class="container-fluid">

        <div class="row mt-1">
            <div class="col-2">

            </div>
            <div class="col-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb f-no-background f-hover">
                        <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Alamat Saya</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row mt-2">

            <!-- Side bar menu -->
            <div class="col-12 col-sm-12 col-md-2">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action" href="<?= site_url('profil'); ?>">Profil Saya</a>
                    <a class="list-group-item list-group-item-action "
                       href="<?= site_url('profil_alamat'); ?>">Alamat
                        Saya</a>
                    <a class="list-group-item list-group-item-action" href="<?= site_url('profil_password'); ?>">Ubah
                        Password</a>
                    <a class="list-group-item list-group-item-action" href="<?= site_url('riwayat'); ?>">Riwayat
                        Pesanan</a>
                    <a class="list-group-item list-group-item-action r-active-step" href="<?= site_url('pending'); ?>">Transaksi
                        Tertunda</a>
                </div>
            </div>

            <!-- END  -->


            <!-- Konten -->

            <div class="col-12 col-sm-12 col-md-9">

                <div class="card">

                    <h4 class="r-style-title-konten-profile">
                        Detail Pesanan
                    </h4>

                    <hr class="r-hr-juduldetail">
                    <div class="container">
                        <!-- START JUDUL -->


                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                <p class="r-detailstatuspesanan-judul">No Pesanan : </p>
                                <p class="r-font-orderid">#ASUCAESAR2018</p> <br>
                                <p class="r-detailstatuspesanan-judul">Kurir Ekpedisi : </p>
                                <p class="r-font-orderid"> JNE </p>
                                <small class="r-small-detail-pesanan r-font-date ">
                                    Dipesan pada 10 Maret 2018
                                </small>

                            </div>

                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">

                                <p class="r-detailstatuspesanan-judulkanan">
                                    Total Harga :
                                </p>
                                <p class="r-detailstatuspesanan-judulhargakanan">
                                    100.000
                                </p>
                                <h6 class="r-badge">Status Transaksi : <span class="badge badge-success">Sukses</span>
                                </h6>


                            </div>
                        </div>

                        <!-- -->

                        <div class="row">
                            <div class="col">

                            </div>
                            <div class="col">


                            </div>
                            <div class="col">

                            </div>
                        </div>
                        <!-- -->
                        <!-- END JUDUL -->
                    </div>
                    <hr class="r-hr-juduldetail">

                    <div class="container">
                        <h5 class="r-style-detailbarangpesanan">
                            <i class="fa fa-dropbox" style="font-size: 20px;"></i> Detail Produk
                        </h5>

                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <p>No</p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <p>Nama Produk</p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-md-2 col-xl-2">
                                <p>Kuantiti</p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-md-2 col-xl-2">
                                <p>Harga Satuan</p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-md-2 col-xl-2">
                                <p>Harga Total</p>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <p>1</p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <p class="r-p-detailproduk">Powerlogic X-Craft Quantum Z7000 Gaming Mouse</p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-md-2 col-xl-2">
                                <p class="r-p-detailproduk">2</p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-md-2 col-xl-2">
                                <p class="r-p-detailproduk">10.000</p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-md-2 col-xl-2">
                                <p class="r-p-detailproduk">20.000</p>
                            </div>

                        </div>


                    </div>

                    <hr class="r-hr-juduldetail">

                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">


                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">

                                <h6 class="r-judul-kotak4-detailpesanan">
                                    <i class="fa fa-money" style="font-size: 20px;"></i> Perhitungan Harga :
                                </h6>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-7 col-6">
                                        <h6 class="r-perhitungan-detailpesanan ">Subtotal</h6>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-5 col-6">
                                        <div class="row">
                                            <div class="col-lg col-md-5 col-sm-5 col-4">
                                                <h5 class="r-perhitungan-detailpesanan ">IDR</h5>
                                            </div>
                                            <div class="col-lg col-md-6 col-sm-7 col">
                                                <h5 class="card-title f-sub-total r-perhitungan-detailpesanan ">
                                                    1.000.000</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-7 col-6">
                                        <h6 class="r-perhitungan-detailpesanan ">Biaya Pengiriman</h6>
                                    </div>
                                    <div class="col-lg-6 col-md col-sm-5 col-6">
                                        <div class="row">
                                            <div class="col-lg col-md-5 col-sm-5 col-4">
                                                <h5 class="r-perhitungan-detailpesanan ">IDR</h5>
                                            </div>
                                            <div class="col-lg col-md-6 col-sm-7 col">
                                                <h5 class="card-title f-sub-total r-perhitungan-detailpesanan ">
                                                    125.000</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-7 col-6">
                                        <h6 class="r-perhitungan-detailpesanan ">Biaya Lain-lain</h6>
                                    </div>
                                    <div class="col-lg-6 col-md col-sm-5 col-6">
                                        <div class="row">
                                            <div class="col-lg col-md-5 col-sm-5 col-4">
                                                <h5 class="r-perhitungan-detailpesanan ">IDR</h5>
                                            </div>
                                            <div class="col-lg col-md-6 col-sm-7 col">
                                                <h5 class="card-title f-sub-total r-perhitungan-detailpesanan ">-</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-7 col-6">
                                        <p class="r-perhitungan-detailpesanan "><b class="r-perhitungan-detailpesanan ">Total</b><br><i>*tidak
                                                termasuk PPN</i></p>
                                    </div>
                                    <div class="col-lg-6 col-md col-sm-5 col-6">
                                        <div class="row">
                                            <div class="col-lg col-md-5 col-sm-5 col-4">
                                                <h5 class="r-perhitungan-detailpesanan ">IDR</h5>
                                            </div>
                                            <div class="col-lg col-md-6 col-sm-7 col">
                                                <h5 class="card-title f-sub-total r-perhitungan-detailpesanan">
                                                    1.125.000</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>

                    <div class="row container mb-2 mt-2">
                        <div class="col d-flex justify-content-center">
                            <button type="submit" class="btn btn-info btn-sm mr-1 ml-1"><i class="fa fa-file"></i> Cetak
                            </button>
                            <button type="submit" class="btn btn-danger btn-sm mr-1 ml-1"><i class="fa fa-undo"></i>
                                Kembali
                            </button>
                        </div>
                    </div>
                </div>
                <!-- END CARD -->


            </div>


            <br>

        </div>

        <!-- End Konten -->


    </div>

    <!-- END Konten -->
<?php
include "layout/Footer.php";
?>