'use strict';

/**
 * @ngdoc overview
 * @name elycee
 * @description
 * # elycee
 *
 * Main module of the application.
 */
angular
  .module('elycee', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch',
    'anim-in-out'
  ])
  // .constant('API_URL', 'api/v1/')
  .config(function($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: '../app/views/main.html',
        controller: 'MainCtrl',
        controllerAs: 'main'
      })
      .when('/post/:id', {
        templateUrl: '../app/views/main.html',
        controller: 'MainCtrl',
        controllerAs: 'main'
      })
      .when('/about', {
        templateUrl: '../app/views/about.html',
        controller: 'AboutCtrl',
        controllerAs: 'about'
      })
      .when('/contact', {
        templateUrl: '../app/views/contact.html',
        controller: 'ContactCtrl',
        controllerAs: 'contact'
      })
      .when('/login', {
        templateUrl: '../app/views/login.html',
        controller: 'LoginCtrl',
        controllerAs: 'login'
      })
      .when('/dashboard', {
        templateUrl: '../app/views/dashboard.html',
        controller: 'DashboardCtrl',
        controllerAs: 'dashboard'
      })
      .otherwise({
        redirectTo: '/'
      });
  })
   .animation('.transition', function() {
    console.log();
    return {
      enter: function(element, done) {
        console.log(element);   
        TweenMax.from(element, 1, {opacity: 1, onComplete: done}, 0);
      },
      leave: function(element, done) { 
        var colonneright = element[0].children[0].children[0]
        TweenMax.to(element, 1, {opacity: 0, onComplete: done}, 0);
         // TweenMax.to(colonneright, 1.7, { right: "-100%", ease: Expo.easeOut, onComplete: done }, 0);
      }
    };
  });
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


  	 $http.get("api/post")
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

'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:ContactCtrl
 * @description
 * # ContactCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  .controller('ContactCtrl', function () {
    this.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });

'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:DashboardCtrl
 * @description
 * # DashboardCtrl
 * Controller of the elycee
 */
angular.module('elycee')
	.controller('DashboardCtrl', function() {
		
	});
'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:LoginCtrl
 * @description
 * # LoginCtrl
 * Controller of the elycee
 */
angular.module('elycee')
	.controller('LoginCtrl', function() {

		const tl = new TimelineMax({ paused: true, completed: true});
	  	tl.from($(".bg"), 1.7, { x: "100%", ease: Expo.easeOut }, 0);
	  	tl.from($(".row"), 1.7, { x: "100%", opacity:0, ease: Expo.easeOut }, 0.2);
	  	tl.restart();   
		
	});
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
  	tl.from($(".info"), 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 1.8);
  	tl.from($(".row"), 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 2);

  	tl.from($(".el"), 1.7, { opacity: 0, scale: 1.2 }, 2.2);
  	tl.from($(".col_left h1"), 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 3.8);
  	tl.from($(".col_left .mask"), 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 4);
  	tl.restart();   

  })

 