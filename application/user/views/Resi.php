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
                <li class="breadcrumb-item active" aria-current="page">Resi</li>
            </ol>
        </nav>
    </div>

    <div class="container f-font-resi f-hover">

            <h5>List Resi Pengiriman</h5>


            <ul>

                <li>
                    <a href="<?= site_url('resi/detail'); ?>">Transaksi 08 - Maret - 2018</a>
                    <small>
                        <br>
                        Publish on 2018-03-08
                    </small>
                </li>
            </ul>


            <div class="row pagination-layout-resi">
                <div class="col ">
                    <div class="pagination f-font-resi2">
                        <a href="#">&laquo;</a>
                        <a href="#">1</a>
                        <a href="#" class="active">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>
            </div>
        </div>


    <!-- END Konten -->
<?php
include "layout/Footer.php";
?>