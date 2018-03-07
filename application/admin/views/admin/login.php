<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $judul ?></title>
    <?php
    echo $this->layout->print_includes();
    ?>
</head>
<body>
<div class="page login-page">
    <div class="container">
        <div class="form-outer text-center align-items-center">
            <div class="form-inner">
                <div class="logo text-uppercase">
                    <strong class="text-primary">Login</strong>
                </div>
                <form id="login-form" method="post">
                    <div class="form-group-material">
                        <input id="login-username" type="text" name="loginUsername" required class="input-material"
                               autocomplete="no">
                        <label for="login-username" class="label-material">Username</label>
                    </div>
                    <div class="form-group-material">
                        <input id="login-password" type="password" name="loginPassword" required class="input-material"
                               autocomplete="no">
                        <label for="login-password" class="label-material">Password</label>
                    </div>
                    <a id="login" href="index.html" class="btn btn-block btn-primary">Login</a>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                </form>
            </div>
            <div class="copyrights text-center">
                <p><a href="https://fashiongrosir-ind.com" class="external">Fashion Grosir</a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
        </div>
    </div>
</div>
</body>
</html>