'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:SearchCtrl
 * @description
 * # SearchCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  	.controller('SearchCtrl', function ($http, $scope, $location, $rootScope) {


  		$scope.submitSearch = function() {
	            $rootScope.search = $scope.searchText;
	            $location.path('/actus');
    	};



	   const tl = new TimelineMax({ paused: true, completed: true});
		  	tl.from(".bg", 1.7, { x: "100%", ease: Expo.easeOut }, 0);
		  	tl.from(".row", 1.7, { x: "100%", opacity:0, ease: Expo.easeOut }, 0.2);
		  	tl.restart(); 
    });
