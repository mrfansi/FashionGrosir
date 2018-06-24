<?php
include "layout/Header.php";
?>
<?php if (isset($log) && $log != ""): ?>
    <p class="text-danger text-center"><?= $log; ?></p>
<?php endif; ?>

    <!-- Alert Promo -->
    <div class="container-fluid text-center clear-header">
        <div class="row">
            <div class="col-lg-7 col-md-5">
                <div class="float-none float-md-left">
                    Selamat datang di <b><?= $brandname; ?></b>
                </div>
            </div>
            <div class="col-lg-5 col-md-7">
                <div class="float-none float-md-right f-brand-cos">
                    <a class="alert-link f-link" href="<?= site_url('/'); ?>">
                        Kembali <i class="fa fa-undo"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Alert Promo -->




    <!-- Login -->
    <form method="post" action="<?= site_url('login'); ?>" class="form-signin">
        <?php if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] != ""): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['berhasil']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['gagal']) && $_SESSION['gagal'] != ""): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['gagal']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">
        <h4 class="h4 mb-3 font-weight-normal text-center f-title-color"><?= $brandname; ?></h4>
        <div class="form-group">
            <label for="email" class="sr-only">Email</label>
            <input type="email" id="email" name="email" class="form-control f-input-shadow" placeholder="Email address"
                   required
                   autofocus autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control f-input-shadow"
                   placeholder="Password"
                   required autocomplete="off">
        </div>

        <button class="btn btn-lg btn-primary btn-block f-button-font" type="submit">Login</button>
        <p class="text-center f-margin-forgot f-hover-forgot"><a href="<?= site_url('forgot'); ?>">Kamu lupa password
                ?</a></p>
        <hr>
        <p class="text-center">Belum punya akun? <a href="<?= site_url('register'); ?>">Mendaftar disini</a></p>
    </form>
    <!-- End Login -->

<?php
?>