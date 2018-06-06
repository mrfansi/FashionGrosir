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
                    <li class="breadcrumb-item"><a href="<?= site_url('resi'); ?>">Resi</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $resi->ar_judul; ?></li>
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
               href="<?= site_url('resi'); ?>">Resi</a>
        </div>
    </div>

    <!-- END  -->
    <div class="col-12 col-sm-12 col-md-9">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $resi->ar_judul; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted small">Dibuat pada : <?= $resi->created_at; ?></h6>
                <?php if ($resi->updated_at != NULL): ?>
                    <h6 class="card-subtitle mb-2 text-muted small">Diubah pada : <?= $resi->updated_at; ?></h6>
                <?php endif; ?>
                <hr>
                <p><?= $resi->ar_content; ?></p>
            </div>
        </div>
    </div>


    <!-- END Konten -->

<?php
include "layout/Footer.php";
?>