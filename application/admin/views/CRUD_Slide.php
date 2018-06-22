<?php
$url = site_url('slide/simpan');
if ($submit == 'Ubah') {
    $id = $slide_promos->slide_promo_kode;
    $img = $slide_promos->slide_promo_img;
} else if ($submit == 'Simpan') {
    $id = $kode;
    $img = '';
}
?>

<form action="<?= $url; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <div class="form-group">
        <label for="slide">Slide Image</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="slide" name="slide" required>
            <label class="custom-file-label" for="logo">Pilih gambar...</label>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-sm btn-primary"><?= $submit; ?></button>
        <button type="button" onclick="window.location.reload()" class="btn btn-sm btn-danger">Tutup</button>
    </div>
    <?php if (isset($berhasil)): ?>
        <p class="text-success"><?= $berhasil; ?></p>
    <?php endif; ?>
    <?php if (isset($gagal)): ?>
        <p class="text-danger"><?= $gagal; ?></p>
    <?php endif; ?>
</form>
