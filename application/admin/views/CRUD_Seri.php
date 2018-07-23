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
        <div class="table-responsive">
            <table id="tbl_seri" class="table table-sm table-hover">
                <thead>
                <tr>
                    <th scope="col"><input type="checkbox" name="select_all" value="1" id="pilih_item_semua"></th>
                    <th scope="col">Kode Item</th>
                    <th scope="col">Warna</th>
                    <th scope="col">Ukuran</th>
                    <th scope="col">Harga</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($items != NULL): ?>
                    <?php foreach ($items as $item): ?>
                        <?php foreach ($item->item_detil as $detil): ?>
                            <?php if (isset($item->item_detil) && $qty($detil->item_detil_kode) != 0): ?>
                                <tr>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"><?= $item->i_nama; ?></td>
                                    <td class="align-middle">
                                        <?php if (isset($warna($detil->item_detil_kode, $detil->w_kode)->w_nama)): ?>
                                            <?= $warna($detil->item_detil_kode, $detil->w_kode)->w_nama; ?>

                                        <?php endif; ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= $detil->item_detil_ukuran; ?>
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" min="0" max="9999999" value="0"
                                               name="harga" placeholder="Input harga grosir">
                                    </td>
                                </tr>
                            <?php endif; ?>

                        <?php endforeach; ?>

                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
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
<script>
    // ------------------------------------------------------ //
    // Data table
    // ------------------------------------------------------ //
    var table = $('#tbl_seri').DataTable({
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false,
            'className': 'dt-body-center',
            'render': function (data, type, full, meta) {
                return '<input type="checkbox" name="pilih_item[]" value="' + $('<div/>').text(data).html() + '">';
            }
        }],
        "ordering": false,
        "info": false,
        "paging": false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json"
        }
    });
    // Handle click on "Select all" control
    $('#pilih_item_semua').on('click', function () {
        // Get all rows with search applied
        var rows = table.rows({'search': 'applied'}).nodes();
        // Check/uncheck checkboxes for all rows in the table
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
    });

    // Handle click on checkbox to set state of "Select all" control
    $('#tbl_seri tbody')
        .on('change', 'input[type="checkbox"]', function () {
            // If checkbox is not checked
            if (!this.checked) {
                var el = $('#pilih_item_semua').get(0);
                // If "Select all" control is checked and has 'indeterminate' property
                if (el && el.checked && ('indeterminate' in el)) {
                    // Set visual state of "Select all" control
                    // as 'indeterminate'
                    el.indeterminate = true;
                }
            }
        })
        .on('click', 'tr', function () {
            $(this).find('input[type="checkbox"]').click();
        });

</script>
