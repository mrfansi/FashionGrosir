var app = angular.module('ez', []);

app.controller('loginFormCtrl', function ($scope) {
    $scope.loginValidation = function (valid) {
        if (valid) {
            alert('wow');
        } else {

        }
    }
});