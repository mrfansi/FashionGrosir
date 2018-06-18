<?php
$url = site_url('resi/simpan');
if ($submit == 'Ubah') {
    $id = $artikel->artikel_kode;
    $judul = $artikel->artikel_judul;
    $content = $artikel->artikel_content;
} else if ($submit == 'Simpan') {
    $id = $kode;
    $judul = 'Laporan Resi ' . date('d-m-Y H:i:s');
    $content = '';
}
?>

<form action="<?= $url; ?>" method="post">
    <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" name="judul" value="<?= $judul; ?>" placeholder="Input Judul Artikel">
    </div>
    <div class="form-group">
        <label for="content">Konten</label>
        <textarea class="form-control" name="content" id="content" cols="30" rows="10"><?= $content; ?></textarea>
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
<script>
    tinymce.init({
        selector: 'textarea',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code help wordcount'
        ],
        toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
    });
</script>
