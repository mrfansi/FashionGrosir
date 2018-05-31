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
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="row mt-2">

            <!-- Side bar menu -->
            <div class="col-12 col-sm-12 col-md-2">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action r-active-step" href="<?= site_url('profil'); ?>">Profil
                        Saya</a>
                    <a class="list-group-item list-group-item-action" href="<?= site_url('profil_alamat'); ?>">Alamat
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

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-8">
                                <form action="profil/simpan" method="post">
                                    <input type="hidden" name="id" value="<?= $_SESSION['id']; ?>">
                                    <div class="form-group">
                                        <label class="r-font-konten-profile">Tipe Pengguna : </label>
                                        <input type="text" class="form-control"
                                               value="<?= $profil->p_tipe == 1 ? 'VIP' : 'Reseller'; ?>"
                                               placeholder="Tipe" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="r-font-konten-profile">Nama Lengkap : </label>
                                        <input type="text" class="form-control"
                                               value="<?= $profil->p_nama; ?>"
                                               placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label class="r-font-konten-profile">E-mail : </label>
                                        <input type="email" class="form-control"
                                               value="<?= $profil->p_email; ?>"
                                               placeholder="E-mail">
                                    </div>


                                    <div class="form-group">
                                        <label class="r-font-konten-profile">Nomor Telepon : </label>
                                        <input type="password" class="form-control"
                                               placeholder="Nomor Telepon">
                                    </div>
                                    <div class="forn-group">
                                        <button type="submit" class="btn btn-primary r-btn-pink">Simpan
                                        </button>
                                    </div>
                                    <br>
                                </form>
                            </div>
                        </div>
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