<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <!-- Login -->
    <form class="form-signin">
        <h4 class="h4 mb-3 font-weight-normal text-center f-title-color">Silahkan login</h4>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control f-input-shadow" placeholder="Email address" required
                   autofocus>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control f-input-shadow" placeholder="Password" required>
        </div>

        <button class="btn btn-lg btn-primary btn-block f-button-font" type="submit">Sign in</button>
        <p class="text-center f-margin-forgot f-hover-forgot"><a href="<?= site_url('forgot'); ?>">Kamu lupa password ?</a></p>
        <hr>
        <p class="text-center">Belum punya akun? <a href="<?= site_url('register'); ?>">Mendaftar disini</a></p>
    </form>
    <!-- End Login -->

<?php
include "layout/Footer.php";
?>