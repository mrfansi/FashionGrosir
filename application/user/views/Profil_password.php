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
                        <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row mt-2">

            <!-- Side bar menu -->
            <div class="col-12 col-sm-12 col-md-2">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action" href="<?= site_url('profil'); ?>">Profil Saya</a>
                    <a class="list-group-item list-group-item-action" href="<?= site_url('profil_alamat'); ?>">Alamat
                        Saya</a>
                    <a class="list-group-item list-group-item-action r-active-step" href="<?= site_url('profil_password'); ?>">Ubah
                        Password</a>
                    <a class="list-group-item list-group-item-action" href="<?= site_url('riwayat'); ?>">Riwayat
                        Pesanan</a>
                    <a class="list-group-item list-group-item-action" href="<?= site_url('pending'); ?>">Transaksi
                        Pending</a>
                </div>
            </div>

            <!-- END  -->


            <!-- Konten  -->
            <div class="col-12 col-sm-12 col-md-9">

                <div class="card container-fluid p-4">

<!--                    <div class="row container">-->
<!--                        <div class="col">-->
<!--                            <h3 class="r-style-title-konten-profile">-->
<!--                                Ubah Password-->
<!--                            </h3>-->
<!--                            <hr style="width: 30%;">-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="row container r-layout-konten-profile">

                        <div class="col-12 col-sm-12 col-md-8 m-auto">
                            <form>

                                <div class="form-group">
                                    <label class="r-font-konten-profile">Kata Sandi Sebelumnya : </label>
                                    <input type="email" class="form-control" disabled="">
                                </div>

                                <div class="form-group">
                                    <label class="r-font-konten-profile">Kata Sandi Baru : </label>
                                    <input type="password" class="form-control" disabled=""

                                </div>

                                <div class="form-group">
                                    <label class="r-font-konten-profile">Konfirmasi Kata Sandi Baru : </label>
                                    <input type="password" class="form-control" disabled="">

                                </div>

                                <br>



                            </form>


                        </div>




                    </div>


                    <div class="row container">
                        <div class="col-12 col-sm-12 col-md-2 ">

                        </div>
                        <div class="col-12 col-sm-12 col-md-8 text-center">
                            <button type="submit" class="btn r-btn-konten-profile "><i class="fa fa-pencil"></i> Ubah</button>
                            <button type="submit" class="btn r-btn-konten-profile " disabled=""><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn r-btn-konten-profile " disabled=""><i class="fa fa-save"></i> Simpan</button>
                        </div>

                        <div class="col-12 col-sm-12 col-md-2">

                        </div>

                    </div>

                    <br>


                </div>

            </div>

        </div>
    </div>

    <!-- END Konten -->
<?php
include "layout/Footer.php";
?>