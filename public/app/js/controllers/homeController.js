(function () {
    'use strict';

    angular
        .module('sportTrackApp')
        .controller('HomeController', HomeController);

    function HomeController() {
        var vm = this;
        vm.title = 'Welcome';
        vm.subtitle = 'track your sports activities';
    }
})();