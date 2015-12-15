(function () {
    'use strict';

    angular
        .module('sportTrackApp')
        .factory('track', track);

    track.$inject = ['$resource'];

    function track($resource) {

        var Track = $resource('/api/v1/track/:id', {}, {
            update: {
                method: 'PUT'
            }
        });

        return {
            get: function (id) {
                return Track.query({id:id}).$promise;
            },

            save: function (data) {
                return Track.save(data).$promise;
            },

            update: function (data) {
                return Track.update({id: data.id}, data).$promise;
            },

            delete: function (id) {
                return Track.delete({id: id}).$promise;
            }
        }
    }
})();