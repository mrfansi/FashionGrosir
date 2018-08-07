<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>

    <!-- Konten -->
    <div class="container">

        <div class="row mt-1">
            <div class="col-2">

            </div>
            <div class="col-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb f-no-background f-hover r-font-profile-title">
                        <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                        <li class="breadcrumb-item active r-font-profile-title" aria-current="page">Transaksi Tertunda</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row mt-2">

            <!-- Side bar menu -->
            <div class="col-12 col-sm-12 col-md-2">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action r-font-profile" href="<?= site_url('profil'); ?>">Profil</a>
                    <a class="list-group-item list-group-item-action r-font-profile" href="<?= site_url('profil_alamat'); ?>">Alamat
                    </a>
                    <a class="list-group-item list-group-item-action r-font-profile" href="<?= site_url('profil_password'); ?>">Ubah
                        Password</a>
                    <a class="list-group-item list-group-item-action r-font-profile" href="<?= site_url('riwayat'); ?>">Riwayat
                        Pesanan</a>
                    <a class="list-group-item list-group-item-action r-active-step r-font-profile" href="<?= site_url('pending'); ?>">Transaksi
                        Tertunda</a>
                    <a class="list-group-item list-group-item-action r-font-profile"
                       href="<?= site_url('resi'); ?>">Laporan Resi</a>
                </div>
            </div>

            <!-- END  -->


            <!-- Konten  -->
            <div class="col-12 col-sm-12 col-md-9">

                <div class="card container p-4">

                    <div class="row container">
                        <div class="col">
                            <h3 class="r-style-title-konten-profile ">
                                Transaksi Tertunda
                            </h3>
                            <hr style="width: 30%;">
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table id="table" class="table">
                            <thead>
                            <tr>
                                <th class="r-font-list" style= scope="col">Nomor Order</th>
                                <th class="r-font-list" scope="col">Detail Order</th>
                                <th class="r-font-list" scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td class="align-middle text-danger">
                                       <div class="r-font-list"><?= $order->orders_noid; ?></div>
                                    </td>
                                    <td>
                                        <b >Tanggal Order :</b><br>
                                        <p class="r-font-pending"><?= $order->created_at; ?></p>
                                        <br>
                                        <b class="r-font-profile-title">Total Harga :</b><br>
                                        <p class="r-font-pending"> <?= $order->total; ?></p>
                                        <br>
                                        <b class="r-font-profile-title block">Status :</b><br>
                                        <?php if ($order->orders_status == 0): ?>
                                            <div class="text-warning r-font-pending">BELUM MENGISI ALAMAT PENGIRIMAN</div>
                                        <?php elseif ($order->orders_status == 1): ?>
                                            <div class="text-warning r-font-pending">BELUM MENGISI METODE PENGIRIMAN & PEMBAYARAN</div>
                                        <?php elseif ($order->orders_status == 2): ?>
                                            <div class="text-success r-font-pending">PELANGGAN BELUM KONFIRMASI PEMBAYARAN</div>
                                        <?php elseif ($order->orders_status == 3): ?>
                                            <div class="text-success r-font-pending">ADMIN BELUM KONFIRMASI PEMBAYARAN</div>
                                        <?php elseif ($order->orders_status == 4): ?>
                                            <div class="text-success r-font-pending">ADMIN SEDANG MEMPROSES ORDER</div>
                                        <?php elseif ($order->orders_status == 5): ?>
                                            <div class="text-success r-font-pending">ADMIN BELUM KONFIRMASI PENGIRIMAN</div>
                                        <?php elseif ($order->orders_status == 6): ?>
                                            <div class="text-success r-font-pending">SUKSES (Telah dikirim)</div>
                                        <?php elseif ($order->orders_status == 7): ?>
                                            <div class="text-danger r-font-pending">BATAL</div>
                                        <?php endif; ?>
                                        <br>
                                        <b class="r-font-profile-title">Deskripsi / Alasan :</b><br>
                                        <div class="text-danger">
                                            <?= $order->orders_deskripsi; ?>
                                        </div>

                                    </td>
                                    <td class="align-middle">


                                        <?php if ($order->orders_status == 0): ?>
                                            <a class="btn btn-primary r-btn-pink"
                                               href="<?= site_url('checkout/' . $order->orders_noid . '/alamat_pengiriman'); ?>">
                                                <i class="fas fa-sync mr-2"></i>Isi Alamat
                                            </a>
                                        <?php elseif ($order->orders_status == 1): ?>
                                            <a class="btn btn-primary r-btn-pink"
                                               href="<?= site_url('checkout/' . $order->orders_noid . '/ongkir_transfer'); ?>">
                                                <i class="fas fa-sync mr-2"></i>Pilih Metode
                                            </a>
                                        <?php elseif ($order->orders_status == 2): ?>
                                            <a class="btn btn-primary r-btn-pink"
                                               href="<?= site_url('checkout/' . $order->orders_noid . '/konfirmasi_pembayaran'); ?>">
                                                <i class="fas fa-sync mr-2"></i>Konfirmasi
                                            </a>
                                        <?php elseif ($order->orders_status == 6): ?>
                                            <a class="btn btn-primary r-btn-pink"
                                               href="<?= site_url('pending/' . $order->orders_noid . '/detil'); ?>">
                                                <i class="fas fa-sync mr-2"></i>Detail
                                            </a>
                                        <?php else: ?>
                                            <i></i>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!--                    <div class="row pagination-layout">-->
                    <!--                        <div class="col ">-->
                    <!--                            <div class="pagination">-->
                    <!--                                <a href="#">&laquo;</a>-->
                    <!--                                <a href="#">1</a>-->
                    <!--                                <a href="#" class="active">2</a>-->
                    <!--                                <a href="#">3</a>-->
                    <!--                                <a href="#">4</a>-->
                    <!--                                <a href="#">5</a>-->
                    <!--                                <a href="#">6</a>-->
                    <!--                                <a href="#">&raquo;</a>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->

                </div>


            </div>


        </div>

    </div>


    <!-- END Konten -->
<?php
include "layout/Footer.php";
?>