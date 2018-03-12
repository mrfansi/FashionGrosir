<div ng-controller="ItemsController">
    <section>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <input class="form-control" type="text" name="search" placeholder="Filter data">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <script>
                            var items =
                        </script>
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga1 (Rp)</th>
                                <th>Harga2 (Rp)</th>
                                <th>Harga3 (Rp)</th>
                                <th>Berat (gr)</th>
                                <th>Stok</th>
                                <th>Warna</th>
                                <th>Opsi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="item in items">
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
    </section>
</div>
