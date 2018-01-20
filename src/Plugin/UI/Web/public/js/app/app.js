(function (angular) {
    // Create module
    var myApp = angular.module('myApp', []);


    // Controller with dependencies on Angular's $http service and promises
    myApp.controller('CtrlHttp', function ($http, $scope, $q) {
        // Returns a promise which is resolved if http calls succeeds,
        // otherwise the promise is rejected
        $scope.takeTile = function (tile) {
            $http.post('/controller/takeTile' + tile).then(function(response) {
                $scope.tile = response;
            }).catch(function() {
                $scope.status = 'Failed...';
            });

            var defer = $q.defer();


            return defer.promise;
        };
    });
})(angular);