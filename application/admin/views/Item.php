<?php include "master/Header.php"; ?>
<body>
<?php include 'master/Menu.php'; ?>
<div class="page">
    <!-- navbar-->
    <header class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i
                                    class="icon-bars"> </i></a><a href="<?= base_url('adm.php/dashboard') ?>"
                                                                  class="navbar-brand">
                            <div class="brand-text d-none d-md-inline-block"><strong
                                        class="text-primary">FASHION GROSIR</strong></div>
                        </a></div>
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <li class="nav-item"><a href="<?= base_url('adm.php/auth/logout') ?>" class="nav-link logout">Logout<i
                                        class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <br>
    <section>
        <?php if (isset($_SESSION['validation']) && $_SESSION['validation'] != ""): ?>
            <div class="col">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['validation']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['gagal']) && $_SESSION['gagal'] != ""): ?>
            <div class="col">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['gagal']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] != ""): ?>
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['berhasil']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php endif; ?>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-10">
                            <h1><i class="fas fa-shopping-cart"></i> <?= $title_page; ?></h1>
                            <a data-toggle="modal" href="#" onclick="tambah()" data-target="#crud">Buat baru</a>
                        </div>
                        <div class="col-sm-2">

                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tables" class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Hrg VIP</th>
                                <th scope="col">Hrg Reseller</th>
                                <th scope="col">Warna</th>
                                <th scope="col">Ukuran</th>
                                <th scope="col">Seri</th>
                                <th scope="col">QTY</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($items != NULL): ?>
                                <?php foreach ($items

                                               as $item): ?>
                                    <?php $counter = isset($item->item_detil) ? count((array)$item->item_detil) + 1 : 1 ?>
                                    <tr>
                                        <td rowspan="<?= $counter; ?>"
                                            scope="row"
                                            class="align-middle"><?= $item->i_nama; ?></td>
                                        <td rowspan="<?= $counter; ?>"
                                            class="align-middle"
                                            id="rupiah"><?= $item->i_hrg_vip; ?></td>
                                        <td rowspan="<?= $counter; ?>"
                                            class="align-middle"
                                            id="rupiah"><?= $item->i_hrg_reseller; ?></td>
                                        <?php if (!isset($item->item_detil)): ?>
                                            <td><i>(Kosong)</i></td>
                                            <td><i>(Kosong)</i></td>
                                            <td><i>(Kosong)</i></td>
                                            <td><i>(Kosong)</i></td>
                                            <td>
                                                <a href="#" onclick="edit($(this))" data-target="#crud"
                                                   data-id="<?= $item->i_kode; ?>">
                                                    Tambah Detil
                                                </a> |
                                                <a href="#" onclick="edit($(this))" data-target="#crud"
                                                   data-id="<?= $item->i_kode; ?>">
                                                    Hapus
                                                </a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php if (isset($item->item_detil)): ?>
                                        <?php foreach ($item->item_detil as $detil): ?>
                                            <tr>
                                                <td>
                                                    <?php if (isset($warna($detil->ide_kode, $detil->w_kode)->w_nama)): ?>
                                                        <?= $warna($detil->ide_kode, $detil->w_kode)->w_nama; ?>
                                                    <?php else: ?>
                                                        <i>(Kosong)</i>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if (isset($ukuran($detil->ide_kode, $detil->u_kode)->u_nama)): ?>
                                                        <?= $ukuran($detil->ide_kode, $detil->u_kode)->u_nama; ?>
                                                    <?php else: ?>
                                                        <i>(Kosong)</i>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if (isset($seri($detil->ide_kode, $detil->s_kode)->s_nama)): ?>
                                                        <?= $seri($detil->ide_kode, $detil->s_kode)->s_nama; ?>
                                                    <?php else: ?>
                                                        <i>(Kosong)</i>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?= $qty($detil->ide_kode); ?>
                                                </td>

                                                <td>
                                                    <a tooltip data-toggle="modal" title="Ubah <?= $title_page; ?>"
                                                       href="#"
                                                       onclick="edit($(this))" data-target="#crud"
                                                       data-id="<?= $detil->i_kode; ?>"><i
                                                                class="far fa-edit fa-lg"></i></a>
                                                    |
                                                    <a tooltip data-toggle="modal"
                                                       title="Tambah Stok <?= $title_page; ?>"
                                                       href="#"
                                                       onclick="tambah_qty($(this))" data-target="#crud"
                                                       data-id="<?= $detil->ide_kode; ?>"><i
                                                                class="fas fa-cart-plus fa-lg"></i></a> |
                                                    <a tooltip data-toggle="modal"
                                                       title="Tambah Foto <?= $title_page; ?>"
                                                       href="#"
                                                       onclick="tambah_foto($(this))" data-target="#crudfoto"
                                                       data-id="<?= $detil->ide_kode; ?>"><i
                                                                class="fas fa-images fa-lg"></i></a> |
                                                    <a tooltip data-toggle="modal" title="Hapus <?= $title_page; ?>"
                                                       href="#"
                                                       onclick="hapus($(this))" data-target="#hapus"
                                                       data-id="<?= $detil->ide_kode; ?>"><i
                                                                class="far fa-trash-alt fa-lg"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

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

            function detil_item(data) {
                d = data;
                url = d.attr('data-url');

                modal = $('#detil_item');
                bodymodal = modal.find('div.modal-body');

                bodymodal.load(url);
            }

            function deskripsi(data) {
                d = data;
                msg = d.attr('data-msg');

                $('textarea#deskripsi').val(msg);
            }

            function tambah_foto(data) {
                d = data;
                id = d.attr('data-id');

                modal = $('#crudfoto');
                bodymodal = modal.find('div.modal-body');

                bodymodal.load("<?= site_url('item_img/tambah/'); ?>" + id);
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
                $('a#hapus').attr('href', "<?= site_url('item/hapus/'); ?>" + id);
            }

            // ------------------------------------------------------ //
            // Data table Pagination
            // ------------------------------------------------------ //
            // $('#tables').DataTable();
            // $('#click').click(function () {
            //     $(this).closest('tr').nextUntil("tr:has(#child)").show();
            // });

            // ------------------------------------------------------ //
            // Tooltip
            // ------------------------------------------------------ //
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
            // Format Rupiah
            // ------------------------------------------------------ //
            var moneyFormat = wNumb({
                mark: ',',
                decimals: 2,
                thousand: '.',
                prefix: 'Rp. ',
                suffix: ''
            });

            $(document).ready(function () {
                $('td[id="rupiah"]').each(function (index) {
                    var value = parseInt($(this).html()),
                        hasil = moneyFormat.to(value);

                    $(this).html(hasil);
                })
            });
        </script>

    </section>
    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <p>Fashion Grosir &copy; 2018</p>
                </div>

            </div>
        </div>
    </footer>
</div>
<div class="modal fade" id="crud" tabindex="-1" role="dialog" aria-labelledby="crud" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detil_item" tabindex="-1" role="dialog" aria-labelledby="detil_item" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="crudfoto" tabindex="-1" role="dialog" aria-labelledby="crudfoto" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">

            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <a id="hapus" href="#" class="btn btn-sm btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
