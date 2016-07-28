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

		// $scope.message = 'This is the home view.';

		$http.get("api/articles")
			.success(function(data) {
				$scope.posts = data;
				console.log($scope.posts);
			});

		$scope.val = function() {
			console.log(this.post.id);
             // var ide = id.eventPhase;
             // console.log(id); // I want to get 102 as the result
            //  if (confirm('Are you sure to delete?')) {
            //     $('#contactsGrid tr[data-id="' + id + '"]').hide('slow');

            // }
            $rootScope.id = this.post.id ;
         };

		$scope.show = function() {
			$(".col_left .row").html('<div class="el" style="background-image:url(\'/uploads/images/' + this.post.url_thumbnail + '\')"></div>');
			TweenLite.from(".col_left .row", 1, { opacity: 0, scale: 1.1, ease: Expo.easeOut});
			TweenLite.to(".col_left .row", 1, { opacity: 1, scale: 1, ease: Expo.easeOut });
			TweenLite.to(".col_left .new", 1, { opacity: 0, scale: 1, ease: Expo.easeOut });
			console.log(this.post.url_thumbnail);
		};
		$scope.hide = function() {
			TweenLite.to(".col_left .row", 1, { opacity: 0, scale: 1.1, ease: Expo.easeOut });
			TweenLite.from(".col_left .new", 1, { opacity: 0, scale: 1.1, ease: Expo.easeOut });
			TweenLite.to(".col_left .new", 1, { opacity: 1, scale: 1, ease: Expo.easeOut });
			console.log(this.post);
		};

		const tl = new TimelineMax({
			paused: true,
			completed: true
		});

		tl.to(".col_right", 1.7, { right: "0%", ease: Expo.easeOut }, 0);
		tl.from(".info", 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 1.8);
		tl.from(".row", 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 2);

		tl.from(".col_left .new", 1.7, { opacity: 0, scale: 1.2 }, 2.2);
		tl.from(".col_left h1", 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 3.8);
		tl.from(".col_left .mask", 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 4);
		tl.restart();   

	})