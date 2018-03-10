var app = angular.module('admFashionGrosir', []);

app.controller('LoginController', function ($scope, $http) {
    $scope.loginValidation = function (valid) {
        if (valid) {
            var data = $.param(
                {
                    token_fg: $scope.loginToken,
                    loginUsername: $scope.loginUsername,
                    loginPassword: $scope.loginPassword
                }
            );

            var post = {
                method: "POST",
                url: "auth/login",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                },

                data: data
            };

            $http(post).then(function success(res) {
                console.log(res.data);
                $scope.xxx = res.data;
                window.location.href = 'dashboard';
            }, function error(res) {
                console.log(res.status.text);
            });
        } else {

        }
    }
});

app.controller('DashboardController', function ($scope, $http) {
    $scope.item_count = function () {
        var get = {
            method: "GET",
            url: "dashboard/item_count"
        };
        $http(get).then(function (res) {
            $scope.total_item = res.data;
        }, function (res) {
            console.log(res.data);
        });
    };

    $scope.cust_count = function () {
        var get = {
            method: "GET",
            url: "dashboard/cust_count"
        };
        $http(get).then(function (res) {
            $scope.total_cust = res.data;
        }, function (res) {
            console.log(res.data);
        });
    };

});

app.controller('TemController', function ($http) {
    var tem = this;
    tem.list_kategori = [];

    var get = {
        method: "GET",
        url: "dashboard/list_kategori",
        headers: {
            'Content-Type': 'application/json'
        }
    };

    $http(get).then(function (res) {
        console.log(res.data);
        tem.list_kategori = res.data
    }, function (res) {
        console.log(res.data);
    });
});