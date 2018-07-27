<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <br>
    <!-- Content -->
    <div class="container f-padding">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb f-hover">
                <li class="breadcrumb-item">
                    <a href="<?= site_url('/'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?= site_url('cart'); ?>">Keranjang</a>
                </li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-3">
                <div class="card f-padding-card r-active-step">
                    <div class="row f-margin-bangsat">
                        <div class="col-1">
                            <span class="badge badge-pill badge-dark f-color-pink">1</span>
                        </div>
                        <div class="col-4">
                            <i class="fa fa-shopping-cart f-troli-text"></i>
                        </div>
                        <div class="col-6 f-font-ricky">
                            Keranjang
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-3">
                <div class="card f-padding-card">
                    <div class="row f-margin-bangsat">
                        <div class="col-1">
                            <span class="badge badge-pill badge-dark f-color-pink">2</span>
                        </div>
                        <div class="col-4">
                            <i class="fa fa-truck f-troli-text"></i>
                        </div>
                        <div class="col-6 f-font-ricky">
                            Alamat Pengiriman
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-3">
                <div class="card f-padding-card">
                    <div class="row f-margin-bangsat">
                        <div class="col-1">
                            <span class="badge badge-pill badge-dark f-color-pink">3</span>
                        </div>
                        <div class="col-4">
                            <i class="fa fa-handshake-o f-troli-text"></i>
                        </div>
                        <div class="col-6 f-font-ricky" style="font-size: 12px">
                            Metode Pengiriman & Pembayaran
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-3">
                <div class="card f-padding-card">
                    <div class="row f-margin-bangsat">
                        <div class="col-1">
                            <span class="badge badge-pill badge-dark f-color-pink">4</span>
                        </div>
                        <div class="col-4">
                            <i class="fa fa-money f-troli-text"></i>
                        </div>
                        <div class="col-6 f-font-ricky">
                            Konfirmasi Pembayaran
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container f-padding" id="#content">
        <h5 class="mb-3"><i class="fa fa-shopping-cart"></i> Keranjang</h5>
        <div class="row">
            <?php if (isset($_SESSION['gagal']) && $_SESSION['gagal'] != ""): ?>
                <div class="col">
                    <div class="alert alert-danger alert-dismissible fade show"
                         role="alert">
                        <?php echo $_SESSION['gagal']; ?>
                        <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] != ""): ?>
                <div class="col">
                    <div class="alert alert-success alert-dismissible fade show"
                         role="alert">
                        <?php echo $_SESSION['berhasil']; ?>
                        <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 container">
                <div class="card mb-3 p-4">

<!--                    <div class="row f-text-hidden">-->
<!--                        <div class="col-lg-12 col-md-12">-->
<!--                            <div class="row">-->
<!--                                <div class="col-lg-5 col-md-5">-->
<!--                                    <h6>Item : -->
<!--                                        Produk</h6>-->
<!--                                </div>-->
<!--                                <div class="col-md-2">-->
<!--                                    <h6 class="text-center">Warna</h6>-->
<!--                                </div>-->
<!--                                <div class="col-md-1 p-md-0" style="min-width: 80px;">-->
<!--                                    <h6>Ukuran</h6>-->
<!--                                </div>-->
<!--                                <div class="col-md-1 p-md-0">-->
<!--                                    <h6>QTY</h6>-->
<!--                                </div>-->
<!--                                <div class="col-md-1 p-md-0">-->
<!--                                    <h6>Total</h6>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->



                            <div class="table-responsive-md">
                                <h6 class="float-right mt-3">Banyaknya Item : <?= $this->cart->where_pengguna_kode($_SESSION['id'])->count_rows(); ?>
                                    Produk</h6>
                                <table class="table">



                                    <tr class="mb-3">
                                        <th>
                                            <p class="r-font-konten-profile">Detail Produk</p>
                                        </th>
                                        <th><p class="r-font-konten-profile">Warna</p></th>
                                        <th><p class="r-font-konten-profile">Ukuran</p></th>
                                        <th><p class="r-font-konten-profile">Qty</p></th>
                                        <th><p class="r-font-konten-profile">Total</p></th>
                                        <th></th>
                                    </tr>


                                    <br>




                                    <?php if ($cart_s($_SESSION['id']) != NULL): ?>
                                        <?php foreach ($cart_s($_SESSION['id']) as $cart): ?>

                                        <tr class="border mt-3">
                                            <td>
                                                <div class="">
                                                    <div class="media">
                                                        <?php if ($item_detil($cart->item_detil_kode)->item->i_kode): ?>
                                                            <?php $item_kode = $item_detil($cart->item_detil_kode)->item->i_kode; ?>
                                                            <?php if ($item_img($item_kode) != NULL): ?>
                                                                <img class="mr-3"
                                                                     src="<?= base_url('upload/' . $item_img($item_kode)->ii_nama); ?>"
                                                                     alt="<?= $item_img($item_kode)->ii_nama; ?>">
                                                            <?php else: ?>
                                                                <img class="mr-3"
                                                                     src="<?= base_url('assets/img/noimg.png'); ?>"
                                                                     alt="noimg.png">
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <div class="media-body mb-3">
                                                            <h6 class="mt-0"><?= $item_detil($cart->item_detil_kode)->item->i_nama; ?></h6>
                                                            <p class="text-justify"><?= $item_detil($cart->item_detil_kode)->item->i_deskripsi; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <p class=""><?= $item_detil($cart->item_detil_kode)->warna->w_nama; ?></p>
                                            </td>
                                            <td>
                                                <p><?= $item_detil($cart->item_detil_kode)->item_detil_ukuran; ?></p>
                                            </td>
                                            <td>
                                                <p><?= $cart->ca_qty; ?></p>
                                            </td>
                                            <td>
                                                <p><?= $cart->ca_tharga; ?></p>
                                            </td>
                                            <td style="width:1px;">
                                                <a class="float-right" tooltip title="Hapus item"
                                                   href="<?= site_url('cart/' . $cart->ca_kode . '/delete'); ?>"><i
                                                            class="fa fa-times-circle fa-lg f-delete-troli"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>


                                </table>

                            </div>





                </div>
            </div>

            <div class="col-lg-6 col-md-12 f-font-troli">
                <div class="border f-border-padding f-radius">
                <h5>Perhitungan Harga</h5>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-7 col-6">
                        <h6>Total</h6>
                    </div>
                    <div class="col-md-6 col-md-6 col-sm-5 col-6">
                        <div class="row">
                            <div class="col-lg col-md-6 col-sm-7 col">
                                <h5 id="rupiah" class="card-title f-sub-total"><?= $cart_total($_SESSION['id']); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-4 p-0">
                    <a href="<?= site_url('cart/checkout'); ?>" class="btn btn-primary btn-lg f-button-font">Proses
                        Pembayaran</a>
                </div>

            </div>


        </div>
    </div>
    <!-- End Content -->

<?php
include "layout/Footer.php";
?>