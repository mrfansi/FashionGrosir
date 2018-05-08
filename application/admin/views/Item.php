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
                            <h2><i class="fas fa-shopping-cart"></i> <?= $title_page; ?></h2>
                        </div>
                        <div class="col-sm-2">
                            <a tooltip data-toggle="modal" title="Tambah <?= $title_page; ?>" href="#"
                               onclick="tambah()" data-target="#crud" class="btn btn-sm btn-primary btn-block"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tables" class="table table-sm table-borderless">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">Nama</th>
                                <th scope="col" class="text-center">Kategori</th>
                                <th scope="col" class="text-center">Warna</th>
                                <th scope="col" class="text-center">Ukuran</th>
                                <th scope="col" class="text-center">Seri</th>
                                <th scope="col" class="text-center">Hrg VIP</th>
                                <th scope="col" class="text-center">Hrg Reseller</th>
                                <th scope="col" class="text-center">Deskripsi</th>
                                <th scope="col" class="text-center">QTY</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($items != NULL): ?>
                                <?php foreach ($items as $item): ?>
                                    <tr>
                                        <td class="text-center text-danger"><?= $item->i_nama; ?></td>
                                        <td class="text-center"><?= $item->k_nama; ?></td>
                                        <td class="text-center"><?= $item->w_nama; ?></td>
                                        <td class="text-center"><?= $item->u_nama; ?></td>
                                        <td class="text-center"><?= $item->s_nama; ?></td>
                                        <td class="text-center"><?= $item->i_hrg_vip; ?></td>
                                        <td class="text-center"><?= $item->i_hrg_reseller; ?></td>
                                        <td class="text-center">
                                            <a data-toggle="modal" href="#"
                                               onclick="deskripsi($(this))" data-target="#deskripsi"
                                               data-msg="<?= $item->i_deskripsi; ?>">Lihat</a>
                                        </td>
                                        <td class="text-center"><?= $item->qty != null ? $item->qty : '0' ; ?></td>
                                        <td class="text-center">
                                            <a tooltip data-toggle="modal" title="Ubah <?= $title_page; ?>" href="#"
                                               onclick="edit($(this))" data-target="#crud"
                                               data-id="<?= $item->i_kode; ?>"><i class="far fa-edit"></i></a> |
                                            <a tooltip data-toggle="modal" title="Tambah Stok <?= $title_page; ?>"
                                               href="#"
                                               onclick="tambah_qty($(this))" data-target="#crud"
                                               data-id="<?= $item->i_kode; ?>"><i class="fas fa-cart-plus"></i></a> |
                                            <a tooltip data-toggle="modal" title="Tambah Foto <?= $title_page; ?>"
                                               href="#"
                                               onclick="tambah_foto($(this))" data-target="#crudfoto"
                                               data-id="<?= $item->i_kode; ?>"><i class="fas fa-images"></i></a> |
                                            <a tooltip data-toggle="modal" title="Hapus <?= $title_page; ?>" href="#"
                                               onclick="hapus($(this))" data-target="#hapus"
                                               data-id="<?= $item->i_kode; ?>"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="crud"><i class="fas fa-shopping-cart"></i> <?= $title_page; ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="crudfoto" tabindex="-1" role="dialog" aria-labelledby="crudfoto" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="crud"><i class="far fa-image"></i> Foto</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deskripsi" tabindex="-1" role="dialog" aria-labelledby="deskripsi" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="crud"><i class="fas fa-file-alt"></i> Deskripsi</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="hapus"><i class="fas fa-shopping-cart"></i> <?= $title_page; ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <a id="hapus" href="#" class="btn btn-primary btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
