(function () {
    'use strict';

    angular
        .module('sportTrackApp', ['ui.router', 'ngResource', 'ui.bootstrap'])
        .config(['$stateProvider', '$urlRouterProvider', '$locationProvider', '$httpProvider', config]);

    function config($stateProvider, $urlRouterProvider, $locationProvider, $httpProvider) {

        // Set default
        $urlRouterProvider.otherwise('/');

        // Remove # from url
        $locationProvider.html5Mode(true);

        $stateProvider
        // route for the home page
            .state('/', {
                url: '/',
                templateUrl: 'app/pages/home.html',
                controller: 'HomeController as home',
            })
            .state('track_list', {
                url: '/track/list',
                templateUrl: 'app/pages/track_list.html',
                controller: 'TrackListController as trackList',
            })
            .state('track_create', {
                url: '/track/create',
                templateUrl: 'app/pages/track_create.html',
                controller: 'TrackCreateController as trackCreate',
            });
    }

})();