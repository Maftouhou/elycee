'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  .controller('MainCtrl', function($scope, $http) {
  
    // $scope.message = 'This is the home view.';

    $http.get("api/post")
      .success(function(data) {
        $scope.posts = data;
        console.log($scope.posts);
      });

    // $('.col_right').hover( function(){
    // 	console.log("hello");
    // })

  	const tl = new TimelineMax({ paused: true, completed: true});

  	tl.to($(".col_right"), 1.7, { right: "0%", ease: Expo.easeOut }, 0);
  	tl.from($(".info"), 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 1.4);
  	tl.from($(".row"), 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 1.6);

  	tl.from($(".el"), 1.7, { opacity: 0, scale: 1.2 }, 2.2);
  	tl.from($(".col_left h1"), 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 3.8);
  	tl.from($(".col_left .mask"), 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 4);
  	tl.restart();   

  });