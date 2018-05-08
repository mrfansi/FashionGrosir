
<?php if (isset($_SESSION['validation']) && $_SESSION['validation'] != ""): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['validation']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (isset($_SESSION['gagal']) && $_SESSION['gagal'] != ""): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['gagal']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    </div>
<?php endif; ?>
<?php if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] != ""): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['berhasil']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?= form_open_multipart('upload/do_upload'); ?>
    <input type="hidden" name="token_fg" value="<?= $this->security->get_csrf_hash(); ?>">
    <input type="hidden" name="item_kode" value="<?= $item_kode ?>">
    <div class="form-group">
        <label>Upload</label>
        <input id="images" name="images[]" type="file" class="file" data-preview-file-type="text" multiple>
    </div>
</form>
<br>
<div class="table-responsive">
    <table id="tables" class="table table-sm table-borderless">
        <thead>
        <tr>
            <th scope="col">Nama</th>
            <th scope="col">Foto</th>
            <th scope="col">Default</th>
            <th scope="col" class="text-center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($item_imgs != NULL): ?>
            <?php foreach ($item_imgs as $img): ?>
                <tr>
                    <td><?= $img->ii_nama; ?></td>
                    <td><img src="<?= base_url('upload/' . $img->ii_url); ?>" alt="<?= $img->ii_nama; ?>" height="100" width="100"></td>
                    <td><?= $img->ii_default == 0 ? '<i class="fas fa-times"></i>' : '<i class="fas fa-check"></i>'; ?></td>
                    <td class="text-center">
                        <a tooltip href="<?= site_url('item_img/set_default/' . $img->i_kode . '/' . $img->ii_kode); ?>" title="Set default" onclick="utama($(this))" data-id="<?= $img->ii_kode; ?>"><i
                                    class="fas fa-wrench"></i></a> |
                        <a tooltip data-toggle="modal" title="Hapus <?= $title_page; ?>" href="#"
                           onclick="hapus($(this))" data-target="#hapus"
                           data-id="<?= $img->ii_kode; ?>"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<script>
    // ------------------------------------------------------ //
    // Modal CRUD
    // ------------------------------------------------------ //

    function tambah() {
        modal = $('#crud');
        bodymodal = modal.find('div.modal-body');

        bodymodal.load("<?= site_url('item/tambah'); ?>");
    }

    function edit(data) {
        d = data;
        id = d.attr('data-id');
        modal = $('#crud');
        bodymodal = modal.find('div.modal-body');

        bodymodal.load("<?= site_url('item/ubah/'); ?>" + id);
    }

    function tambah_qty(data) {
        d = data;
        id = d.attr('data-id');
        modal = $('#crud');
        bodymodal = modal.find('div.modal-body');

        bodymodal.load("<?= site_url('item/tambah_qty/'); ?>" + id);
    }

    function detil(data) {
        d = data;
        id = d.attr('data-id');
        modal = $('#crud');
        bodymodal = modal.find('div.modal-body');

        bodymodal.load("<?= site_url('item/detil/'); ?>" + id);
    }

    function hapus(data) {
        d = data;
        id = d.attr('data-id');
        $('a#hapus').attr('href', "<?= site_url('item_img/hapus/'); ?>" + id);
    }

    // ------------------------------------------------------ //
    // Data table users
    // ------------------------------------------------------ //
    $('#tables').DataTable();

    $(document).ready(function () {
        $('[tooltip]').tooltip();
    });

    // ------------------------------------------------------ //
    // Remove after 5 second
    // ------------------------------------------------------ //

    $(document).ready(function () {
        setTimeout(function () {
            if ($('[role="alert"]').length > 0) {
                $('[role="alert"]').remove();
            }
        }, 5000);
    });

    // ------------------------------------------------------ //
    // Fileinput
    // ------------------------------------------------------ //
    // initialize with defaults
    $("#images").fileinput({
        uploadAsync: false,
        maxFileCount: 5,
        showUpload: true,
        showRemove: true,
    });
</script>
</body>
</html>