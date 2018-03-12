<!DOCTYPE html>
<html ng-app="admFashionGrosir" ng-controller="MainController">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title ng-bind="Page.title()">Loading...</title>
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
    <script src="<?= base_url('assets/vendor/angularjs/angular-route.min.js'); ?>"></script>
    <script>
        var base_url = '<?= base_url(); ?>';
        var hashing = '<?= $this->security->get_csrf_hash(); ?>';
    </script>
    <script src="<?= base_url('assets/js/app.js'); ?>"></script>
</head>
<body>
<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center">
                <h2 class="h5"><?= $_SESSION['nama'] ?></h2><span>Administrator</span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="#dashboard" class="brand-small text-center">
                    <strong>F</strong><strong class="text-primary">G</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <h5 class="sidenav-heading">Main</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="#!/dashboard"> <i class="icon-home"></i>DASHBOARD </a></li>
                <li><a href="#itemsdown" aria-expanded="false" data-toggle="collapse" ng-click="list_kategories()"> <i
                                class="icon-interface-windows"></i>ITEMS </a>
                    <ul id="itemsdown" class="collapse list-unstyled">
                        <li><a href="#!/item/buatbaru"> <i class="fa fa-plus"></i> BUAT
                                KATEGORI</a></li>
                        <li><a href="#!/item/kategori/all">ALL</a></li>
                        <li ng-repeat="kategori in kategories">
                            <a href="#!/item/kategori/{{kategori.kat_kode}}">{{kategori.kat_nama}}</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#transaksidown" aria-expanded="false" data-toggle="collapse"> <i
                                class="icon-interface-windows"></i>TRANSAKSI </a>
                    <ul id="transaksidown" class="collapse list-unstyled">
                        <li>
                            <a href="#!/transaksi/modul/penjualan">PENJUALAN</a>
                        </li>
                        <li>
                            <a href="#!/transaksi/modul/invoice">INVOICE</a>
                        </li>
                        <li>
                            <a href="#!/transaksi/modul/pembayaran">PEMBAYARAN</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#!/statistik"> <i class="fa fa-bar-chart"></i>STATISTIK
                        <div class="badge badge-info">Coming soon</div>
                    </a></li>
                <li><a href="#!/customers"> <i class="fa fa-users"></i>CUSTOMERS </a></li>
            </ul>
        </div>
        <div class="admin-menu">
            <h5 class="sidenav-heading">
                Opsi
            </h5>
            <ul id="side-admin-menu" class="side-menu list-unstyled">
                <li>
                    <a href="#!/profil"> <i class="fa fa-user"> </i>PROFIL
                        <div class="badge badge-info">Coming soon</div>
                    </a>
                </li>
                <li><a href="#!/konfigurasi"> <i class="fa fa-cogs"> </i>KONFIGURASI </a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="page">
    <!-- navbar-->
    <header class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i
                                    class="icon-bars"> </i></a><a href="<?= base_url('adm.php/dashboard') ?>"
                                                                  class="navbar-brand">
                            <div class="brand-text d-none d-md-inline-block"><strong
                                        class="text-primary">PANEL</strong></div>
                        </a></div>
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <li class="nav-item"><a href="<?= base_url('adm.php/auth/logout') ?>" class="nav-link logout">Logout<i
                                        class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--    <div ng-html="content_view"></div>-->
    <div ng-view></div>

    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <p>Fashion Grosir &copy; 2018</p>
                </div>
                <div class="col-sm-6 text-right">
                    <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a> and Minifier by
                        <a href="#" class="external">Eazy Dev</a></p>
                    <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
            </div>
        </div>
    </footer>
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