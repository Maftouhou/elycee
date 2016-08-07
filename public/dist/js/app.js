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
            .when('/search', {
                templateUrl: '../app/views/search.html',
                controller: 'SearchCtrl',
                controllerAs: 'search'
            })
            .when('/actus', {
                templateUrl: '../app/views/actus.html',
                controller: 'ActusCtrl',
                controllerAs: 'actus'
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
        return {
            enter: function(element, done) {
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

            if (localStorageService.get('XSRF-TOKEN', "cookies"))
                return true;
            else
                return false;

        }

        function login(username, password, onSuccess, onError) {

            console.log(localStorageService);

            $http.post('api/login', {
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

        function logout() {

            localStorageService.remove('XSRF-TOKEN', "cookies");

        }

        function getCurrentToken() {
            return localStorageService.get('XSRF-TOKEN', "cookies");
        }

        return {
            checkIfLoggedIn: checkIfLoggedIn,
            login: login,
            logout: logout,
            getCurrentToken: getCurrentToken
        }

    })
    .factory('contactService', function($http) {

        return {
            save: function(nom, prenom, email, title, content) {
                console.log(nom, prenom, email, title, content);
                return $http({
                    method: 'POST',
                    url: '/send',
                    data: {
                        nom: nom,
                        prenom: prenom,
                        email: email,
                        titre: title,
                        message: content
                    }
                });
            }
        }

    })
    .factory('commentService', function($http) {

        return {
            get: function() {
                return $http.get('api/articles/');
            },
            // save a comment (pass in comment data)
            save: function(commentText, postId, status, title) {
                console.log(commentText, postId, status, title);
                return $http({
                    method: 'POST',
                    url: '/comments',
                    data: {
                        content: commentText,
                        post_id: postId,
                        status: status,
                        title: title
                    }
                });
            }
        }

    });

const tl = new TimelineMax({
    paused: true,
    completed: true
});
tl.to("header ul li a", 1, {
    opacity: 1
}, 0);
tl.restart();
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
      	});

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
  		console.log($rootScope.search);
  		if ($rootScope.search = undefined) {
  			console.log("nuuiuuuuuul");

  		}else{
		  	$http.get("search?exp="+searchName)
		    	.success(function(data) {
		        	$scope.posts = data.data;
		    	});
      	}

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
'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:ContactCtrl
 * @description
 * # ContactCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  	.controller('ContactCtrl', function ($scope, $http, contactService, $location) {


  		$scope.submitContact = function() {

	        contactService.save($scope.firstname, $scope.lastname, $scope.email, $scope.title, $scope.content)
	            .success(function(data) {
	            	$location.path('/');
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
'use strict';

/**
 * @ngdoc function
 * @name elycee.controller:SearchCtrl
 * @description
 * # SearchCtrl
 * Controller of the elycee
 */
angular.module('elycee')
  	.controller('SearchCtrl', function ($http, $scope, $location, $rootScope) {


  		$scope.submitSearch = function() {
	            $rootScope.search = $scope.searchText;
	            $location.path('/actus');
    	};



	   const tl = new TimelineMax({ paused: true, completed: true});
		  	tl.from(".bg", 1.7, { x: "100%", ease: Expo.easeOut }, 0);
		  	tl.from(".row", 1.7, { x: "100%", opacity:0, ease: Expo.easeOut }, 0.2);
		  	tl.restart(); 
    });

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