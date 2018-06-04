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
                        Tertunda</a>
                </div>
            </div>

            <!-- END  -->


            <!-- Konten  -->
            <div class="col-12 col-sm-12 col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <form action="profil_alamat/simpan" method="post">
                                    <input type="hidden" name="token_fg"
                                           value="<?= $this->security->get_csrf_hash(); ?>">

                                    <div class="row form-group" id="row_nama_alamat">
                                        <div class="col">
                                            <select name="pilih_alamat" id="pilih_alamat" class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="row form-group" id="row_judul_alamat" style="display: none;">
                                        <div class="col">
                                            <label for="nama_alamat">Judul</label>
                                            <input type="text" name="nama_alamat" id="nama_alamat" class="form-control"
                                                   placeholder="Judul Alamat" required>
                                        </div>
                                    </div>
                                    <div id="pengirim" style="display: none;">
                                        <div class="row form-group">
                                            <div class="col">
                                                <label for="nama_pengirim">Nama Pengirim</label>
                                                <input type="text" name="nama_pengirim" id="nama_pengirim"
                                                       class="form-control"
                                                       placeholder="Nama Pengirim">
                                            </div>
                                            <div class="col">
                                                <label for="kontak_pengirim">Nomor Telp. Pengirim</label>
                                                <input type="text" name="kontak_pengirim" id="kontak_pengirim"
                                                       class="form-control"
                                                       placeholder="Kontak Pengirim">
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col">
                                            <label for="nama_penerima">Nama Penerima</label>
                                            <input type="text" name="nama_penerima" id="nama_penerima"
                                                   class="form-control"
                                                   placeholder="Nama Penerima">
                                        </div>
                                        <div class="col">
                                            <label for="kontak_penerima">Nomor Telp. Penerima</label>
                                            <input type="text" name="kontak_penerima" id="kontak_penerima"
                                                   class="form-control"
                                                   placeholder="Kontak Penerima">
                                        </div>

                                    </div>
                                    <div class="row form-group">
                                        <div class="col">
                                            <label for="provinsi">Provinsi</label>
                                            <select name="provinsi" id="provinsi" class="provinsi form-control"
                                                    required>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="kabupaten">Kabupaten / Kota</label>
                                            <select name="kabupaten" id="kabupaten" class="kabupaten form-control"
                                                    required>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col">
                                            <label for="kecamatan">Kecamatan</label>
                                            <select name="kecamatan" id="kecamatan" class="kecamatan form-control"
                                                    required>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="kelurahan">Kelurahan / Desa</label>
                                            <select name="kelurahan" id="kelurahan" class="kelurahan form-control"
                                                    required>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label for="kodepos">Kode Pos</label>
                                            <input name="kodepos" id="kodepos" type="number"
                                                   class="form-control" placeholder="Kode Pos" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col">
                                            <label class="f-test" for="alamat">Alamat Lengkap</label>
                                            <textarea name="alamat" id="alamat" class="form-control"
                                                      placeholder="Nama Gedung, Jalan, dan lainnya"
                                                      required></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary r-btn-pink">Simpan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- END Konten -->
<?php
include "layout/Footer.php";
?>