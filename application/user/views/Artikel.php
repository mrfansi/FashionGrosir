<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <br>
    <div class="container-fluid f-padding">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb f-hover">
                <li class="breadcrumb-item">
                    <a href="<?= site_url('/'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?= $breadcumburl; ?>"><?= $breadcumb; ?></a>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Content -->
    <div class="container-fluid f-padding">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $artikel->artikel_judul; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted small">Dibuat pada : <?= $artikel->created_at; ?></h6>
                <?php if ($resi->updated_at != NULL): ?>
                    <h6 class="card-subtitle mb-2 text-muted small">Diubah pada : <?= $resi->updated_at; ?></h6>
                <?php endif; ?>
                <hr>
                <p><?= $artikel->artikel_content; ?></p>
            </div>
        </div>
    </div>
    <!-- End Content -->
    <script>
        $('[id="title"]').ellipsis();
    </script>
<?php
include "layout/Footer.php";
?>