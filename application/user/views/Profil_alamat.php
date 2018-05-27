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
                        <li class="breadcrumb-item active" aria-current="page">Alamat Saya</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row mt-2">

            <!-- Side bar menu -->
            <div class="col-12 col-sm-12 col-md-2">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action" href="<?= site_url('profil'); ?>">Profil Saya</a>
                    <a class="list-group-item list-group-item-action r-active-step" href="<?= site_url('profil_alamat'); ?>">Alamat
                        Saya</a>
                    <a class="list-group-item list-group-item-action" href="<?= site_url('profil_password'); ?>">Ubah
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

                <div class="card p-4 m-auto">

<!--                    <div class="row container">-->
<!--                        <div class="col">-->
<!--                            <h3 class="r-style-title-konten-profile">-->
<!--                                Alamat Saya-->
<!--                            </h3>-->
<!--                            <hr style="width: 30%;">-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-6">
                            <form>

                                <div class="form-group">
                                    <label class="r-font-konten-profile"> Nama Depan : </label>
                                    <input type="text" class="form-control" disabled="" placeholder="Ricky">
                                </div>

                                <div class="form-group">
                                    <label class="r-font-konten-profile">Alamat Lengkap : </label>
                                    <textarea class="form-control" rows="5" disabled=""></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="r-font-konten-profile">Kecamatan :  </label>
                                    <input type="text" class="form-control" disabled="" placeholder="Cengkareng">

                                </div>

                                <div class="form-group">
                                    <label class="r-font-konten-profile">No Telepon :  </label>
                                    <input type="number" class="form-control" disabled="" placeholder="0823 1056 9056">

                                </div>

                                <br>



                            </form>

                        </div>

                        <div class="col-12 col-sm-12 col-md-6">
                            <form>

                                <div class="form-group">
                                    <label class="r-font-konten-profile"> Nama Belakang : </label>
                                    <input type="email" class="form-control" disabled="" placeholder="Meong">
                                </div>

                                <div class="form-group">
                                    <label class="r-font-konten-profile">Provinsi : </label>
                                    <input type="password" class="form-control" disabled="" placeholder="DKI Jakarta">

                                </div>

                                <div class="form-group">
                                    <label class="r-font-konten-profile">Kota / Kabupaten : </label>
                                    <input type="password" class="form-control" disabled="" placeholder="Jakarta Timur">

                                </div>

                                <div class="form-group">
                                    <label class="r-font-konten-profile">Kode Pos : </label>
                                    <input type="password" class="form-control" disabled="" placeholder="13740">

                                </div>

                                <br>





                            </form>
                        </div>






                    </div>

                    <div class="row m-auto">
                        <div class="col-12 col-sm-12">
                            <button type="submit" class="btn r-btn-konten-profile "><i class="fa fa-pencil"></i> Ubah</button>
                            <button type="submit" class="btn r-btn-konten-profile " disabled=""><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn r-btn-konten-profile " disabled=""><i class="fa fa-save"></i> Simpan</button>
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