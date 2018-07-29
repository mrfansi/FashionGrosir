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
                        <li class="breadcrumb-item active r-font-profile-title" aria-current="page">Riwayat Pesanan</li>
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
                    <a class="list-group-item list-group-item-action r-active-step r-font-profile" href="<?= site_url('riwayat'); ?>">Riwayat
                        Pesanan</a>
                    <a class="list-group-item list-group-item-action r-font-profile" href="<?= site_url('pending'); ?>">Transaksi
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
                            <h3 class="r-style-title-konten-profile">
                                Riwayat Pesanan
                            </h3>
                            <hr style="width: 30%;">
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table table-sm table-borderless" id="table">
                            <thead>
                            <tr>
                                <th>ID Pesanan</th>
                                <th>Detail Pesanan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td class="align-middle text-danger" style="width: 200px">
                                        <?= $order->orders_noid; ?>
                                    </td>
                                    <td class="align-middle" style="width: 400px;" >
                                        <b>Tanggal Transaksi</b><br>
                                        <?= $order->created_at; ?><br>
                                        <b>Nomer Resi</b><br>
                                        <?= $order->orders_resi_no; ?><br>
                                        <b>Total Harga</b><br>
                                        <?= $order->total; ?><br>
                                        <b>Status : </b>
                                        <?php if ($order->orders_status == 0): ?>
                                            <div class="text-warning">BELUM MENGISI ALAMAT PENGIRIMAN</div>
                                        <?php elseif ($order->orders_status == 1): ?>
                                            <div class="text-warning">BELUM MENGISI METODE PENGIRIMAN & PEMBAYARAN</div>
                                        <?php elseif ($order->orders_status == 2): ?>
                                            <div class="text-success">PELANGGAN BELUM KONFIRMASI PEMBAYARAN</div>
                                        <?php elseif ($order->orders_status == 3): ?>
                                            <div class="text-success">ADMIN BELUM KONFIRMASI PEMBAYARAN</div>
                                        <?php elseif ($order->orders_status == 4): ?>
                                            <div class="text-success">ADMIN SEDANG MEMPROSES ORDER</div>
                                        <?php elseif ($order->orders_status == 5): ?>
                                            <div class="text-success">ADMIN BELUM KONFIRMASI PENGIRIMAN</div>
                                        <?php elseif ($order->orders_status == 6): ?>
                                            <div class="text-success">SUKSES (Telah dikirim)</div>
                                        <?php elseif ($order->orders_status == 7): ?>
                                            <div class="text-danger">BATAL</div>
                                        <?php endif; ?>
                                    </td>

                                    <td class="align-middle">
                                        <a class="btn btn-primary r-btn-pink text-center"
                                           href="<?= site_url('riwayat/' . $order->orders_noid . '/detil'); ?>">
                                            Detail
                                        </a>
                                        <a class="btn btn-primary r-btn-pink text-center"
                                           href="<?= site_url('riwayat/' . $order->orders_noid . '/detil'); ?>">
                                              Invoice
                                        </a>
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