'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  .controller('MainCtrl', function($scope, $http) {
  
    // $scope.message = 'This is the home view.';

    $http.get("api/post")
      .success(function(data) {
        $scope.posts = data;
        console.log($scope.posts);
      });
  });