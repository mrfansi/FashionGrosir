<!DOCTYPE html>
<html ng-app="admFashionGrosir">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - Administrator</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?= base_url('assets/css/fontastic.css'); ?>">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?= base_url('assets/css/grasp_mobile_progress_circle-1.0.0.min.css'); ?>">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet"
          href="<?= base_url('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'); ?>">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.default.css" id="theme-stylesheet'); ?>">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.ico'); ?>">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="<?= base_url('assets/vendor/angularjs/angular.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/app.js'); ?>"></script>
</head>
<body>
<div class="page login-page">
    <div class="container">
        <div class="form-outer text-center align-items-center">
            <div class="form-inner">
                <div class="logo text-uppercase"><strong class="text-primary">Login</strong>
                </div>
                <p>Administrator</p>
                <div ng-controller="LoginController">
                    <form id="loginForm" name="loginForm" ng-submit="loginValidation(loginForm.$valid)" novalidate>
                        <input type="hidden" name="token_fg" ng-model="token_fg"
                               ng-init="token_fg = '<?= $this->security->get_csrf_hash(); ?>'">
                        <div class="form-group-material"
                             ng-class="{'is-invalid' : loginForm.loginUsername.$invalid && !loginForm.loginUsername.$pristine}">
                            <input id="login-username" type="text" ng-model="loginUsername" name="loginUsername"
                                   class="input-material" required="required">
                            <label for="login-username" class="label-material">Username</label>
                            <div ng-show="loginForm.loginUsername.$invalid && !loginForm.loginUsername.$pristine"
                                 class="text-left invalid-feedback">Username tidak valid.
                            </div>
                        </div>
                        <div class="form-group-material"
                             ng-class="{'is-invalid' : loginForm.loginPassword.$invalid && !loginForm.loginPassword.$pristine}">
                            <input id="login-password" type="password" ng-model="loginPassword" name="loginPassword"
                                   class="input-material" autocomplete="no">
                            <label for="login-password" class="label-material">Password</label>
                            <div ng-show="loginForm.loginPassword.$invalid && !loginForm.loginPassword.$pristine"
                                 class="text-left invalid-feedback">Password tidak valid.
                            </div>

                        </div>
                        <button id="login" class="btn btn-block btn-primary"
                                ng-disabled="loginForm.$invalid">Login
                        </button>
                        <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                    </form>
                    <div ng-class="">{{xxx.status_msg}}</div>
                </div>

            </div>
            <div class="copyrights text-center">
                <p><a href="https://fashiongrosir-ind.com" class="external">Fashion Grosir</a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
        </div>
    </div>
</div>
<!-- Javascript files-->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/popper.js/umd/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/grasp_mobile_progress_circle-1.0.0.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/jquery.cookie/jquery.cookie.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/jquery-validation/jquery.validate.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
<!-- Main File-->
<script src="<?= base_url('assets/js/front.js'); ?>"></script>
</body>
</html>