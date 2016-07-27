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