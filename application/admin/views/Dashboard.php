<div ng-controller="DashboardController">
    <!-- Counts Section -->
    <section class="dashboard-counts section-padding">
        <div class="container-fluid">
            <div class="row">
                <!-- Count item widget-->
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-user"></i></div>
                        <div class="name"><strong class="text-uppercase">Customers</strong><span>Last 7 days</span>
                            <div class="count-number" ng-bind="total_customers"></div>
                        </div>
                    </div>
                </div>
                <!-- Count item widget-->
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-padnote"></i></div>
                        <div class="name"><strong class="text-uppercase">Items</strong><span>Last 5 days</span>
                            <div class="count-number" ng-bind="total_items"></div>
                        </div>
                    </div>
                </div>

                <!-- Count item widget-->
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-bill"></i></div>
                        <div class="name"><strong class="text-uppercase">Order</strong><span>Last 2 days</span>
                            <div class="count-number">123</div>
                        </div>
                    </div>
                </div>
                <!-- Count item widget-->
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-list"></i></div>
                        <div class="name"><strong class="text-uppercase">Invoices</strong><span>Last 3 months</span>
                            <div class="count-number">92</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Statistics Section-->
    <section class="statistics">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-lg-4">
                    <!-- Income-->
                    <div class="card income text-center">
                        <div class="icon"><i class="icon-line-chart"></i></div>
                        <div class="number">Rp.120.000.000</div>
                        <strong class="text-primary">Penjualan</strong>
                        <p>Total penjualan hari ini</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Monthly Usage-->
                    <div class="card data-usage">
                        <h2 class="display h4">Monthly Usage</h2>
                        <div class="row d-flex align-items-center">
                            <div class="col-sm-6">
                                <div id="progress-circle"
                                     class="d-flex align-items-center justify-content-center"></div>
                            </div>
                            <div class="col-sm-6"><strong class="text-primary">80.56 Gb</strong>
                                <small>Current Plan</small>
                                <span>100 Gb Monthly</span></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- User Actibity-->
                    <div class="card user-activity">
                        <h2 class="display h4">User Activity</h2>
                        <div class="number">210</div>
                        <h3 class="h4 display">Social Users</h3>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                 aria-valuemax="100" class="progress-bar progress-bar bg-primary"></div>
                        </div>
                        <div class="page-statistics d-flex justify-content-between">
                            <div class="page-statistics-left"><span>Pages Visits</span><strong>230</strong></div>
                            <div class="page-statistics-right"><span>New Visits</span><strong>73.4%</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>