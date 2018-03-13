var app = angular.module('admFashionGrosir', ['ngRoute']);

app.run(function($animate) {
    $animate.enabled(true);
});

app.config(function ($routeProvider) {
    $routeProvider
        .when('/dashboard', {
            templateUrl: base_url + "adm.php/navigasi/dashboard",
            reloadOnSearch: false
        })
        // Item Controller
        .when('/item/kategori/:id', {
            templateUrl: function (param) {
                return base_url + "adm.php/navigasi/item";
            },
            reloadOnSearch: false
        })
        .when('/item/kategori/baru', {
            templateUrl: base_url + "adm.php/kategori/baru",
            reloadOnSearch: false
        })
        .when('/item/baru', {
            templateUrl: base_url + "adm.php/item/baru",
            reloadOnSearch: false
        })
        .when('/item/:action/:id', {
            templateUrl: function (param) {
                return base_url + "adm.php/item/" + param.action + "/" + param.id;
            },
            reloadOnSearch: false
        });
});

app.factory('Page', function () {
    var title = 'Default';
    return {
        title: function () {
            return title;
        },
        setTitle: function (newTitle) {
            title = newTitle;
        }
    };
});

app.controller('MainController', function ($scope, $http, $location, Page) {
    $scope.Page = Page;
    angular.element(document).ready(function () {
        $scope.list_kategories = function () {
            $http({
                method: "GET",
                url: base_url + "adm.php/get/list_kategori"
            }).then(function (res) {
                $scope.kategories = res.data;
            }, function (res) {
                console.log(res.data);
            });
        };
    });
});

app.controller('DashboardController', function ($scope, $http, Page) {
    // judul
    Page.setTitle('Dashboard');
    angular.element(document).ready(function () {
        $http({
            method: "GET",
            url: base_url + "adm.php/get/total_customers"
        }).then(function (res) {
            $scope.total_customers = res.data;
        }, function (res) {
            console.log(res.statusText);
        });

        $http({
            method: "POST",
            url: base_url + "adm.php/dashboard/dashboard_totalitem",
            data: $.param(
                {
                    token_fg: hashing
                }
            )
        }).then(function (res) {
            $scope.total_items = res.data;
        }, function (res) {
            console.log(res.statusText);
        });
    });
});

app.controller('ItemsController', function ($scope, $http, Page, $routeParams) {
    // judul
    Page.setTitle('Items');
    angular.element(document).ready(function () {
        $scope.slider = {
            minValue: 100,
            maxValue: 400,
            options: {
                floor: 0,
                ceil: 500,
                translate: function(value, sliderId, label) {
                    switch (label) {
                        case 'model':
                            return '<b>Min harga:</b> Rp.' + value;
                        case 'high':
                            return '<b>Max harga:</b> Rp.' + value;
                        default:
                            return 'Rp.' + value
                    }
                }
            }
        };

        $http({
            method: "GET",
            url: base_url + "adm.php/get/kategori/" + $routeParams.id
        }).then(function (res) {
            $scope.items = res.data;
        }, function (res) {
            console.log(res.data);
        });
    });
});
