<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
?>
    <br>
    <!-- Content -->
    <div class="container-fluid f-padding">
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
                            Keranjang
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
    <div class="container-fluid f-padding">
        <h5><i class="fa fa-car"></i> Alamat Pengiriman</h5>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form action="alamat_pengiriman/simpan" method="post" id="form_alamat">
                    <input type="hidden" name="ecommerce_eazy" value="<?= $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" name="alamat_simpan" id="alamat_simpan">
                    <div class="row form-group">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="alamat_exist" value="true" id="alamat_exist">
                                <label class="form-check-label" for="alamat_exist">
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
                                    Dropshipper
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group" id="row_nama_alamat" style="display: none;">
                        <div class="col-lg-6 col-sm-12"">
                            <select name="pilih_alamat" id="pilih_alamat" class="form-control"></select>
                        </div>
                    </div>
                    <div id="pengirim" style="display: none;">
                        <div class="row form-group">
                            <div class="col">
                                <label for="nama_pengirim">Nama Pengirim</label>
                                <input type="text" name="nama_pengirim" id="nama_pengirim" class="form-control"
                                       placeholder="Nama Pengirim">
                            </div>
                            <div class="col-lg-6 col-sm-12"">
                                <label for="kontak_pengirim">Nomor Telp. Pengirim</label>
                                <input type="number" name="kontak_pengirim" id="kontak_pengirim" class="form-control"
                                       placeholder="Kontak Pengirim">
                            </div>
                        </div>
                        <hr class="mb-4 mt-4">
                    </div>

                    <div class="row form-group">
                        <div class="col-lg-6 col-sm-12 mb-2">
                            <label for="nama_penerima">Nama Penerima</label>
                            <input type="text" name="nama_penerima" id="nama_penerima" class="form-control"
                                   placeholder="Nama Penerima">
                        </div>
                        <div class="col-lg-6 col-sm-12"">
                            <label for="kontak_penerima">Nomor Telp. Penerima</label>
                            <input type="text" name="kontak_penerima" id="kontak_penerima" class="form-control"
                                   placeholder="Kontak Penerima">
                        </div>

                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <label for="provinsi">Provinsi*</label>
                            <select name="provinsi" id="provinsi" class="provinsi form-control" required>
                            </select>
                        </div>
                        <div class="col">
                            <label for="kabupaten">Kabupaten / Kota*</label>
                            <select name="kabupaten" id="kabupaten" class="kabupaten form-control" required>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col">
                            <label for="kecamatan">Kecamatan*</label>
                            <select name="kecamatan" id="kecamatan" class="kecamatan form-control" required>
                            </select>
                        </div>
                        <div class="col">
                            <label for="kelurahan">Kelurahan / Desa*</label>
                            <select name="kelurahan" id="kelurahan" class="kelurahan form-control" required>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-lg-3 col-sm-12">
                            <label for="kodepos">Kode Pos</label>
                            <input name="kodepos" id="kodepos" type="number"
                                   class="form-control" placeholder="Kode Pos">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <label class="f-test" for="alamat">Alamat Lengkap</label>
                            <textarea name="alamat" id="alamat" class="form-control"
                                      placeholder="Nama Gedung, Jalan, dan lainnya"
                                      required></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <button id="lanjutbtn"
                                    type="button"
                                    data-toggle="modal"
                                    data-target="#lanjut"
                                    class="btn btn-primary r-btn-pink">Lanjutkan Metode Pembayaran
                            </button>
                            <br><br>
                            <button type="reset" class="btn btn-primary r-btn-pink">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
    </div>
    <div class="modal fade" id="lanjut" tabindex="-1" role="dialog" aria-labelledby="lanjut" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>Apakah ingin menyimpan alamat ini?</h5>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary r-btn-pink" onclick="simpan_iya()">Iya</button>
                    <button class="btn btn-sm btn-danger r-btn-pink" onclick="simpan_tidak()">Tidak</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Script File -->
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
            }).on('select2:select', function () {
                var id = $(this).val();
                $.get('<?= site_url('API/get_kodepos/'); ?>' + id, function (res) {
                    $('#kodepos').val(res);
                })
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
            }).on('select2:select', function () {
                var id = $(this).val();
                var nama_penerima = $('#nama_penerima');
                var kontak_penerima = $('#kontak_penerima');
                var nama_pengirim = $('#nama_pengirim');
                var kontak_pengirim = $('#kontak_pengirim');
                var alamat = $('#alamat');
                var provinsi = $('#provinsi');
                var kabupaten = $('#kabupaten');
                var kecamatan = $('#kecamatan');
                var kelurahan = $('#kelurahan');
                $.ajax({
                    dataType: 'json',
                    url: '<?= site_url('API/get_full_alamat/'); ?>' + id
                }).then(function (data) {
                    console.log(data);
                    $.when(
                        $.getJSON('<?= site_url('API/get_provinsi/'); ?>' + data.alamat_provinsi, function (res) {
                            provinsi.append(new Option(
                                res.results[0].text, res.results[0].id, true, true
                            )).trigger('change');
                            provinsi.trigger({
                                type: 'select2:select',
                                params: {
                                    data: res
                                }
                            })
                        }),
                        $.getJSON('<?= site_url('API/get_kabupaten/'); ?>' + data.alamat_kabupaten, function (res) {
                            kabupaten.append(new Option(
                                res.results[0].text, res.results[0].id, true, true
                            )).trigger('change');
                            kabupaten.trigger({
                                type: 'select2:select',
                                params: {
                                    data: res
                                }
                            })
                        }),
                        $.getJSON('<?= site_url('API/get_kecamatan/'); ?>' + data.alamat_kecamatan, function (res) {
                            kecamatan.append(new Option(
                                res.results[0].text, res.results[0].id, true, true
                            )).trigger('change');
                            kecamatan.trigger({
                                type: 'select2:select',
                                params: {
                                    data: res
                                }
                            })
                        }),
                        $.getJSON('<?= site_url('API/get_kelurahan/'); ?>' + data.alamat_desa, function (res) {
                            kelurahan.append(new Option(
                                res.results[0].text, res.results[0].id, true, true
                            )).trigger('change');
                            kelurahan.trigger({
                                type: 'select2:select',
                                params: {
                                    data: res
                                }
                            })
                        }),
                        nama_penerima.val(data.pengguna_alamat_r_nama),
                        kontak_penerima.val(data.pengguna_alamat_r_kontak),
                        nama_pengirim.val(data.pengguna_alamat_s_nama),
                        kontak_pengirim.val(data.pengguna_alamat_s_kontak),
                        alamat.val(data.alamat_deskripsi)
                    );

                });
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

        $('#alamat_exist').change(function () {
            if (this.checked) {
                $('#lanjutbtn').prop('type', 'submit').removeAttr("data-toggle").removeAttr("data-target");
                $('#row_nama_alamat').show();
            } else {
                $('#lanjutbtn').prop('type', 'button').attr("data-toggle",'modal').attr("data-target",'#lanjut');
                $('#row_nama_alamat').hide();
            }
        });

       function simpan_iya() {
           $('#form_alamat').find('input[name=alamat_simpan]')
               .val(true);
           $('#form_alamat').submit();
       }

       function simpan_tidak() {
           $('#form_alamat').find('input[name=alamat_simpan]')
               .val(false);
           $('#form_alamat').submit();
       }

    </script>
    <!-- End Content -->
<?php
include "layout/Footer.php";
?>