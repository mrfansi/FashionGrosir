<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <br>
    <!-- Konten -->
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb f-hover">
                <li class="breadcrumb-item">
                    <a href="<?= site_url('/'); ?>">Home</a>
                </li>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?= $breadcumburl; ?>"><?= $breadcumb; ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?= $breadcumburl2; ?>"><?= $breadcumb2; ?></a>
                </li>
            </ol>
        </nav>
    </div>

        <div class="container-fluid">
                <h5>Detail List Resi - Transaksi 08 Maret 2018</h5>

                <div class="r-detail-resi">
                    <p>
                        JNE<br>
                        339. 000139029586 Livia<br>
                        340. 000139029587 Yvonne Horensia<br>
                        341. 000139029588 Santi<br>
                        342. 000139029589 Catharine<br>
                        343. 000139029590 Silvi Magdalena<br>
                        344. 000139029591 Vina Dwi Jaya<br>
                        345. 000139029592 Athalia<br>
                        346. 000139029593 Evi Fatrin<br>
                        347. 000139029594 Gita<br>
                        348. 000139029595 Jihan Ramadhanty<br>
                        349. 000139029596 Lenice<br>
                        350. 000139029597 Lulu Gabriela<br>
                        351. 000139029598 Olyv<br>
                        352. 000139029599 Cindy Novita<br>
                        353. 000139029600 Thomas<br>
                        354. 000139029601 Nicky<br>
                        355. 000139029602 Licya<br>
                        356. 000139029603 Lini Puspitasari<br>
                        357. 000139029604 Junia<br>
                        358. 000139029605 Anita<br>
                        359. 000139029606 Fenty Hambali<br>
                        360. 000139029607 Dewi Annisa A<br>
                    </p>
                </div>
        </div>


    <!-- END Konten -->

<?php
include "layout/Footer.php";
?>