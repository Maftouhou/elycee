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