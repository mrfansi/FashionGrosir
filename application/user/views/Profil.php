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
                    <a class="list-group-item list-group-item-action r-active-step" href="<?= site_url('profil'); ?>">Profil</a>
                    <a class="list-group-item list-group-item-action"
                       href="<?= site_url('profil_alamat'); ?>">Alamat</a>
                    <a class="list-group-item list-group-item-action" href="<?= site_url('profil_password'); ?>">Ubah
                        Password</a>
                    <a class="list-group-item list-group-item-action" href="<?= site_url('riwayat'); ?>">Riwayat
                        Pesanan</a>
                    <a class="list-group-item list-group-item-action" href="<?= site_url('pending'); ?>">Transaksi
                        Tertunda</a>
                    <a class="list-group-item list-group-item-action"
                       href="<?= site_url('resi'); ?>">Resi</a>
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
                                    <input type="hidden" name="token_fg"
                                           value="<?= $this->security->get_csrf_hash(); ?>">
                                    <input type="hidden" name="id" value="<?= $_SESSION['id']; ?>">
                                    <div class="row form-group">
                                        <div class="col">
                                            <label class="r-font-konten-profile">Tipe Pengguna : </label>
                                            <input type="text" class="form-control"
                                                   value="<?= $profil->pengguna_tipe == 1 ? 'VIP' : 'Reseller'; ?>"
                                                   placeholder="Tipe" disabled>
                                        </div>

                                    </div>
                                    <div class="row form-group">
                                        <div class="col">
                                            <label class="r-font-konten-profile">Nama Lengkap : </label>
                                            <input type="text" class="form-control"
                                                   value="<?= $profil->pengguna_nama; ?>"
                                                   name="nama"
                                                   placeholder="Nama Lengkap">
                                        </div>

                                    </div>
                                    <div class="row form-group">
                                        <div class="col">
                                            <label class="r-font-konten-profile">E-mail : </label>
                                            <input type="email" class="form-control"
                                                   value="<?= $profil->pengguna_email; ?>"
                                                   name="email"
                                                   placeholder="E-mail">
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col">
                                            <label class="r-font-konten-profile">Nomor Telepon : </label>
                                            <input type="text" class="form-control"
                                                   value="<?= $profil->pengguna_telp; ?>"
                                                   name="notelp"
                                                   placeholder="Nomor Telepon">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary r-btn-pink">Simpan
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php if (isset($_SESSION['gagal']) && $_SESSION['gagal'] != ""): ?>
                                            <div class="col">
                                                <div class="alert alert-danger alert-dismissible fade show"
                                                     role="alert">
                                                    <?php echo $_SESSION['gagal']; ?>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] != ""): ?>
                                            <div class="col">
                                                <div class="alert alert-success alert-dismissible fade show"
                                                     role="alert">
                                                    <?php echo $_SESSION['berhasil']; ?>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
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