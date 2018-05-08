
<?php
$url = site_url('kategori/simpan');
if ($submit == 'Ubah')
{
    $id = $kategoris->k_kode;
    $tipe = $kategoris->k_parent_kode;
    $nama = $kategoris->k_nama;
} else if ($submit == 'Simpan')
{
    $id = $kode;
    $tipe = '';
    $nama = '';
}
?>

<form action="<?= $url; ?>" method="post">
    <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <div class="form-group">
        <label for="parent">Parent Kategori</label>
        <select name="parent" id="parent" class="form-control">
            <option value="0">Root</option>
        </select>
        <p>
            <?= form_error('tipe'); ?>
        </p>
    </div>
    <div class="form-group">
        <label for="tipe">Nama Kategori</label>
        <input type="text" class="form-control" name="nama" placeholder="Input Nama Kategori" value="<?= $nama; ?>" required>
        <p>
            <?= form_error('nama'); ?>
        </p>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"><?= $submit; ?></button>
    </div>
    <?php if (isset($berhasil)): ?>
        <p class="text-success"><?= $berhasil;?></p>
    <?php endif; ?>
    <?php if (isset($gagal)): ?>
        <p class="text-danger"><?= $gagal;?></p>
    <?php endif; ?>
</form>
