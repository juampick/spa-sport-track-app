(function () {
    'use strict';

    angular
        .module('sportTrackApp')
        .controller('TrackCreateController', TrackCreateController);

    TrackCreateController.$inject = ['track'];

    function TrackCreateController(track) {
        var vm = this;
        
    }
})();