<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
<?php $nomor_order = $this->uri->segment(2); ?>
<?php $biaya_subtotal = $biaya_subtotal();
$biaya_pengiriman = $biaya_pengiriman();
$total = $biaya_subtotal + $biaya_pengiriman;
?>
    <br>
    <!-- Content -->
    <div class="container-fluid f-padding">
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
                            Keranjang
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
    <div class="container-fluid f-padding">
        <h5 class="mb-3"><i class="fa fa-money"></i> Konfirmasi Pembayaran</h5>

        <!-- Konten -->
        <div class="row">

            <!-- KOTAK KIRI -->
            <div class="col-lg-12 col-md-12">

                <div class="card r-posisi-kartu mb-3 container-fluid">
                    <h5 class="r-judul-kotak4">
                        Detail Pesanan
                        #<?= $nomor_order; ?>
                    </h5>

                    <div class="container-fluid">
                        <!-- START KONTEN ATAS -->
                        <div class="row mt-4 mb-1">
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="row">
                                    <div class="col-12 ">
                                        <h6 class="r-judul-kotak4-1">
                                            <i class="fa fa-user mr-2" style="font-size: 20px;"></i> Data Penerima :
                                        </h6>
                                    </div>
                                    <div class="col-12">
                                        <p class="r-konten-kotak4-1">
                                            <?= $nama_nomor(); ?>
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="row">
                                    <div class="col-12 ">
                                        <h6 class="r-judul-kotak4-1">
                                            <i class="fa fa-map-marker mr-2" style="font-size: 20px;"></i> Alamat Pengiriman :
                                        </h6>
                                    </div>
                                    <div class="col-12">
                                        <p class="r-konten-kotak4-1">
                                            <?= $pengiriman(); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <div class="col-12 col-sm-12 col-md-6">
                                <h6 class="r-judul-kotak4-1">
                                    <i class="fa fa-truck mr-2" style="font-size: 20px;"></i>
                                    Metode Pengiriman :
                                </h6>
                                <p class="r-konten-kotak4-1">
                                    <?= $jasa(); ?>
                                </p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <h6 class="r-judul-kotak4-1">
                                    <i class="fa fa-credit-card mr-2" style="font-size: 20px;"></i>
                                    Metode Pembayaran:
                                </h6>
                                <p class="r-konten-kotak4-1">
                                    <?= $metode_pembayaran(); ?>
                                </p>
                            </div>
                        </div>

                        <hr>
                        <!-- END KONTEN ATAS -->

                        <!--  START KONTEN BAWAH -->
                        <h4 class="text-center">
                            <b>Konfirmasi Pembayaran</b>
                        </h4>
                        <br>
                        <form action="konfirmasi_pembayaran/simpan" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="bank">Pembayaran Dari Bank : *</label>
                                        <input class="form-control" id="bank"
                                                name="bank" required placeholder="Input Nama Bank">
                                        </input>
                                    </div>

                                    <div class="form-group">
                                        <label for="rek_atasnama">Rekening Atas Nama : *</label>
                                        <input type="text" class="form-control"
                                               name="rek_atasnama" placeholder="Input Nama Pemilik Rekening"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_rekening">Nomor Rekening : *</label>
                                        <input type="number" class="form-control"
                                               name="nomor_rekening" placeholder="Input Nomor Rekening" required>
                                    </div>
                                </div>

                                <!-- konten pembayaran sisi kanan -->

                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="total_pembayaran">Total Pembayan : *</label>
                                        <input type="number" class="form-control" min="<?= $total; ?>"
                                               max="<?= $total; ?>"
                                               name="total_pembayaran" placeholder="Input Total Pembayaran"
                                               value="<?= $total; ?>"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <label for="bukti_pembayaran">Upload Bukti Pembayaran : </label>
                                        <br>
                                        <div class="r-upload-f-button-font-wrapper">
                                            <button class="r-btn"><i class="fa fa-upload" style="font-size: 18px;"></i>Unggah
                                                Bukti
                                            </button>
                                            <input type="file" name="bukti_pembayaran">
                                        </div>
                                    </div>
                                </div>
                                <!-- konten pembayaran sisi kanan -->
                            </div>
                            <div class="row ">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                    <button type="submit" class="btn btn-primary btn-block r-btn-pink">
                                        Konfirmasi
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <!--  END KONTEN BAWAH -->
                    </div>
                </div>  <!-- pusing mas ini untuk apa tidak tahu -->
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
                                        class="card-title f-sub-total"><?= $biaya_subtotal; ?></h5>
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
                                    <h5 id="rupiah" class="card-title f-sub-total"><?= $biaya_pengiriman; ?></h5>
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
                                    <h5 id="rupiah" class="card-title f-sub-total"><?= $total; ?></h5>
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