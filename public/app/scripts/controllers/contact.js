'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:ContactCtrl
 * @description
 * # ContactCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  	.controller('ContactCtrl', function ($scope, $http, contactService, $location) {


  		$scope.submitContact = function() {

	        contactService.save($scope.firstname, $scope.lastname, $scope.email, $scope.title, $scope.content)
	            .success(function(data) {
	            	$location.path('/');
	            })
	            .error(function(data) {
	                console.log("error ");
	            });
    	};



	    const tl = new TimelineMax({ paused: true, completed: true});
		  	tl.from(".bg", 1.7, { x: "100%", ease: Expo.easeOut }, 0);
		  	tl.from(".row", 1.7, { x: "100%", opacity:0, ease: Expo.easeOut }, 0.2);
		  	tl.restart(); 
    });
