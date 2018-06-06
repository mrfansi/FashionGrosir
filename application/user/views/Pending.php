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
                        <li class="breadcrumb-item active" aria-current="page">Transaksi Tertunda</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row mt-2">

            <!-- Side bar menu -->
            <div class="col-12 col-sm-12 col-md-2">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action" href="<?= site_url('profil'); ?>">Profil</a>
                    <a class="list-group-item list-group-item-action" href="<?= site_url('profil_alamat'); ?>">Alamat
                    </a>
                    <a class="list-group-item list-group-item-action" href="<?= site_url('profil_password'); ?>">Ubah
                        Password</a>
                    <a class="list-group-item list-group-item-action" href="<?= site_url('riwayat'); ?>">Riwayat
                        Pesanan</a>
                    <a class="list-group-item list-group-item-action r-active-step" href="<?= site_url('pending'); ?>">Transaksi
                        Tertunda</a>
                    <a class="list-group-item list-group-item-action"
                       href="<?= site_url('resi'); ?>">Resi</a>
                </div>
            </div>

            <!-- END  -->


            <!-- Konten  -->
            <div class="col-12 col-sm-12 col-md-9">

                <div class="card container-fluid p-4">

                    <!--                    <div class="row container">-->
                    <!--                        <div class="col">-->
                    <!--                            <h3 class="r-style-title-konten-profile">-->
                    <!--                                Transaksi Tertunda-->
                    <!--                            </h3>-->
                    <!--                            <hr style="width: 30%;">-->
                    <!--                        </div>-->
                    <!--                    </div>-->

                    <div class="table-responsive mt-2">
                        <table class="table table-sm table-borderless">
                            <thead>
                            <tr>
                                <th scope="col">Nomor Order</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Nama Penerima</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td rowspan="1" class="text-danger"><a
                                                href="<?= site_url('DetailPesanan'); ?>"><?= $order->o_noorder; ?></a>
                                    </td>
                                    <td><?= $order->created_at; ?></td>
                                    <td id="rupiah"><?= $order->total; ?></td>
                                    <td><?= $order->p_nama; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><b>Status : </b>
                                        <?php if ($order->o_status == 0): ?>
                                            <div class="text-warning">BELUM MENGISI ALAMAT PENGIRIMAN</div>
                                        <?php elseif ($order->o_status == 1): ?>
                                            <div class="text-warning">BELUM MENGISI METODE PENGIRIMAN & PEMBAYARAN</div>
                                        <?php elseif ($order->o_status == 2): ?>
                                            <div class="text-success">PELANGGAN BELUM KONFIRMASI PEMBAYARAN</div>
                                        <?php elseif ($order->o_status == 3): ?>
                                            <div class="text-success">ADMIN BELUM KONFIRMASI PEMBAYARAN</div>
                                        <?php elseif ($order->o_status == 4): ?>
                                            <div class="text-success">ADMIN SEDANG MEMPROSES ORDER</div>
                                        <?php elseif ($order->o_status == 5): ?>
                                            <div class="text-success">ADMIN BELUM KONFIRMASI PENGIRIMAN</div>
                                        <?php elseif ($order->o_status == 6): ?>
                                            <div class="text-success">SUKSES</div>
                                        <?php elseif ($order->o_status == 7): ?>
                                            <div class="text-danger">BATAL</div>
                                        <?php endif; ?>
                                    </td>
                                    <td><b>Aksi :</b><br>
                                        <?php if ($order->o_status == 0): ?>
                                            <a
                                                    href="<?= site_url('checkout/' . $order->o_noorder . '/alamat_pengiriman'); ?>">
                                                Konfirmasi
                                            </a>
                                        <?php elseif ($order->o_status == 1): ?>
                                            <a
                                                    href="<?= site_url('checkout/' . $order->o_noorder . '/ongkir_transfer'); ?>">
                                                Konfirmasi
                                            </a>
                                        <?php elseif ($order->o_status == 2): ?>
                                            <a
                                                    href="<?= site_url('checkout/' . $order->o_noorder . '/konfirmasi_pembayaran'); ?>">
                                                Konfirmasi
                                            </a>
                                        <?php else: ?>
                                            <i>(NULL)</i>
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