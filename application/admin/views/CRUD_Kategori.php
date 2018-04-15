<script>
    var base_url = '<?= base_url(); ?>';
    var hashing = '<?= $this->security->get_csrf_hash(); ?>';
</script>
<br>
<section class="container" ng-controller="CrudKategoriController">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>Kategori</h4>
                </div>
                <div class="card-body">
                    <form id="kategoriForm" name="kategoriForm" ng-submit="kategoriSimpan(kategoriForm.$valid)" novalidate>
                        <div class="row">
                            <div class="col-sm-5 form-group" ng-class="{'is-invalid' : kategoriForm.kat_nama.$invalid && !kategoriForm.kat_nama.$pristine}">
                                <input type="text" class="form-control" placeholder="Nama Kategori" ng-model="kat_nama" name="kat_nama" required>
                            </div>

                            <div class="col-sm-5 form-group" ng-class="{'is-invalid' : kategoriForm.kat_parent_id.$invalid && !kategoriForm.kat_parent_id.$pristine}">
                                <select class="form-control" ng-model="kat_parent_id" name="kat_parent_id" required>
                                    <option value="0" selected>Root</option>
                                </select>
                            </div>
                            <div class="col-sm-2 form-group">
                                <button class="btn btn-primary btn-block" ng-disabled="kategoriForm.$invalid">Buat</button>
                            </div>
                        </div>
                        <!--                        <div class="row" ng-show="msg">-->
                        <!--                            <div class="col-sm-12">-->
                        <!--                                -->
                        <!--                            </div>-->
                        <!--                        </div>-->
                    </form>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Parent</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr ng-repeat="kategori in kategories">
                                <td>{{kategori.Kat_Nama}}</td>
                                <td>{{kategori.Kat_Parent_ID}}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ubahKategori">Ubah</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ubahKategori" tabindex="-1" role="dialog" aria-labelledby="ubahKategori" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Kategori</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="container" ng-submit="ubahKategori()">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" ng-model="u_kat_nama" required>
                            </div>
                            <div class="form-group">
                                <label for="">Parent</label>
                                <select class="form-control" ng-model="u_kat_parent_id" required>
                                    <option value="0">Root</option>
                                </select>
                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" ng-click="ubahKategori()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</section>