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
                <li class="breadcrumb-item">
                    <a href="<?= site_url('cart'); ?>">Keranjang</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= site_url('checkout/alamat_pengiriman'); ?>">Alamat Pengiriman</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?= site_url('checkout/kirim_bayar'); ?>">Metode Pengiriman & Pembayaran</a>
                </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-3">
                <div class="card f-padding-card">
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
                <div class="card f-padding-card r-active-step">
                    <div class="row f-margin-bangsat ">
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
    <div class="container f-padding">
        <h5 class="mb-3"><i class="fa fa-handshake"></i> Metode Pengiriman & Pembayaran</h5>
        <!-- Konten -->
        <div class="row">
            <!-- KOTAK KIRI -->
            <form class="col-lg-12 col-md-12" action="ongkir_transfer/simpan" method="post">
                <input type="hidden" name="ecommerce_eazy" value="<?= $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="orders_noid" value="<?= $orders->orders_noid; ?>">
                <input type="hidden" name="nomor_order" value="<?= $this->uri->segment(2); ?>">
                <h6>Pilih Metode Pengiriman</h6>
                <?php foreach ($pengiriman as $k1): ?>
                    <?php $nama = $k1->name; ?>
                    <?php foreach ($k1->costs as $k2): ?>
                        <?php $deskripsi = $k2->description; ?>
                        <?php foreach ($k2->cost as $k3): ?>
                            <?php $biaya = $k3->value; ?>
                            <?php $estimasi = $k3->etd; ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pengiriman" id="pengiriman"
                                       data-deskripsi="<?= $deskripsi; ?>"
                                       data-biaya="<?= $biaya; ?>"
                                       data-estimasi="<?= $estimasi; ?>"
                                       data-nama="<?= $nama; ?>"
                                       value="1" required>
                                <label class="form-check-label" for="pengiriman">
                                    <?= $nama . ' - ' . $deskripsi . ' (' . $estimasi . ' hari) ('; ?> <span
                                            id="rupiah"><?= $biaya; ?></span>)
                                </label>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <br>


                <h6>Pilih Metode Pembayaran</h6>
                <?php if ($bank_opsi() === true): ?>
                    <?php if ($bank_s() != NULL): ?>
                        <?php foreach ($bank_s() as $bank): ?>
                            <?php $name = $bank->bank_penerbit . ' (A/N: ' . $bank->bank_nama . ') (Nomor Rek: ' . $bank->bank_rek . ')'; ?>
                            <div class="form-check">

                                <input class="form-check-input" type="radio"
                                       data-id="<?= $bank->bank_kode; ?>"
                                       name="bank" id="bank"
                                       value="1" required>
                                <label class="form-check-label" for="bank"><?= $name; ?></label>

                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php else: ?>
                    <p class="text-danger">Admin belum menentukan metode pembayaran.</p>
                <?php endif; ?>
                <br>
                <input type="hidden" name="bank_id" id="bank_id">
                <input type="hidden" name="nama" id="nama">
                <input type="hidden" name="deskripsi" id="deskripsi">
                <input type="hidden" name="biaya" id="biaya">
                <input type="hidden" name="estimasi" id="estimasi">
                <button type="submit" class="btn f-button-color" <?= $bank_opsi() == true ? '' : 'disabled'; ?>>
                    Konfirmasi Pesanan
                </button>
            </form>
        </div>
        <script>
            $('[id="pengiriman"]').change(function () {
                var data = $(this);
                var deskripsi = data.attr('data-deskripsi');
                var biaya = data.attr('data-biaya');
                var estimasi = data.attr('data-estimasi');
                var nama = data.attr('data-nama');

                $.when(
                    $('#nama').val(nama),
                    $('#deskripsi').val(deskripsi),
                    $('#biaya').val(biaya),
                    $('#estimasi').val(estimasi)
                )
            });

            $('[id="bank"]').change(function () {
                var data = $(this);
                var id = data.attr('data-id');
                $.when(
                    $('#bank_id').val(id)
                );
            });
        </script>

        <!-- END KOTAK KIRI -->
    </div>
    <!-- END KONTEN -->

<?php
include "layout/Footer.php";
?>