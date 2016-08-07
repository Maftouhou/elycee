'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:SearchCtrl
 * @description
 * # SearchCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  	.controller('SearchCtrl', function (searchService, $http, $scope, $location) {


  		$scope.submitSearch = function() {

	        searchService.get($scope.searchText)
	            .success(function(data) {
	            	// reload comments
	         //    	$http.get("api/articles/"+id)
      				// 	.success(function(data) {
        		// 		$scope.comments = data[0].comment;
        		// 		$scope.commentText = '';
        		// 		$scope.titleText = '';
      				// });
	            $location.path('/actus');

	            console.log("cool ");
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
