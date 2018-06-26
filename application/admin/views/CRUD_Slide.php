<?php
$url = site_url('slide/simpan');
if ($submit == 'Ubah') {
    $id = $slide_promo->slide_promo_kode;
    $img = $slide_promo->slide_promo_img;
    $caption = $slide_promo->slide_promo_caption;
    $isaktif = $slide_promo->slide_promo_isaktif;
} else if ($submit == 'Simpan') {
    $id = $kode;
    $img = '';
    $caption = '';
    $isaktif = '';
}
?>

<form action="<?= $url; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <div class="form-group">
        <label for="slide">Slide Image</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="slide" name="slide" value="<?= $img; ?>" required>
            <label class="custom-file-label" for="logo">Pilih gambar...</label>
        </div>
    </div>

    <div class="form-group">
        <label for="caption">Tulisan Promo</label>
        <textarea class="form-control" name="caption" id="caption"><?= $caption; ?></textarea>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="aktif" value="1"
                   id="aktif" <?= $isaktif == 1 ? 'checked' : ''; ?>>
            <label class="form-check-label" for="aktif">
                Tampilkan
            </label>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-sm btn-primary"><?= $submit; ?></button>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
    </div>
    <?php if (isset($berhasil)): ?>
        <p class="text-success"><?= $berhasil; ?></p>
    <?php endif; ?>
    <?php if (isset($gagal)): ?>
        <p class="text-danger"><?= $gagal; ?></p>
    <?php endif; ?>
</form>
