'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:SearchCtrl
 * @description
 * # SearchCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  	.controller('SearchCtrl', function (searchService) {


  		$scope.submitSearch = function() {

	        searchService.save($scope.searchText)
	            .success(function(data) {
	            	// reload comments
	         //    	$http.get("api/articles/"+id)
      				// 	.success(function(data) {
        		// 		$scope.comments = data[0].comment;
        		// 		$scope.commentText = '';
        		// 		$scope.titleText = '';
      				// });

	            console.log("cool "+data);
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
