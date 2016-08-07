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

    })
    .factory('searchService', function($http) {

        return {
            // get: function() {
            //     return $http.get('api/articles/');
            // },
            // save a comment (pass in comment data)
               save: function(exp) {
 
               return $http({
                   method: 'POST',
                   url: '/search',
                   data: {
                       exp: exp,
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