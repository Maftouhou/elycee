'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:ActusCtrl
 * @description
 * # ActusCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  	.controller('ActusCtrl', function ($scope, $http, $rootScope) {

  		var searchName = $rootScope.search

  	 	$http.get("search?exp="+searchName)
      		.success(function(data) {
        		$scope.posts = data.data;
      	});

      	$scope.val = function() {
            $rootScope.id = this.post.id ;
        };

        $scope.show = function() {
			$(".big-title h1").html(this.post.title);
			TweenLite.from(".big-title h1", 1, { opacity: 0, y: "100%", ease: Expo.easeOut});
			TweenLite.to(".big-title h1", 1, { opacity: 1, y: "0%", ease: Expo.easeOut});
		};
		$scope.hide = function() {
			TweenLite.to(".big-title h1", 1, { opacity: 0, y: "100%", ease: Quart.easeOut});
		};

	    const tl = new TimelineMax({ paused: true, completed: true});

	  	tl.to(".col_right", 1.7, { right: "0%", ease: Expo.easeOut }, 0);
	  	tl.from(".info", 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 1.8);
	  	tl.from(".row", 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 2);
	  	tl.staggerTo(".row a", 3.7, { opacity: 0, scale: 1.2 }, 1, 2)
	  	tl.restart();   

  });