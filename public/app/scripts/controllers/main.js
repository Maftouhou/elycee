'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  .controller('MainCtrl', function ($scope, $http) {
    this.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
    // $scope.message = 'This is the home view.';

    $http.get("api/v1/index")
        .success(function(data) {
            $scope.name = data[0].name;
            console.log(data[0].name);
    });
  });
