
<?php
$url = site_url('kategori/simpan');
if ($submit == 'Ubah')
{
    $id = $items->i_kode;
    $nama = $items->i_nama;
    $hrg_vip = $items->i_hrg_vip;
    $hrg_reseller = $items->i_hrg_reseller;
    $deskripsi = $items->s_deskripsi;
} else if ($submit == 'Simpan')
{
    $id = $kode;
    $nama = '';
    $hrg_vip = '';
    $hrg_reseller = '';
    $deskripsi = '';
}
?>

<form action="<?= $url; ?>" method="post">
    <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <div class="form-group">
        <label for="tipe">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Input Nama" value="<?= $nama; ?>" required>
        <p>
            <?= form_error('nama'); ?>
        </p>
    </div>
    <div class="form-group">
        <label for="hrg_vip">Harga VIP</label>
        <input type="text" class="form-control" name="hrg_vip" placeholder="Input Hrg VIP" value="<?= $hrg_vip; ?>" required>
        <p>
            <?= form_error('hrg_vip'); ?>
        </p>
    </div>
    <div class="form-group">
        <label for="hrg_reseller">Harga VIP</label>
        <input type="text" class="form-control" name="hrg_reseller" placeholder="Input Hrg VIP" value="<?= $hrg_reseller; ?>" required>
        <p>
            <?= form_error('hrg_reseller'); ?>
        </p>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10">
            <?= $deskripsi; ?>
        </textarea>
        <p>
            <?= form_error('deskripsi'); ?>
        </p>
    </div>
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <select name="kategori" id="kategori" class="form-control" required>
            <option value="">Pilih Kategori</option>

        </select>
        <p>
            <?= form_error('kategori'); ?>
        </p>
    </div>
    <div class="form-group">
        <label for="tipe">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Input Nama" value="<?= $nama; ?>" required>
        <p>
            <?= form_error('nama'); ?>
        </p>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><?= $submit; ?></button>
    </div>
    <?php if (isset($berhasil)): ?>
        <p class="text-success"><?= $berhasil;?></p>
    <?php endif; ?>
    <?php if (isset($gagal)): ?>
        <p class="text-danger"><?= $gagal;?></p>
    <?php endif; ?>
</form>
