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
                    <ol class="breadcrumb f-no-background f-hover">
                        <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Resi</li>
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
                    <a class="list-group-item list-group-item-action" href="<?= site_url('pending'); ?>">Transaksi
                        Tertunda</a>
                    <a class="list-group-item list-group-item-action r-active-step"
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
                                Laporan Resi
                            </h3>
                            <hr style="width: 30%;">
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-sm table-borderless" id="table">
                            <thead>
                            <tr>
                                <th scope="col">Laporan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($resis != NULL): ?>
                                <?php $counter = 0; ?>
                                <?php foreach ($resis as $resi): ?>
                                    <tr>
                                        <td><?= $resi->artikel_judul; ?></td>
                                        <td><?= $resi->created_at; ?></td>
                                        <td><a class="btn btn-lg f-button-font"<?= site_url('resi/' . $resi->artikel_url . '/detil'); ?>">Lihat</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Konten -->
<?php
include "layout/Footer.php";
?>