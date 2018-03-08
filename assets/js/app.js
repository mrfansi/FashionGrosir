var app = angular.module('ez', []);

app.controller('loginFormCtrl', function ($scope, $http) {
    $scope.loginValidation = function (valid) {
        if (valid) {
            var data = $.param(
                {
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
                // window.location.href = 'adm.php/dashboard';
            }, function error(res) {
                console.log(res.status.text);
                $scope.status = res.status.text;
            })
        } else {

        }
    }
});

app.controller('dashboard', function ($scope, $http) {
    $scope.item_count = function () {
        var get = {
            method: "GET",
            url: "dashboard/item_count"
        };
        $http(get).then(function (res) {
            $scope.total_item = res.data;
        }, function (res) {
            console.log(res.data);
        })
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
        })
    };


});