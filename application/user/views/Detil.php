<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <!-- Content -->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb f-no-background">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pakaian</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pria</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="fotorama"
                     data-nav="thumbs"
                     data-arrows="true"
                     data-click="false"
                     data-swipe="true">
                    <img src="http://s.fotorama.io/1.jpg" class="img-thumbnail f-img-detail">
                    <img src="http://s.fotorama.io/2.jpg" class="img-thumbnail f-img-detail">
                </div>

            </div>
            <div class="col-lg-8">
                <h1 class="f-title-detail">Anzel Peplum (ZP01-ZP04)</h1>
                <hr>
                <p class="f-font-detail">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iste adipisci modi deleniti iusto illo vero, cupiditate quod iure consectetur, cum porro, blanditiis veritatis accusantium error voluptates placeat eius autem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro non ducimus, sunt consequuntur rem enim saepe quaerat sed quidem, exercitationem, voluptatum vel dolores pariatur culpa minus officia cum nam. Maiores.</p>
                <div class="f-detail">
                    <p><i class="fa fa-check fa-lg f-icon-margin f-font-detail"></i>Kondisi : Baru</p>
                    <p><i class="fa fa-cube fa-lg f-icon-margin f-font-detail"></i>Berat : 1kg</p>
                    <p><i class="fa fa-dropbox fa-lg f-icon-margin f-font-detail"></i>Min. Pesanan : 1pcs</p>
                </div>
                <div class="f-harga">
                    <!-- <span class="f-streak-harga">IDR 170.000,-</span> -->
                    <h1 class="f-harga">IDR 125.000,-</h1>
                    <hr>
                </div>
                <div class="col">
                    <div class="form-group f-width-variasi">
                        <p>Variasi Warna</p>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>-- Pilih Warna --</option>
                            <option>Hitam</option>
                            <option>Putih</option>
                            <option>Biru</option>
                            <option>Merah</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <form method="post" action="">
                        <div>
                            <p>Jumlah</p>
                            <input type="text" name="french-hens" id="french-hens" value="3">
                        </div>
                    </form>
                </div>
                <div class="col f-width-variasi-2">
                    <a href="troli.html" class="btn btn-primary btn-lg btn-block f-button-font f-button-detail">Tambah</a>
                </div>
                <br>
                <p class="f-font-detail">Kategori : <a href="#">Blazer</a>, <a href="#">Jumsuit</a>, <a href="#">Kemeja</a></p>
            </div>

        </div>

        <!-- <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12 col-12 f-ukuran-center f-margin-detail">
            <h5 class="f-detail">Pilih Ukuran</h5>
            <div class="row">
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                  <label class="form-check-label" for="exampleRadios1">
                    XS
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                  <label class="form-check-label" for="exampleRadios2">
                    S
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                  <label class="form-check-label" for="exampleRadios1">
                    M
                  </label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                  <label class="form-check-label" for="exampleRadios2">
                    L
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                  <label class="form-check-label" for="exampleRadios1">
                    XL
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                  <label class="form-check-label" for="exampleRadios2">
                    XXL
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-12 f-margin-detail">
              <h5 class="f-detail">Pilih Warna</h5>
              <a href=""><span class="border bg-primary f-color-detail"></span></a>
              <a href=""><span class="border bg-secondary f-color-detail"></span></a>
              <a href=""><span class="border bg-success f-color-detail"></span></a>
              <a href=""><span class="border bg-danger f-color-detail"></span></a>
              <a href=""><span class="border bg-warning f-color-detail"></span></a>
          </div>
        </div> -->

        <!-- <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-8 f-ukuran-center f-margin-detail">
            <div class="row">
              <div class="col">
                <h5 class="f-detail">Jumlah</h5>
                <div class="form-group">
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-8 col-sm-6 col-4 f-margin-detail">

          </div>
        </div> -->
    </div>
    <!-- End Content -->
    <br>

    <div class="container">
        <hr>
        <h5 class="f-title-color f-title-margin">Hot Item <i class="fa fa-angle-right fa-lg f-icon-margin f-font-detail"></i></h5>

        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="card f-bottom">
                    <a href="detail.html"><img class="card-img-top" src="assets/img/kaos.jpg" alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title f-hot-font">Nama Produk</h5>
                        <p class="card-text f-title-harga">Rp. 50.000,-</p>
                        <!-- <a href="#" class="btn btn-primary f-button-font">Tambah Ke Keranjang</a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="card f-bottom">
                    <a href="detail.html"><img class="card-img-top" src="assets/img/kaos.jpg" alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title f-hot-font">Nama Produk</h5>
                        <p class="card-text f-title-harga">Rp. 50.000,-</p>
                        <!-- <a href="#" class="btn btn-primary f-button-font">Tambah Ke Keranjang</a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="card f-bottom">
                    <a href="detail.html"><img class="card-img-top" src="assets/img/kaos.jpg" alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title f-hot-font">Nama Produk</h5>
                        <p class="card-text f-title-harga">Rp. 50.000,-</p>
                        <!-- <a href="#" class="btn btn-primary f-button-font">Tambah Ke Keranjang</a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="card f-bottom">
                    <a href="detail.html"><img class="card-img-top" src="assets/img/kaos.jpg" alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title f-hot-font">Nama Produk</h5>
                        <p class="card-text f-title-harga">Rp. 50.000,-</p>
                        <!-- <a href="#" class="btn btn-primary f-button-font">Tambah Ke Keranjang</a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="card f-bottom">
                    <a href="detail.html"><img class="card-img-top" src="assets/img/kaos.jpg" alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title f-hot-font">Nama Produk</h5>
                        <p class="card-text f-title-harga">Rp. 50.000,-</p>
                        <!-- <a href="#" class="btn btn-primary f-button-font">Tambah Ke Keranjang</a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="card f-bottom">
                    <a href="detail.html"><img class="card-img-top" src="assets/img/kaos.jpg" alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title f-hot-font">Nama Produk</h5>
                        <p class="card-text f-title-harga">Rp. 50.000,-</p>
                        <!-- <a href="#" class="btn btn-primary f-button-font">Tambah Ke Keranjang</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "layout/Footer.php";
?>