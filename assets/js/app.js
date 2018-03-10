var app = angular.module('admFashionGrosir', []);

app.controller('LoginController', function ($scope, $http) {
    $scope.loginValidation = function (valid) {
        if (valid) {
            var data = $.param(
                {
                    token_fg: $scope.token_fg,
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
                window.location.href = 'get';
            }, function error(res) {
                console.log(res);
            });
        } else {

        }
    }
});

app.controller('DashboardController', function ($scope, $http) {
    angular.element(document).ready(function () {
        $http({
            method: "GET",
            url: "get/total_customers"
        }).then(function (res) {
            $scope.total_customers = res.data;
        }, function (res) {
            console.log(res.statusText);
        });

        $http({
            method: "GET",
            url: "get/total_items"
        }).then(function (res) {
            $scope.total_items = res.data;
        }, function (res) {
            console.log(res.statusText);
        });
    });
});

app.controller('TemController', function ($scope, $http) {
    angular.element(document).ready(function () {
        $http({
            method: "GET",
            url: "get/list_kategori"
        }).then(function (res) {
            console.log(res.data);
            $scope.kategories = res.data;
        }, function (res) {
            console.log(res.data);
        });
    });
});