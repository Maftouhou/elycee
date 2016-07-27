'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  .controller('AboutCtrl', function ($scope, $http) {


  	 $http.get("api/articles")
      .success(function(data) {
        $scope.posts = data;
        console.log($scope.posts);
      });



    const tl = new TimelineMax({ paused: true, completed: true});

  	tl.to($(".col_right"), 1.7, { right: "0%", ease: Expo.easeOut }, 0);
  	tl.from($(".info"), 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 1.8);
  	tl.from($(".row"), 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 2);

  	tl.from($(".el"), 1.7, { opacity: 0, scale: 1.2 }, 2.2);
  	tl.from($(".col_left h1"), 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 3.8);
  	tl.from($(".col_left .mask"), 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 4);
  	tl.restart();   

  })
