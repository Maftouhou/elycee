'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:SingleCtrl
 * @description
 * # SingleCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  	.controller('SingleCtrl', function ($scope, $http, $rootScope, commentService, $location) {
  		var id = $rootScope.id;

  	 	$http.get("api/articles/"+id)
      		.success(function(data) {
        		$scope.post = data[0];
        		$scope.comments = data[0].comment;
      	});

      	// $scope.commentText = {};
      	$scope.submitComment = function() {

	        commentService.save($scope.commentText, id, 1, $scope.titleText)
	            .success(function(data) {
	            	// reload comments
	            	$http.get("api/articles/"+id)
      					.success(function(data) {
        				$scope.comments = data[0].comment;
        				$scope.commentText = '';
        				$scope.titleText = '';
      				});
	            })
	            .error(function(data) {
	                console.log("error ");
	            });
    	};


	    const tl = new TimelineMax({ paused: true, completed: true});

	  	tl.to(".col_right", 1.7, { right: "0%", ease: Expo.easeOut }, 0);
	  	tl.staggerFrom(".cat", 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 0.2, 2);
	  	tl.from(".col_left .solo", 1.7, { opacity: 0, scale: 1.2 }, 2.2);
	  	tl.to(".col_left .solo", 1.7, { opacity: 1, scale: 1 }, 2.2);
	  	tl.from(".col_left h1", 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 3.8);
	  	tl.from(".col_left .mask", 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 4);
	  	tl.restart();   

  });