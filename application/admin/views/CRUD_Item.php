<script src="<?= base_url('assets/js/crud_kategori.js'); ?>"></script>
<br>
<section>
    <div class="col">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>Gambar Item</h4>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>Detil Item</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-sm-8 form-group">
                            <select class="form-control">
                                <option value="0">Pilih Kategori</option>
                            </select>
                        </div>

                        <div class="col-sm-4 form-group">
                            <button class="btn btn-primary">Buat Kategori</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Kode Item</label>
                            <input type="text" placeholder="Kode Item" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Nama Item</label>
                            <input type="text" placeholder="Nama Item" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>Harga Item (1)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" placeholder="Harga Item (1)" class="form-control" ng-model="harga1" real-time-currency>
                            </div>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>Harga Item (2)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" placeholder="Harga Item (2)" class="form-control" ng-model="harga2" real-time-currency>
                            </div>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>Harga Item (3)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" placeholder="Harga Item (3)" class="form-control" ng-model="harga3" real-time-currency>
                            </div>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>Harga Item (4)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" placeholder="Harga Item (4)" class="form-control" ng-model="harga4" real-time-currency>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Harga Item Modal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" placeholder="Harga Modal" class="form-control" ng-model="hargamodal" real-time-currency>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>Harga Item Sale</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" placeholder="Harga Sale" class="form-control" ng-model="hargasale" real-time-currency>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>Warna</label>
                            <select class="form-control">
                                <option value="0">Pilih Warna</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2 form-group">
                            <label>Ukuran</label>
                            <select class="form-control">
                                <option value="0">Pilih Ukuran</option>
                                <option value="XXL">XXL</option>
                                <option value="XL">XL</option>
                                <option value="L">L</option>
                                <option value="M">M</option>
                                <option value="S">S</option>
                            </select>
                        </div>
                        <div class="col-sm-2 form-group">
                            <label>PJ</label>
                            <input type="text" placeholder="PJ" class="form-control">
                        </div>
                        <div class="col-sm-2 form-group">
                            <label>LD</label>
                            <input type="text" placeholder="LD" class="form-control">
                        </div>
                        <div class="col-sm-2 form-group">
                            <label>LP</label>
                            <input type="text" placeholder="LP" class="form-control">
                        </div>
                        <div class="col-sm-2 form-group">
                            <label>Bahan</label>
                            <input type="text" placeholder="Bahan" class="form-control">
                        </div>
                        <div class="col-sm-2 form-group">
                            <label>Berat <i>(per gram)</i></label>
                            <input type="text" placeholder="Berat" class="form-control">
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