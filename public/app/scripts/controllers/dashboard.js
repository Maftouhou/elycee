'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:DashboardCtrl
 * @description
 * # DashboardCtrl
 * Controller of the elycee
 */
angular.module('elycee')
	.controller('DashboardCtrl', ['$scope', '$http', '$location', 'userService', function($scope, $http, $location, userService) {

   		$scope.out = function() {
	        userService.logout();
	        $location.path('api/logout');
        };
        // if(!userService.checkIfLoggedIn())
        // $location.path('/login');

        const tl = new TimelineMax({ paused: true, completed: true});

	  	tl.to(".collapse", 1.7, { left: "0%", ease: Expo.easeOut }, 0);
	  	tl.staggerFrom(".collapse ul li a", 1.2, { left: "-100%", opacity: 0, ease: Expo.easeOut }, 0.2, 0.8);
	  	tl.staggerFrom(".panel.panel-default", 1.2, { y: "100%", opacity: 0, ease: Expo.easeOut }, 0.2, 0.8);
	  	tl.restart(); 
		
	}]);