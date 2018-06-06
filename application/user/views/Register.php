<?php
include "layout/Header.php";
?>
<?php if (isset($log) && $log != ""): ?>
    <p class="text-danger text-center"><?= $log; ?></p>
<?php endif; ?>
    <form class="form-signin">
        <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">
        <h4 class="h4 mb-3 font-weight-normal text-center f-title-color"><?= $brandname; ?></h4>

        <div class="form-group">
            <label for="nama" class="sr-only">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap" required
                   autofocus>

        </div>

        <div class="form-group">
            <label for="email" class="sr-only">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required
                   autofocus>
        </div>

        <div class="form-group">
            <label for="notelp" class="sr-only">Nomor Telp</label>
            <input type="text" id="notelp" name="notelp" class="form-control" placeholder="Nomor Telepon" required
                   autofocus>
        </div>

        <div class="checkbox mb-3">
            <label class="f-aggrement">
                <input type="checkbox" value="remember-me""> *Saya telah membaca, memahami & menyetujui Kebijakan
                Privasi dan Syarat Ketentuan
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block f-button-font" type="submit">Daftar</button>
        <hr>
        <p class="text-center">Sudah punya akun? <a href="<?= site_url('login'); ?>">Login</a></p>
    </form>

<?php
?>