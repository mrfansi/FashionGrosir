<div class="row small">
    <div class="col text-center">
        <p class="text-center r-pink f-size"><i class="fa fa-check-circle fa-5x"></i> <br> Berhasil menambah item kedalam keranjang</p>
    </div>
</div>
<hr style="padding: 0; margin: 0">
<div class="row small f-size">
    <?php
    $p_kode = isset($_SESSION['id']) ? $_SESSION['id'] : '';
    $pop_carts = $this->cart->where_p_kode($p_kode)->get_all();
    if ($pop_carts): ?>
        <table class="table table-sm table-borderless">
            <thead>
            <tr>
                <th scope="col" colspan="2">Item</th>
                <th scope="col">QTY</th>
                <th scope="col"></th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($pop_carts as $pop_cart): ?>
                <tr>
                    <td>
                        <img src="<?= base_url('upload/' . $item_img($item_detil($pop_cart->ide_kode)->item->i_kode)->ii_nama); ?>"
                             alt="" width="50" height="50"></td>
                    <td id="title"><?= $item_detil($pop_cart->ide_kode)->item->i_nama; ?></td>
                    <td>x <?= $pop_cart->ca_qty; ?></td>
                    <td id="rupiah"><?= $pop_cart->ca_tharga; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="2">
                </th>
                <th>Total :</th>
                <th>
                    <div id="rupiah"><?= $cart_total($p_kode); ?></div>
                </th>
            </tr>
            </tfoot>
        </table>
    <?php else: ?>
        <p>Tidak ada item di keranjang.</p>
    <?php endif; ?>
    <script>
        // ------------------------------------------------------ //
        // Format Rupiah
        // ------------------------------------------------------ //
        var moneyFormat = wNumb({
            mark: ',',
            decimals: 2,
            thousand: '.',
            prefix: 'Rp. ',
            suffix: ''
        });

        $('[id="rupiah"]').each(function (index) {
            var value = parseInt($(this).html()),
                hasil = moneyFormat.to(value);

            $(this).html(hasil);
        });
    </script>
</div>
<hr>
<div class="row small">
    <div class="col">
        <a href="<?= site_url('/'); ?>" class="btn btn-sm btn-primary r-btn-pink btn-block">Lanjutkan Belanja</a>
    </div>
    <div class="col">
        <a href="<?= site_url('cart'); ?>" class="btn btn-sm btn-primary r-btn-pink btn-block">Proses Pembayara</a>
    </div>
</div>
