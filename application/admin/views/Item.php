<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
          integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/fontastic.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="<?= base_url('assets/css/grasp_mobile_progress_circle-1.0.0.min.css'); ?>">
    <link rel="stylesheet"
          href="<?= base_url('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.default.css" id="theme-stylesheet'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.ico'); ?>">
    <script>
        var base_url = '<?= base_url(); ?>';
        var hashing = '<?= $this->security->get_csrf_hash(); ?>';
    </script>
    <!-- Javascript files-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/popper.js/umd/popper.min.js'); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/grasp_mobile_progress_circle-1.0.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery.cookie/jquery.cookie.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery-validation/jquery.validate.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/loadingoverlay/loadingoverlay.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/loadingoverlay/loadingoverlay_progress.min.js'); ?>"></script>
    <!-- Main File-->
    <script src="<?= base_url('assets/js/front.js'); ?>"></script>
</head>
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
                               onclick="tambah()" data-target="#crud" class="btn btn-sm btn-primary btn-block"><i
                                        class="fas fa-user-plus"></i></a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tables" class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Hrg VIP</th>
                                <th scope="col">Hrg Reseller</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">QTY</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($items != NULL): ?>
                                <?php foreach ($items as $item): ?>
                                    <tr>
                                        <td><?= $item->i_nama; ?></td>
                                        <td><?= $item->i_hrg_vip; ?></td>
                                        <td><?= $item->i_hrg_reseller; ?></td>
                                        <td><?= $item->i_deskripsi; ?></td>
                                        <td><?= $item->qty; ?></td>
                                        <td class="text-center">
                                            <a tooltip data-toggle="modal" title="Ubah <?= $title_page; ?>" href="#"
                                               onclick="edit($(this))" data-target="#crud"
                                               data-id="<?= $item->i_kode; ?>"><i class="far fa-edit"></i></a> |
                                            <a tooltip data-toggle="modal" title="Tambah QTY <?= $title_page; ?>" href="#"
                                               onclick="tambah_qty($(this))" data-target="#crud"
                                               data-id="<?= $item->i_kode; ?>"><i class="far fa-plus-square"></i></a> |
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
    <div class="modal-dialog" role="document">
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
