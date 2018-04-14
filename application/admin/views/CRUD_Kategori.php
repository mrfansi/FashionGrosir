<script>
    var base_url = '<?= base_url(); ?>';
    var hashing = '<?= $this->security->get_csrf_hash(); ?>';
</script>
<br>
<section ng-controller="CrudKategoriController">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>Buat Kategori Baru</h4>
            </div>
            <div class="card-body">
                <form ng-submit="katsimpan()">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Kategori</label>
                            <input type="text" class="form-control" placeholder="Nama Kategori" ng-model="kat_nama" name="kat_nama">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Parent</label>
                            <select class="form-control" ng-model="kat_parent_id" name="kat_parent_id">
                                <option value="0">Root</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>