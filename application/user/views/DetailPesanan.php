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
                        <li class="breadcrumb-item"><a href="<?= $breadcumurl1; ?>"><?= ucfirst($breadcum1); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $breadcum2; ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row mt-2">

            <!-- Side bar menu -->
            <div class="col-12 col-sm-12 col-md-2">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action <?= $breadcum1 == 'profil' ? 'r-active-step' : ''; ?>"
                       href="<?= site_url('profil'); ?>">
                        Profil
                    </a>
                    <a class="list-group-item list-group-item-action <?= $breadcum1 == 'profil_alamat' ? 'r-active-step' : ''; ?>"
                       href="<?= site_url('profil_alamat'); ?>">
                        Alamat
                    </a>
                    <a class="list-group-item list-group-item-action <?= $breadcum1 == 'profil_password' ? 'r-active-step' : ''; ?>"
                       href="<?= site_url('profil_password'); ?>">
                        Ubah Password</a>
                    <a class="list-group-item list-group-item-action <?= $breadcum1 == 'riwayat' ? 'r-active-step' : ''; ?>"
                       href="<?= site_url('riwayat'); ?>">
                        Riwayat Pesanan
                    </a>
                    <a class="list-group-item list-group-item-action <?= $breadcum1 == 'pending' ? 'r-active-step' : ''; ?>"
                       href="<?= site_url('pending'); ?>">
                        Transaksi Tertunda
                    </a>
                    <a class="list-group-item list-group-item-action <?= $breadcum1 == 'resi' ? 'r-active-step' : ''; ?>"
                       href="<?= site_url('resi'); ?>">Laporan Resi</a>
                </div>
            </div>

            <!-- END  -->


            <!-- Konten -->

            <div class="col-12 col-sm-12 col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="r-style-title-konten-profile">
                            Detail Pesanan
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col">
                                <h6 class="r-judul-kotak4-1">ID Pesanan : </h6>
                                <p class="r-konten-kotak4-1">#<?= $orders_noid; ?></p>
                            </div>
                            <div class="col">
                                <h6 class="r-judul-kotak4-1">Status : </h6>
                                <p class="r-konten-kotak4-1">
                                    <?php if ($orders->orders_status == 0): ?>
                                        BELUM MENGISI ALAMAT PENGIRIMAN
                                    <?php elseif ($orders->orders_status == 1): ?>
                                        BELUM MENGISI METODE PENGIRIMAN & PEMBAYARAN
                                    <?php elseif ($orders->orders_status == 2): ?>
                                        PELANGGAN BELUM KONFIRMASI PEMBAYARAN
                                    <?php elseif ($orders->orders_status == 3): ?>
                                        ADMIN BELUM KONFIRMASI PEMBAYARAN
                                    <?php elseif ($orders->orders_status == 4): ?>
                                        ADMIN SEDANG MEMPROSES ORDER
                                    <?php elseif ($orders->orders_status == 5): ?>
                                        ADMIN BELUM KONFIRMASI PENGIRIMAN
                                    <?php elseif ($orders->orders_status == 6): ?>
                                        SUKSES (Telah dikirim)
                                    <?php elseif ($orders->orders_status == 7): ?>
                                        BATAL
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>

                        <?php if ($orders->orders_status > 2): ?>
                            <div class="row mb-4">
                                <div class="col">
                                    <h6 class="r-judul-kotak4-1">
                                        <i class="fa fa-map-marker" style="font-size: 20px;"></i> Alamat Pengiriman :
                                    </h6>
                                    <p class="r-konten-kotak4-1">
                                        <?= $pengiriman(); ?>
                                </p>
                                </div>
                                <div class="col">
                                    <h6 class="r-judul-kotak4-1">
                                        <i class="fa fa-truck" style="font-size: 20px;"></i>
                                        Metode Pengiriman :
                                </h6>
                                    <p class="r-konten-kotak4-1">
                                        <?= $jasa(); ?>
                                    </p>
                                </div>

                                <div class="col">
                                    <h6 class="r-judul-kotak4-1">
                                        <i class="fa fa-credit-card" style="font-size: 20px;"></i>
                                        Metode Pembayaran:
                                    </h6>
                                    <p class="r-konten-kotak4-1">
                                        <?= $metode_pembayaran(); ?>
                                    </p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="row mb-3">
                            <div class="col">
                                <h6 class="r-judul-kotak4-1">
                                    <i class="fa fa-dropbox" style="font-size: 20px;"></i> Detail Produk
                                </h6>
                                <div class="table-responsive ">
                                    <table class="table table-sm table-borderless">
                                        <thead>
                                        <tr>
                                            <th scope="col">Item</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Harga Satuan</th>
                                            <th scope="col">Harga Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($orders->order_detil as $detil): ?>
                                            <tr>
                                                <td><?= $item_detil($detil->item_detil_kode)->item->i_nama; ?></td>
                                                <td><?= $detil->orders_detil_qty; ?></td>
                                                <td id="rupiah"><?= $detil->orders_detil_harga; ?></td>
                                                <td id="rupiah"><?= $detil->orders_detil_tharga; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6"></div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                <h6 class="r-judul-kotak4-detailpesanan">
                                    <i class="fa fa-money" style="font-size: 20px;"></i> Perhitungan Harga :
                                </h6>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 col-md-5 col-sm-4 col-4">
                                        <h6 class="r-perhitungan-detailpesanan ">Subtotal</h6>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-8 col-8">
                                        <div class="row">
                                            <div class="col-lg col-md-8 col-sm-8 col-7">
                                                <h5 id="rupiah"
                                                    class="card-title f-sub-total r-perhitungan-detailpesanan ">
                                                    <?= $biaya_subtotal(); ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-5 col-sm-4 col-4">
                                        <h6 class="r-perhitungan-detailpesanan ">Biaya Pengiriman</h6>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-8 col-8">
                                        <div class="row">
                                            <div class="col-lg col-md-8 col-sm-8 col-7">
                                                <h5 id="rupiah"
                                                    class="card-title f-sub-total r-perhitungan-detailpesanan ">
                                                    <?= $biaya_pengiriman(); ?>
                                                </h5>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-5 col-sm-4 col-4">
                                        <h6 class="r-perhitungan-detailpesanan ">Biaya Lain-lain</h6>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-8 col-8">
                                        <div class="row">
                                            <div class="col-lg col-md-8 col-sm-7 col-7">
                                                <h5 class="card-title f-sub-total r-perhitungan-detailpesanan ">-</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 col-md-5 col-sm-7 col-4">
                                        <p class="r-perhitungan-detailpesanan "><b class="r-perhitungan-detailpesanan ">Total</b><br><i>*tidak
                                                termasuk PPN</i></p>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-5 col-8">
                                        <div class="row">
                                            <div class="col-lg col-md-8 col-sm-7 col-7">
                                                <h5 id="rupiah"
                                                    class="card-title f-sub-total r-perhitungan-detailpesanan">
                                                    <?= $biaya_subtotal() + $biaya_pengiriman(); ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col text-right">
                                <button type="submit" class="btn btn-danger btn-sm mr-1 ml-1 f-button-font"><i class="fa fa-undo"></i>
                                    Kembali
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Konten -->
    </div>

    <!-- END Konten -->
<?php
include "layout/Footer.php";
?>