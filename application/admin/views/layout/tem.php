<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php echo $html_CSS; ?>
    <?php echo $html_JS; ?>

    <title><?php echo $html_title; ?></title>
</head>

<!-- ======================================================================================= -->

<body>

<!-- Alert Promo -->
<div class="container-fluid text-center clear-header" role="alert">
    Selamat datang di <b>Fasion Grosir</b> &nbsp;|&nbsp; Info Promo <a href="" class="alert-link f-link">(Klik)</a>
    <!-- <a href="" class="btn btn-danger"><i class="glyphicon glyphicon-love"></i></a> -->
</div>
<!-- End Alert Promo -->

<!-- Header -->
<div class="container-fluid f-color">
    <div class="row f-padding-header">
        <!-- Brand -->
        <div class="col-md-2">
            <a href="#home" class="navbar-brand f-logo">
                <img src="assets/brand/citrus-logo.png" alt="">
            </a>
        </div>
        <!-- End Brand -->

        <!-- Search -->
        <nav class="navbar navbar-light">
            <form class="form-inline">
                <input class="form-control mr-sm-2 f-search f-border-color" type="search" placeholder="Search"
                       aria-label="Search">
                <button class="btn f-button-color my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
        <!-- Search -->
    </div>


    <!-- Navigasi Bar -->
    <hr class="f-hr">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light f-nav f-color">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav f-nav-size">
                    <li class="nav-item f-nav-margin">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item f-nav-margin">
                        <a class="nav-link" href="#">Produk Terbaru</a>
                    </li>
                    <li class="nav-item f-nav-margin">
                        <a class="nav-link" href="#">Sale</a>
                    </li>
                    <li class="nav-item f-nav-margin">
                        <a class="nav-link" href="#">Atasan</a>
                    </li>
                    <li class="nav-item f-nav-margin">
                        <a class="nav-link" href="#">Dress</a>
                    </li>
                    <li class="nav-item f-nav-margin">
                        <a class="nav-link" href="#">Jumpsuit</a>
                    </li>
                    <li class="nav-item f-nav-margin">
                        <a class="nav-link" href="#">Blazer</a>
                    </li>
                    <li class="nav-item f-nav-margin">
                        <a class="nav-link" href="#">Piama</a>
                    </li>
                    <li class="nav-item dropdown f-nav-margin">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Lain-lain
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Navigasi Bar -->
</div>
<!-- End Header -->

<?php
echo $html_content;
?>

<!-- Nav Footer -->
<nav class="navbar navbar-expand-lg navbar-light bg-light f-footer">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item f-nav-margin">
                <a class="nav-link" href="#">Tentang Kami</a>
            </li>
            <li class="nav-item f-nav-margin">
                <a class="nav-link" href="#">Hubungi Kami</a>
            </li>
            <li class="nav-item f-nav-margin">
                <a class="nav-link" href="#">Menjadi Mitra</a>
            </li>
            <li class="nav-item f-nav-margin">
                <a class="nav-link" href="#">FAQ</a>
            </li>
            <li class="nav-item f-nav-margin">
                <a class="nav-link" href="#">Bantuan</a>
            </li>
        </ul>
    </div>
</nav>
<!-- End Nav Footer -->


<!-- Footer -->
<div class="container-fluid text-center clear-footer" role="alert">
    &copy; Copyright Fasion Grosir 2018 | Develop By. <a href="" class="alert-link f-footer-link">EazyDevTeam</a>
    <!-- <a href="" class="btn btn-danger"><i class="glyphicon glyphicon-love"></i></a> -->
</div>
<!-- End Footer -->


<!-- ======================================================================================= -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>