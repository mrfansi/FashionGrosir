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
    <div class="container">
        <h5>Alamat Pengiriman</h5>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row form-group">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="check_dropship">
                            <label class="form-check-label" for="check_dropship">
                                Dropship
                            </label>
                        </div>
                    </div>
                </div>

                <form action="alamat_pengiriman/simpan/form_self" method="post" id="form_self">

                    <div class="row form-group" id="form_nama_alamat">
                        <div class="col" id="nama_alamat">
                            <label for="nama_alamat">Judul / Pilih yang sudah ada</label>
                            <input type="text" name="nama_alamat" class="form-control" placeholder="Judul Alamat">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <label for="nama_penerima">Nama Penerima</label>
                            <input type="text" name="nama_penerima" class="form-control" placeholder="Nama Penerima">
                        </div>
                        <div class="col">
                            <label for="kontak_penerima">Nomor Telp. Penerima</label>
                            <input type="text" name="kontak_penerima" class="form-control"
                                   placeholder="Kontak Penerima">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <label for="provinsi">Provinsi</label>
                            <select name="provinsi" id="provinsi" class="provinsi form-control" required>
                            </select>
                        </div>
                        <div class="col">
                            <label for="kabupaten">Kabupaten / Kota</label>
                            <select name="kabupaten" id="kabupaten" class="kabupaten form-control" required>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col">
                            <label for="kecamatan">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="kecamatan form-control" required>
                            </select>
                        </div>
                        <div class="col">
                            <label for="kelurahan">Kelurahan / Desa</label>
                            <select name="kelurahan" id="kelurahan" class="kelurahan form-control" required>
                            </select>
                        </div>

                        <div class="col">
                            <label for="kodepos">Kode Pos</label>
                            <input name="kodepos" id="kodepos" type="number"
                                   class="form-control" placeholder="Kode Pos" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <label class="f-test" for="alamat">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" placeholder="Nama Gedung, Jalan, dan lainnya""
                                      required></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <button type="submit" class="btn btn-primary r-btn-pink">Lanjutkan Metode Pembayaran
                            </button>
                        </div>
                    </div>
                </form>
                <form action="alamat_pengiriman/simpan/form_dropship" method="post" id="form_dropship" style="display: none;">
                    <div class="row form-group" id="form_nama_alamat">
                        <div class="col" id="d_nama_alamat">
                            <label for="d_nama_alamat">Judul / Pilih yang sudah ada</label>
                            <input type="text" name="d_nama_alamat" class="form-control" placeholder="Judul Alamat">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <label for="d_nama_penerima">Nama Penerima</label>
                            <input type="text" name="d_nama_penerima" class="form-control" placeholder="Nama Penerima">
                        </div>
                        <div class="col">
                            <label for="d_kontak_penerima">Nomor Telp. Penerima</label>
                            <input type="text" name="d_kontak_penerima" class="form-control"
                                   placeholder="Kontak Penerima">
                        </div>
                        <div class="col" id="pengirim">
                            <label for="d_nama_pengirim">Nama Pengirim</label>
                            <input type="text" name="d_nama_pengirim" class="form-control" placeholder="Nama Pengirim">
                        </div>
                        <div class="col" id="pengirim">
                            <label for="d_kontak_pengirim">Nomor Telp. Pengirim</label>
                            <input type="text" name="d_kontak_pengirim" class="form-control"
                                   placeholder="Kontak Pengirim">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <label for="d_provinsi">Provinsi</label>
                            <select name="d_provinsi" id="d_provinsi" class="d_provinsi form-control" required>
                            </select>
                        </div>
                        <div class="col">
                            <label for="d_kabupaten">Kabupaten / Kota</label>
                            <select name="d_kabupaten" id="d_kabupaten" class="d_kabupaten form-control" required>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col">
                            <label for="d_kecamatan">Kecamatan</label>
                            <select name="d_kecamatan" id="d_kecamatan" class="d_kecamatan form-control" required>
                            </select>
                        </div>
                        <div class="col">
                            <label for="d_kelurahan">Kelurahan / Desa</label>
                            <select name="d_kelurahan" id="d_kelurahan" class="d_kelurahan form-control" required>
                            </select>
                        </div>

                        <div class="col">
                            <label for="d_kodepos">Kode Pos</label>
                            <input name="d_kodepos" id="d_kodepos" type="number"
                                   class="form-control" placeholder="Kode Pos" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <label for="d_alamat">Alamat Lengkap</label>
                            <textarea name="d_alamat" class="form-control" placeholder="Nama Gedung, Jalan, dan lainnya"
                                      required></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <button type="submit" class="btn btn-primary r-btn-pink">Lanjutkan Metode Pembayaran
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
    </div>
    <script>
        $(document).ready(function () {
            $('#provinsi').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih provinsi',
                ajax: {
                    url: '<?= site_url('API/get_provinsi'); ?>',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term
                        };
                    }
                }
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
                            q: params.term,
                            provinsi: $('#provinsi').val()
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
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            kabupaten: $('#kabupaten').val()
                        };
                    }
                }
            });
            $('#kelurahan').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih kota',
                ajax: {
                    url: '<?= site_url('API/get_kota'); ?>',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term,
                            kecamatan: $('#kecamatan').val()
                        };
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#d_provinsi').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih provinsi',
                ajax: {
                    url: '<?= site_url('API/get_provinsi'); ?>',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term
                        };
                    }
                }
            });
            $('#d_kabupaten').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih kabupaten',
                ajax: {
                    url: '<?= site_url('API/get_kabupaten'); ?>',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term,
                            provinsi: $('#provinsi').val()
                        };
                    }
                }
            });
            $('#d_kecamatan').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih kecamatan',
                ajax: {
                    url: '<?= site_url('API/get_kecamatan'); ?>',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            kabupaten: $('#kabupaten').val()
                        };
                    }
                }
            });
            $('#d_kelurahan').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih kota',
                ajax: {
                    url: '<?= site_url('API/get_kota'); ?>',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term,
                            kecamatan: $('#kecamatan').val()
                        };
                    }
                }
            });
        });
    </script>
    <script>
        $('#nama_alamat').autoComplete({
           source: function (req, res) {
               $.ajax({
                   url: '<?= site_url('API/get_alamat'); ?>',
                   dataType: "jsonp",
                   data: {
                       q: req.term
                   },
                   success: function (data) {
                       res(data);
                   }
               })
           }
        });

        $('#d_nama_alamat').autoComplete({
            source: function (req, res) {
                $.ajax({
                    url: '<?= site_url('API/get_alamat'); ?>',
                    dataType: "jsonp",
                    data: {
                        q: req.term
                    },
                    success: function (data) {
                        res(data);
                    }
                })
            }
        });
    </script>
    <script>
        function get_kodepos(data) {
            $.get("<?= site_url('API/get_kodepos/'); ?>" + $('#kota').val(), function (res, status) {
                $(this).val(res);
            });
        }
    </script>
    <script>
        $('#check_dropship').change(function () {
            if (this.checked) {
                $('#form_dropship').show();
                $('#form_self').hide();
            } else {
                $('#form_dropship').hide();
                $('#form_self').show();
            }
        });

        $('input:radio[id=simpan]').change(function () {
            var simpan = $(this).val();
            if (simpan === "true") {
                $('#nama_alamat').show();
            } else {
                $('#nama_alamat').hide();
            }
        });
        $('input:radio[id=d_simpan]').change(function () {
            var d_simpan = $(this).val();
            if (d_simpan === "true") {
                $('#d_nama_alamat').show();
            } else {
                $('#d_nama_alamat').hide();
            }
        })

    </script>
    <!-- End Content -->
<?php
include "layout/Footer.php";
?>