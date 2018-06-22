<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
<?php $nomor_order = $this->uri->segment(2); ?>
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
                        #<?= $nomor_order; ?>
                    </h5>

                    <div class="container-fluid">
                        <!-- START KONTEN ATAS -->
                        <div class="row">
                            <div class="col-12 r-posisi-kotak4-1">
                                <h6 class="r-judul-kotak4-1">
                                    <i class="fa fa-map-marker" style="font-size: 20px;"></i> Alamat Pengiriman :
                                </h6>
                            </div>
                            <div class="col-12">
                                <p class="r-konten-kotak4-1">
                                    <?= $pengiriman(); ?>
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
                                    <?= $jasa(); ?>
                                </p>
                            </div>
                            <div class="col r-posisi-kotak4-1">
                                <h6 class="r-judul-kotak4-1">
                                    <i class="fa fa-credit-card" style="font-size: 20px;"></i>
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
                        <h2 class="text-center">Sukses</h2>
                        <br>
                        <!--  END KONTEN BAWAH -->
                    </div>
                </div>  <!-- pusing mas ini untuk apa tidak tahu -->
            </div>  <!-- yang penting jalan lah mas -->
            <!-- END KOTAK KIRI -->

            <!-- KOTAK KANAN -->
            <?php $biaya_subtotal = $biaya_subtotal();
            $biaya_pengiriman = $biaya_pengiriman();
            $total = $biaya_subtotal + $biaya_pengiriman;
            ?>
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