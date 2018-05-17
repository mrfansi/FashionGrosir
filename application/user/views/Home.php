<?php
include "layout/Header.php";
include "layout/Brand.php";
include "layout/Menu.php";
include "layout/Slide.php";
?>
    <br>
    <!-- Title Content -->
    <div class="container">
        <h5 class="f-title-color">Produk Baru</h5>
        <hr>
    </div>
    <!-- Title Content -->

    <!-- Content -->
    <div class="container">
        <div class="row">
            <?php if (isset($items) && $items != NULL): ?>
                <?php foreach ($items as $item): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card f-bottom">
                            <a href="<?= site_url('item/' . $item->ide_kode . '/detil'); ?>">

                                <?php if (isset($item->item_img) && $item->item_img->ii_nama != NULL): ?>
                                    <img class="card-img-top"
                                         src="<?= base_url('upload/' . $item->item_img->ii_nama); ?>"
                                         alt="Card image cap">
                                <?php else: ?>
                                    <img class="card-img-top" src="<?= base_url('assets/img/noimg.png'); ?>"
                                         alt="Card image cap">
                                <?php endif; ?>
                            </a>
                            <form method="post" action="<?= site_url('item/' . $item->ide_kode . '/add_to_cart'); ?>" class="card-body">
                                <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">
                                <input type="hidden" name="qty" value="1">

                                <h5 class="card-title"><?= $item->item->i_nama; ?></h5>
                                <?php if (isset($_SESSION['tipe']) && $_SESSION['tipe'] == '1'): ?>
                                    <input type="hidden" name="harga" value="<?= $item->item->i_hrg_vip; ?>">
                                    <p id="rupiah"
                                       class="card-subtitle mb-2 text-muted"><?= $item->item->i_hrg_vip; ?></p>
                                <?php else: ?>
                                    <input type="hidden" name="harga" value="<?= $item->item->i_hrg_reseller; ?>">
                                    <p id="rupiah"
                                       class="card-subtitle mb-2 text-muted"><?= $item->item->i_hrg_reseller; ?></p>
                                <?php endif; ?>
                                <table class="table table-sm table-borderless small text-danger">
                                    <tr>
                                        <td>Warna :</td>
                                        <td><?= isset($item->warna) ? $item->warna->w_nama : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ukuran :</td>
                                        <td><?= isset($item->ukuran) ? $item->ukuran->u_nama : ''; ?></td>
                                    </tr>
                                </table>
                                <button type="submit" class="btn btn-primary f-button-font btn-block">Tambah Ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada item yang ditampilkan</p>
            <?php endif; ?>
            <br>
        </div>
    </div>
    <!-- End Content -->
    <script>
        $(document).ready(function () {
            $('form').submit(function (e) {
                e.preventDefault();
                $('#cart').modal('show');
            })
        })

    </script>
<?php
include "layout/Footer.php";
?>