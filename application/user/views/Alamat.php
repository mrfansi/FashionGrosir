<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <!-- Content -->
    <div class="container">
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= site_url('/'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= site_url('cart'); ?>">Keranjang</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?= site_url('checkout/alamat_pengiriman'); ?>">Alamat Pengiriman</a>
                </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-3">
                <div class="card f-padding-card ">
                    <div class="row f-margin-bangsat">
                        <div class="col-1">
                            <span class="badge badge-pill badge-dark f-color-pink">1</span>
                        </div>
                        <div class="col-4">
                            <i class="fa fa-shopping-cart f-troli-text"></i>
                        </div>
                        <div class="col-6 f-font-ricky">
                            Troli Belanja
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-3">
                <div class="card f-padding-card r-active-step">
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
                        <div class="col-6 f-font-ricky" style="font-size: 13px">
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
    <form class="container">
        <h5>Alamat Pengiriman</h5>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row form-group">
                    <div class="col">
                        <label for="dropship">Apakah pengiriman dropship?</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="dropship" id="dropship" value="0"
                                   required>
                            <label class="form-check-label" for="dropship">Tidak</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="dropship" id="dropship" value="1"
                                   required>
                            <label class="form-check-label" for="dropship">Iya</label>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <label for="dropship">Apakah ingin menyimpan alamat ini?</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="simpan" id="simpan" value="0" required>
                            <label class="form-check-label" for="simpan">Tidak</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="simpan" id="simpan" value="1" required>
                            <label class="form-check-label" for="simpan">Iya</label>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <label for="provinsi">Provinsi</label>
                        <select name="provinsi" id="provinsi" class="form-control" required>
                        </select>
                    </div>
                    <div class="col">
                        <label for="kabupaten">Kabupaten</label>
                        <select name="kabupaten" id="kabupaten" class="form-control" required>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col">
                        <label for="kecamatan">Kecamatan</label>
                        <select name="kecamatan" id="kecamatan" class="form-control" required>
                        </select>
                    </div>
                    <div class="col">
                        <label for="kota">Kota</label>
                        <select name="kota" id="kota" class="form-control" required>
                        </select>
                    </div>

                    <div class="col">
                        <label for="kodepos">Kode Pos</label>
                        <input name="kodepos" type="number" class="form-control" placeholder="Kode Pos" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <label class="f-test" for="alamat">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap" required></textarea>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-md-12 f-font-troli border f-border-padding f-radius ml-3">
                <h5>Nomor Order : <?= $orders->o_noorder; ?></h5>
                <hr>
                <?php foreach ($orders->order_detil as $order): ?>
                    <div class="row">

                        <div class="col-lg-7 col-md-7 col-sm-8 col-7">
                            <div class="media">
                                <?php if ($item_img($item_detil($order->ide_kode)->item->i_kode) != NULL): ?>
                                    <img class="mr-3 f-img-sidebar"
                                         src="<?= base_url('upload/') . $item_img($item_detil($order->ide_kode)->item->i_kode)->ii_nama; ?>"
                                         alt="<?= $item_img($item_detil($order->ide_kode)->item->i_kode)->ii_nama; ?>">
                                <?php endif; ?>
                                <div class="media-body">
                                    <h6 class="mt-0"><?= $item_detil($order->ide_kode)->item->i_nama; ?></h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1 col-md-2 col-sm-1 col-1 f-sub-total">
                            <h5>x<?= $order->od_qty; ?></h5>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm col f-sub-total">
                            <h5 class="card-title" id="rupiah"><?= $order->od_tharga; ?></h5>
                        </div>
                    </div>
                    <br>
                <?php endforeach; ?>
                <hr>

                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-7 col-6">
                        <h6>Sub Total</h6>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-5 col-6">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title f-sub-total" id="rupiah"><?= $orders_total(); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary btn-lg btn-block f-button-font">Lanjut Metode
                    Pembayaran
                </button>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            function matchCustom(params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') {
                    return data;
                }

                // Do not display the item if there is no 'text' property
                if (typeof data.text === 'undefined') {
                    return null;
                }

                // `params.term` should be the term that is used for searching
                // `data.text` is the text that is displayed for the data object
                if (data.text.indexOf(params.term) > -1) {
                    var modifiedData = $.extend({}, data, true);
                    modifiedData.text += ' (matched)';

                    // You can return modified objects from here
                    // This includes matching the `children` how you want in nested data sets
                    return modifiedData;
                }

                // Return `null` if the term should not be displayed
                return null;
            }

            $('#provinsi').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih provinsi',
                ajax: {
                    url: '<?= site_url('API/get_provinsi'); ?>',
                    dataType: 'json'
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                },
                matcher: matchCustom
            });
            $('#kabupaten').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih kabupaten',
                ajax: {
                    url: '<?= site_url('API/get_kabupaten'); ?>',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    }
                }
            });
            $('#kecamatan').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih kecamatan',
                ajax: {
                    url: '<?= site_url('API/get_kecamatan'); ?>',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    }
                }
            });
            $('#kota').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih kota',
                ajax: {
                    url: '<?= site_url('API/get_kota'); ?>',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    }
                }
            });
        });
    </script>
    <!-- End Content -->
<?php
include "layout/Footer.php";
?>