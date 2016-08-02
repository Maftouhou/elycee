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
        'LocalStorageModule',
    ])
    // .constant('API_URL', 'api/v1/')
    .config(function($routeProvider, localStorageServiceProvider) {
        $routeProvider
            .when('/', {
                templateUrl: '../app/views/main.html',
                controller: 'MainCtrl',
                controllerAs: 'main'
            })
            .when('/articles/:id', {
                templateUrl: '../app/views/single.html',
                controller: 'SingleCtrl',
                controllerAs: 'single'
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
            })
        localStorageServiceProvider
            .setStorageType('cookies');
    })
    .animation('.transition', function() {
        console.log();
        return {
            enter: function(element, done) {
                console.log(element);
                TweenMax.from(element, 1, {
                    opacity: 1,
                    onComplete: done
                }, 0);
            },
            leave: function(element, done) {
                TweenMax.to(element, 1, {
                    opacity: 0,
                    onComplete: done
                }, 0);
            }
        };
    })
    .directive('back', function() {
        return {
            restrict: 'A',
            link: function(scope, element, attrs) {
                element.bind('click', function() {
                    history.back();
                    scope.$apply();
                });
            }
        }
    })
    .factory('userService', function($http, localStorageService) {

        function checkIfLoggedIn() {

            if(localStorageService.get('XSRF-TOKEN', "cookies"))
                return true;
            else
                return false;

        }

        function login(username, password, onSuccess, onError){

            console.log(localStorageService);

            $http.post('api/login', 
            {
                username: username,
                password: password
            }).
            then(function(response) {
                console.log(response);

                localStorageService.set('XSRF-TOKEN', response.data.token);
                onSuccess(response);

            }, function(response) {

                onError(response);

            });

        }

        function logout(){

            localStorageService.remove('XSRF-TOKEN', "cookies");

        }

        function getCurrentToken(){
            return localStorageService.get('XSRF-TOKEN', "cookies");
        }

    return {
        checkIfLoggedIn: checkIfLoggedIn,
        login: login,
        logout: logout,
        getCurrentToken: getCurrentToken
    }

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
  	.controller('AboutCtrl', function ($scope, $http, $rootScope) {


  	 	$http.get("api/articles")
      		.success(function(data) {
        		$scope.posts = data;
        		console.log($scope.posts);
      	});

      	$scope.val = function() {
			console.log(this.post.id);
            $rootScope.id = this.post.id ;
        };


	    $scope.show = function(){
			$(".col_left .row").html('<div class="el" style="background-image:url(\'/uploads/images/'+this.post.url_thumbnail+'\')"></div>');
			TweenLite.from(".col_left .row", 1, { opacity: 0, scale: 1.1, ease: Expo.easeOut});
			TweenLite.to(".col_left .row", 1, { opacity: 1, scale: 1, ease: Expo.easeOut });
			TweenLite.to(".col_left .new", 1, { opacity: 0, scale: 1, ease: Expo.easeOut });
			console.log(this.post.url_thumbnail);
		};
		$scope.hide = function(){
			TweenLite.to(".col_left .row", 1, { opacity: 0, scale: 1, ease: Expo.easeOut });
			TweenLite.from(".col_left .new", 1, { opacity: 0, scale: 1.1, ease: Expo.easeOut });
			TweenLite.to(".col_left .new", 1, { opacity: 1, scale: 1, ease: Expo.easeOut });
			console.log(this.post);
		};

		angular.element(document).ready(function () {
    		console.log($('.el'));
		});

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
	    const tl = new TimelineMax({ paused: true, completed: true});
		  	tl.from(".bg", 1.7, { x: "100%", ease: Expo.easeOut }, 0);
		  	tl.from(".row", 1.7, { x: "100%", opacity:0, ease: Expo.easeOut }, 0.2);
		  	tl.restart(); 
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
	.controller('DashboardCtrl', ['$scope', '$http', '$location', 'userService', function($scope, $http, $location, userService) {

   		$scope.out = function() {
			console.log("deze");
	        userService.logout();
	        $location.path('api/logout');
        };

        // if(!userService.checkIfLoggedIn())
        // $location.path('/login');

        const tl = new TimelineMax({ paused: true, completed: true});

	  	tl.to(".collapse", 1.7, { left: "0%", ease: Expo.easeOut }, 0);
	  	tl.staggerFrom(".collapse ul li a", 1.2, { left: "-100%", opacity: 0, ease: Expo.easeOut }, 0.2, 0.8);
	  	tl.staggerFrom(".panel.panel-default", 1.2, { y: "100%", opacity: 0, ease: Expo.easeOut }, 0.2, 0.8);
	  	tl.restart(); 
		
	}]);
'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:LoginCtrl
 * @description
 * # LoginCtrl
 * Controller of the elycee
 */
angular.module('elycee')
	.controller('LoginCtrl', ['$scope', '$http', '$location', 'userService', function($scope, $http, $location, userService) {

   		$scope.log = function() {
			console.log("deze");
	        userService.login(

	            $scope.username, $scope.password,

	            function(response){
	                $location.path('/dashboard');
	                console.log(response);
	            },
	            function(response){
	                alert('Something went wrong with the login process. Try again later!');
	                console.log(response);
	            }
	        );
         };

   		console.log(userService);

	    $scope.username = 'abel';
	    $scope.password = 'pass';

	    if(userService.checkIfLoggedIn())
        $location.path('/');

		const tl = new TimelineMax({ paused: true, completed: true});
	  	tl.from(".bg", 1.7, { x: "100%", ease: Expo.easeOut }, 0);
	  	tl.from(".row", 1.7, { x: "100%", opacity:0, ease: Expo.easeOut }, 0.2);
	  	tl.restart();   
		
	}]);
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
'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:SingleCtrl
 * @description
 * # SingleCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  	.controller('SingleCtrl', function ($scope, $http, $rootScope) {

  	 	$http.get("api/articles/"+ $rootScope.id)
      		.success(function(data) {
        		$scope.post = data;
        		// console.log($rootScope.id);
      	});

	 //    $scope.show = function(){
		// 	$(".col_left .row").html('<div class="el" style="background-image:url(\'/uploads/images/'+this.post.url_thumbnail+'\')"></div>');
		// 	TweenLite.from(".col_left .row", 1, { opacity: 0, scale: 1.1, ease: Expo.easeOut});
		// 	TweenLite.to(".col_left .row", 1, { opacity: 1, scale: 1, ease: Expo.easeOut });
		// 	TweenLite.to(".col_left .new", 1, { opacity: 0, scale: 1, ease: Expo.easeOut });
		// 	console.log(this.post.url_thumbnail);
		// };
		// $scope.hide = function(){
		// 	TweenLite.to(".col_left .row", 1, { opacity: 0, scale: 1, ease: Expo.easeOut });
		// 	TweenLite.from(".col_left .new", 1, { opacity: 0, scale: 1.1, ease: Expo.easeOut });
		// 	TweenLite.to(".col_left .new", 1, { opacity: 1, scale: 1, ease: Expo.easeOut });
		// 	console.log(this.post);
		// };

	    const tl = new TimelineMax({ paused: true, completed: true});

	  	tl.to(".col_right", 1.7, { right: "0%", ease: Expo.easeOut }, 0);
	  	tl.staggerFrom(".cat", 1, { opacity: 0, x: "10%", ease: Expo.easeOut }, 0.2, 2);
	  	tl.from(".col_left .solo", 1.7, { opacity: 0, scale: 1.2 }, 2.2);
	  	tl.to(".col_left .solo", 1.7, { opacity: 1, scale: 1 }, 2.2);
	  	tl.from(".col_left h1", 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 3.8);
	  	tl.from(".col_left .mask", 1, { opacity: 0, x: "-10%", ease: Expo.easeOut }, 4);
	  	tl.restart();   

  });