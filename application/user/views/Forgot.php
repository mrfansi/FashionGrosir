<?php
include "layout/Header.php";
?>
<?php if (isset($log) && $log != ""): ?>
    <p class="text-danger text-center"><?= $log; ?></p>
<?php endif; ?>
    <form class="form-signin" action="<?= site_url('auth/forgot_post'); ?>" method="post">
        <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">
        <h4 class="h4 mb-3 font-weight-normal text-center f-title-color"><?= $brandname; ?></h4>

        <div class="form-group">
            <label for="email" class="sr-only">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required
                   autofocus>

        </div>

        <button class="btn btn-lg btn-primary btn-block f-button-font" type="submit">Kirim</button>
        <hr>
        <p class="text-center">Sudah punya akun? <a href="<?= site_url('login'); ?>">Login</a></p>
    </form>

<?php
?>