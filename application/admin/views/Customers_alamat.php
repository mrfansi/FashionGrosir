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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all"
          rel="stylesheet" type="text/css">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js"
            type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js"
            type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/purify.min.js"
            type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/themes/fa/theme.min.js"></script>
    <!-- Main File-->
    <script src="<?= base_url('assets/js/front.js'); ?>"></script>
    <script src="<?= base_url('assets/js/menu.js'); ?>"></script>
</head>
<body>
<?php include_once('master/Menu.php'); ?>
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
                            <h2>List Alamat : <?= $customer->customers_realname; ?></h2>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?= site_url('customers/alamat/' . $customer->customers_id . '/tambah'); ?>"
                               class="btn btn-sm btn-primary btn-block">Add</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tables" class="table table-sm table-borderless">
                            <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">Kabupaten</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Desa</th>
                                <th scope="col">Kodepos</th>
                                <th scope="col" class="text-center">Detil</th>
                                <th scope="col" class="text-center">Ubah</th>
                                <th scope="col" class="text-center">Hapus</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($addresses)): ?>
                                <?php foreach ($addresses as $address): ?>
                                    <tr>
                                        <td><?= $address->pengiriman_judul; ?></td>
                                        <td><?= $address->pengiriman_provinsi; ?></td>
                                        <td><?= $address->pengiriman_kabupaten; ?></td>
                                        <td><?= $address->pengiriman_kecamatan; ?></td>
                                        <td><?= $address->pengiriman_desa; ?></td>
                                        <td><?= $address->pengiriman_kodepos; ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('customers/alamat/' . $customer->customers_id . '/detil/') . $address->id; ?>"><i
                                                        class="far fa-user"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= site_url('customers/alamat/' . $customer->customers_id . '/detil/') . $address->id; ?>"><i
                                                        class="far fa-edit"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" onclick="hapus($(this))" data-toggle="modal"
                                               data-target="#hapus" data-id="<?= $address->id; ?>"><i
                                                        class="far fa-trash-alt"></i></a>
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
        <div class="col">
            <a href="<?= site_url('customers'); ?>" class="btn btn-primary">Kembali</a>
        </div>
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
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="hapus">Customers</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <a id="hapus" href="<?= site_url('customers/hapus/'); ?>" class="btn btn-primary btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
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
<script>
    // ------------------------------------------------------ //
    // Modal change password
    // ------------------------------------------------------ //

    function changepass(data) {
        var d = data;
        var id = d.attr('data-id');
        var $modalpass = $('form#changepassword');

        $modalpass.find('input[type=password]').val('');
        $modalpass.find('input#id').val(id);
    }

    // ------------------------------------------------------ //
    // Modal change password
    // ------------------------------------------------------ //

    function hapus(data) {
        var d = data;
        var id = d.attr('data-id');
        var $button = $('a#hapus');
        var action = $button.attr('href');
        $button.attr('href', action + id);
    }

    // ------------------------------------------------------ //
    // Data table customers
    // ------------------------------------------------------ //
    $('#tables').DataTable();
</script>
</body>
</html>
