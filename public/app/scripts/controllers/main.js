'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the elycee
 */
angular.module('elycee')
	.controller('MainCtrl', function($scope, $http, $rootScope) {

		$http.get("api/articles")
			.success(function(data) {
				$scope.posts = data;
			});

		$scope.val = function() {
            $rootScope.id = this.post.id ;
         };

        $scope.sizeOf = function(obj) {
        	var val = Object.keys(obj || {}).length;
        	if (val === 0 || val === 1) {
        		return val+" commentaire"
        	}else{
        		return val+" commentaires"
        	}
  		};

		$scope.show = function() {
			$(".col_left .row").html('<div class="el" style="background-image:url(\'/uploads/images/' + this.post.url_thumbnail + '\')"></div>');
			$("#home-page .big-title h1").html(this.post.title);
			TweenLite.from("#home-page .big-title h1", 1, { opacity: 0, y: "100%", ease: Expo.easeOut});
			TweenLite.to("#home-page .big-title h1", 1, { opacity: 1, y: "0%", ease: Expo.easeOut});
			TweenLite.from(".col_left .row", 1, { opacity: 0, scale: 1.1, ease: Expo.easeOut});
			TweenLite.to(".col_left .row", 1, { opacity: 1, scale: 1, ease: Expo.easeOut });
			TweenLite.to(".col_left .new", 1, { opacity: 0, scale: 1, ease: Expo.easeOut });
		};
		$scope.hide = function() {
			TweenLite.to(".col_left .row", 1, { opacity: 0, scale: 1.1, ease: Expo.easeOut });
			TweenLite.to("#home-page .big-title h1", 1, { opacity: 0, y: "100%", ease: Quart.easeOut});
			TweenLite.from(".col_left .new", 1, { opacity: 0, scale: 1.1, ease: Expo.easeOut });
			TweenLite.to(".col_left .new", 1, { opacity: 1, scale: 1, ease: Expo.easeOut });
		};

		const tl = new TimelineMax({
			paused: true,
			completed: true
		});
		tl.to(".col_right", 1.7, { right: "0%", ease: Expo.easeOut }, 0);
		tl.from(".info", 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 1.8);
		tl.to(".col_right footer", 1, { opacity: 1 }, 1.9);
		tl.from(".row", 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 2);

		tl.from(".col_left .new", 1.7, { opacity: 0, scale: 1.2 }, 2.2);
		tl.from(".col_left h1", 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 3.8);
		tl.from(".col_left .mask", 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 4);
		tl.restart();   

	})