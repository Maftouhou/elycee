'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:LoginCtrl
 * @description
 * # LoginCtrl
 * Controller of the elycee
 */
angular.module('elycee')
	.controller('LoginCtrl', ['$scope', '$http', '$location', 'userService', function($scope, $http, $location, userService) {

   		$scope.log = function() {
	        userService.login(

	            $scope.username, $scope.password,

	            function(response){
	                $location.path('/dashboard');
	                console.log(response);
	            },
	            function(response){
	                alert('Something went wrong with the login process. Try again later!');
	                console.log(response);
	            }
	        );
         };

	    $scope.username = 'abel';
	    $scope.password = 'pass';

	    if(userService.checkIfLoggedIn())
        $location.path('/');

		const tl = new TimelineMax({ paused: true, completed: true});
	  	tl.from(".bg", 1.7, { x: "100%", ease: Expo.easeOut }, 0);
	  	tl.from(".row", 1.7, { x: "100%", opacity:0, ease: Expo.easeOut }, 0.2);
	  	tl.restart();   
		
	}]);