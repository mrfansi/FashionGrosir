<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <!-- Content -->
    <div class="container">
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb f-hover">
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
                <form action="alamat_pengiriman/simpan" method="post">
                    <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" name="nomor_order" value="<?= $this->uri->segment(2); ?>">
                    <input type="hidden" name="a_kode" value="<?= $a_kode; ?>">

                    <div class="row form-group">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="simpan" value="true" id="simpan">
                                <label class="form-check-label" for="simpan">
                                    Pilih dari alamat yang sudah ada
                                </label>
                            </div>
                        </div>
                    </div>
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
                    <div class="row form-group" id="row_nama_alamat" style="display: none;">
                        <div class="col">
                            <select name="pilih_alamat" id="pilih_alamat" class="form-control"></select>
                        </div>
                    </div>
                    <div class="row form-group" id="row_simpan_alamat">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="true" name="check_simpan" id="check_simpan">
                                <label class="form-check-label" for="check_simpan">
                                    Simpan alamat ini
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group" id="row_judul_alamat" style="display: none;">
                        <div class="col">
                            <label for="nama_alamat">Judul</label>
                            <input type="text" name="nama_alamat" id="nama_alamat" class="form-control" placeholder="Judul Alamat">
                        </div>
                    </div>
                    <div id="pengirim" style="display: none;">
                        <div class="row form-group">
                            <div class="col">
                                <label for="nama_pengirim">Nama Pengirim</label>
                                <input type="text" name="nama_pengirim" class="form-control" placeholder="Nama Pengirim">
                            </div>
                            <div class="col">
                                <label for="kontak_pengirim">Nomor Telp. Pengirim</label>
                                <input type="text" name="kontak_pengirim" class="form-control"
                                       placeholder="Kontak Pengirim">
                            </div>
                        </div>
                        <hr>
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
                            <textarea name="alamat" class="form-control" placeholder="Nama Gedung, Jalan, dan lainnya"
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
                placeholder: 'Pilih kelurahan / desa',
                ajax: {
                    url: '<?= site_url('API/get_kelurahan'); ?>',
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

            $('#pilih_alamat').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih alamat',
                ajax: {
                    url: '<?= site_url('API/get_alamat'); ?>',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term
                        };
                    }
                }
            });

            $('#kodepos').focus(function () {
                var id = $('#kelurahan').val();
                $.get('<?= site_url('API/get_kodepos/'); ?>' + id, function (res) {
                    $('#kodepos').val(res);
                })
            })
        });
    </script>
    <script>
        $('#check_dropship').change(function () {
            if (this.checked) {
                $('[id=pengirim]').show();
            } else {
                $('[id=pengirim]').hide();
            }
        });

        $('#simpan').change(function () {
            if (this.checked) {
                $('#row_nama_alamat').show();
                $('#row_simpan_alamat').hide();
            } else {
                $('#row_nama_alamat').hide();
                $('#row_simpan_alamat').show();
            }
        });

        $('#check_simpan').change(function () {
            if (this.checked) {
                $('#row_judul_alamat').show();
            } else {
                $('#row_judul_alamat').hide();
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