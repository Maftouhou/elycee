'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:ActusCtrl
 * @description
 * # ActusCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  	.controller('ActusCtrl', function ($scope, $http, $rootScope, searchService) {


  	 	$http.get("search")
      		.success(function(data) {
        		$scope.posts = data;
        		console.log(data);
      	});

     //    searchService.get()
	    //         .success(function(data) {

	    //        	$scope.posts = data;
	    //         console.log("ahah "+data);
	    //         })
	    //         .error(function(data) {
	    //             console.log("error ");
	    // });

      	$scope.val = function() {
            $rootScope.id = this.post.id ;
        };


	    $scope.show = function(){
			$(".col_left .row").html('<div class="el" style="background-image:url(\'/uploads/images/'+this.post.url_thumbnail+'\')"></div>');
			TweenLite.from(".col_left .row", 1, { opacity: 0, scale: 1.1, ease: Expo.easeOut});
			TweenLite.to(".col_left .row", 1, { opacity: 1, scale: 1, ease: Expo.easeOut });
			TweenLite.to(".col_left .new", 1, { opacity: 0, scale: 1, ease: Expo.easeOut });
		};
		$scope.hide = function(){
			TweenLite.to(".col_left .row", 1, { opacity: 0, scale: 1, ease: Expo.easeOut });
			TweenLite.from(".col_left .new", 1, { opacity: 0, scale: 1.1, ease: Expo.easeOut });
			TweenLite.to(".col_left .new", 1, { opacity: 1, scale: 1, ease: Expo.easeOut });
		};

	    const tl = new TimelineMax({ paused: true, completed: true});

	  	tl.to(".col_right", 1.7, { right: "0%", ease: Expo.easeOut }, 0);
	  	tl.from(".info", 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 1.8);
	  	tl.from(".row", 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 2);

	  	tl.staggerTo(".row a", 3.7, { opacity: 0, scale: 1.2 }, 1, 2)

	  	tl.from(".col_left .new", 1.7, { opacity: 0, scale: 1.2 }, 2.2);
	  	tl.from(".col_left h1", 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 3.8);
	  	tl.from(".col_left .mask", 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 4);
	  	tl.restart();   

  });