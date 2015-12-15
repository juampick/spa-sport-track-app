(function () {
    'use strict';

    angular
        .module('sportTrackApp')
        .controller('TrackListController', TrackListController);

    TrackListController.$inject = ['track'];

    function TrackListController(track) {
        var vm = this;
        
        vm.tracks = [];
        vm.totalItems = 0;

        // DatePicker //
/*        vm.datePickerFormat = 'MM-dd-yyyy';
        vm.statusDateFrom = {
            opened: false
        };
        vm.statusDateTo = {
            opened: false
        };
        vm.openDateFromPicker = function ($event) {
            vm.statusDateFrom.opened = true;
        };
        vm.openDateToPicker = function ($event) {
            vm.statusDateTo.opened = true;
        };*/
        // DatePicker //



        vm.deleteTrack = deleteTrack;
		vm.refresh = refresh;


        /*vm.editTimeEntry = function (timeEntry) {
            $state.go('log_edit',
                {
                    id: timeEntry.id,
                    data: timeEntry,
                    userSelected: vm.userSelected
                });
        };*/

        function getTracks(){
            track.get()
                .then(function (response) {
                    vm.tracks = [];
                    angular.forEach(response, function (item) {
                        var timeInHours = moment.duration(item.time, "HH:mm:ss: A").asHours();
                        item.averageSpeed = (item.distance / timeInHours);
                        vm.tracks.push(item);
                    });
                })
                .catch(function () {

                })
                .finally(function () {
                    vm.totalItems = vm.tracks.length;
                });
        }

        function refresh(){
        	getTracks();
        }

        function deleteTrack(track) {
        	consol.debug('delete Track');
            track.delete(track.id)
                .then(function () {
                    
                })
                .catch(function (error) {
                    
                })
                .finally(function () {
                    getTracks();
                });
        };

		getTracks();
    }
})();