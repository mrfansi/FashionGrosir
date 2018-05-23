<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <!-- Content -->
    <div class="container">
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= site_url('/'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= site_url('cart'); ?>">Keranjang</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?= site_url('checkout/alamat_pengiriman'); ?>">Alamat Pengiriman</a>
                </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-3">
                <div class="card f-padding-card ">
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
                <div class="card f-padding-card r-active-step">
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
    <form class="container">
        <h5 class="mb-3">Alamat Pengiriman</h5>

        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="border f-border-padding">
                    <!-- Pilihan Billing -->
                    <ul class="nav nav-pills mb-3 r-pilihan-alamat" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active r-pilihan-alamat-font" id="pills-home-tab" data-toggle="pill"
                               href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Kirim Atas
                                Nama
                                Saya</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  r-pilihan-alamat-font" id="pills-profile-tab" data-toggle="pill"
                               href="#pills-profile" role="tab" aria-controls="pills-profile"
                               aria-selected="false">Drop Ship</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active r-border-pengiriman " id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="media border f-border-padding">
                                        <i class="fa fa-check fa-lg f-icon-margin f-icon-center"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0">Nur Hidayat</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, magni,
                                                veniam. In ab aliquam assumenda, esse vel dolorem, eius. Consectetur
                                                repellendus enim error qui nihil sunt esse veritatis illum beatae.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade r-border-pengiriman " id="pills-profile" role="tabpanel"
                             aria-labelledby="pills-profile-tab">

                            <div class="row container">
                                <div class="col-lg-12">

                                    <form>

                                        <h6 class="f-text-alamat">Alamat Pengirim</h6>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Nama Email</label>
                                            <input type="email" class="form-control f-border-form"
                                                   id="exampleFormControlInput1" placeholder="fashion@grosir.com">
                                        </div>


                                        <div class="row form-group">
                                            <div class="col">
                                                <label for="exampleFormControlInput1">Nama Depan</label>
                                                <input type="text" class="form-control f-border-form"
                                                       placeholder="Fashion Shop">
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1">Nama Belakang</label>
                                                <input type="text" class="form-control f-border-form"
                                                       placeholder="Grosir">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="f-test" for="exampleFormControlInput1">Alamat Jalan</label>
                                            <input type="email" class="form-control f-border-form"
                                                   id="exampleFormControlInput1" placeholder="Jl. Jakarta Raya No.1">
                                        </div>

                                        <div class="row form-group">
                                            <div class="col">
                                                <label for="inputState">Provinsi</label>
                                                <select id="inputState" class="form-control f-border-form">
                                                    <option selected></option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="inputState">Kota</label>
                                                <select id="inputState" class="form-control f-border-form">
                                                    <option selected></option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col">
                                                <label for="inputState">Kecamatan</label>
                                                <select id="inputState" class="form-control f-border-form">
                                                    <option selected></option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1">Kode Pos</label>
                                                <input type="text" class="form-control f-border-form"
                                                       placeholder="125XX">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-6">
                                                <label for="exampleFormControlInput1">No Telpon / HP</label>
                                                <input type="text" class="form-control f-border-form f-f"
                                                       placeholder="0812XXXXXX">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-6">
                                                <label for="exampleFormControlTextarea1">Keterangan Tambahan</label>
                                                <textarea class="form-control f-border-form"
                                                          id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>


                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                <button type="submit" class="btn btn-primary btn-lg btn-block f-button-font">Lanjut Metode
                    Pembayaran</button>
            </div>
        </div>
    </form>
    <!-- End Content -->
<?php
include "layout/Footer.php";
?>