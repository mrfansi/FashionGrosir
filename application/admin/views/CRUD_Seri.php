<?php
$url = site_url('seri/simpan');
if ($submit == 'Ubah') {
    $id = $seris->s_kode;
    $img = $seris->s_image;
    $nama = $seris->s_nama;
} else if ($submit == 'Simpan') {
    $id = $kode;
    $img = '';
    $nama = '';
}
?>

<form action="<?= $url; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ecommerce_eazy" value="<?= $this->security->get_csrf_hash(); ?>">
    <input type="hidden" id="inputfilename" name="image" value="<?= $img; ?>">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <div class="form-group">
        <label for="file">Gambar</label>
        <img class="img-fluid mx-auto d-block mb-2" height="300" width="300" src="" id="filename"
             style="display: none;">
        <div class="custom-file">
            <input class="custom-file-input " id="imageupload" type="file" name="image"
                   data-url="<?= site_url('upload/single_image'); ?>">
            <label class="custom-file-label" for="customFile">Pilih gambar</label>
        </div>
        <div class="progress" style="display: none;">
            <div class="progress-bar bg-success" id="progress" role="progressbar" style="width: 25%" aria-valuenow="25"
                 aria-valuemin="0" aria-valuemax="100">25%
            </div>
        </div>
        <div class="form-group">
            <label for="nama">Nomor Seri</label>
            <input type="text" class="form-control" name="nama" placeholder="Input Nomor Seri" value="<?= $nama; ?>"
                   required>
            <p>
                <?= form_error('nama'); ?>
            </p>
        </div>
        <div class="form-group">
            <table class="table table-sm" id="tabel">
                <thead>
                <tr>
                    <th scope="col">Warna</th>
                    <th scope="col">Ukuran</th>
                    <th scope="col">No. Seri</th>
                    <th scope="col">QTY</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <select name="warna[]" id="warna" class="form-control small" required>
                            <?php foreach ($this->warna->get_all() as $katwarna): ?>
                                <option value="<?= $katwarna->w_kode; ?>"><?= $katwarna->w_nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select name="ukuran[]" id="ukuran" class="form-control small" required>
                            <?php foreach ($this->ukuran->get_all() as $katukuran): ?>
                                <option value="<?= $katukuran->u_kode; ?>"><?= $katukuran->u_nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select name="seri[]" id="seri" class="form-control small">
                            <option value="0">Tidak ada</option>
                            <?php foreach ($this->seri->get_all() as $katseri): ?>
                                <option value="<?= $katseri->s_kode; ?>"><?= $katseri->s_nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td><input name="qty[]" id="qty" type="number" class="form-control" value="0" min="0"></td>
                    <td>
                        <a href="#" class="mt-1" onclick="hapus_detil($(this))"><i
                                    class="fa fa-window-close fa-2x"></i></a>
                    </td>
                </tr>
                <tfoot>
                <tr>
                    <th colspan="4">
                        <a href="#" class="mt-1" id="baru_detil">Tambah Detail</a>
                    </th>
                </tr>
                </tfoot>
                </tbody>
            </table>
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
<script>
    $(function () {
        $('#imageupload').fileupload({
            dataType: 'json',
            done: function (e, data) {
                $('#filename').attr("src", "<?= base_url('upload/');?>" + data.result.file_name);
                $('#inputfilename').attr("value", data.result.file_name);
            },
            progressall: function (e, data) {
                var showimgsrc = $('#filename');
                var hideupload = $('div.custom-file');
                var showprogress = $('div.progress');

                hideupload.hide();
                showprogress.show();
                showimgsrc.show();

                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress').css(
                    'width',
                    progress + '%'
                ).text(progress + '%');
            }
        });
    });
</script>
