<section ng-controller="ItemsController" ng-animate-children>
    <br>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Filter</h4>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col mb-2">
                            <rzslider rz-slider-model="slider.minValue"
                                      rz-slider-high="slider.maxValue"
                                      rz-slider-options="slider.options"></rzslider>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-2">
                            <input class="form-control" type="text" name="search" placeholder="Filter data"
                                   ng-model="filterdata">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Kategori - </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Harga1 (Rp)</th>
                                    <th>Harga2 (Rp)</th>
                                    <th>Harga3 (Rp)</th>
                                    <th>Berat (gr)</th>
                                    <th>Stok (pcs)</th>
                                    <th>Warna</th>
                                    <th>Opsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="item in items | filter: filterdata">
                                    <td>{{item.item_kode}}</td>
                                    <td>{{item.item_nama}}</td>
                                    <td>{{item.item_harga1 | currency: 'Rp.'}}</td>
                                    <td>{{item.item_harga2 | currency: 'Rp.'}}</td>
                                    <td>{{item.item_harga3 | currency: 'Rp.'}}</td>
                                    <td>{{item.item_berat}}</td>
                                    <td>{{item.item_stok}}</td>
                                    <td>{{item.warna_nama}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Ubah</button>
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
