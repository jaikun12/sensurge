angular.module('starter').controller('MapController',
  [ '$scope',
    '$http',
    '$window',
    '$cordovaGeolocation',
    '$stateParams',
    '$ionicModal',
    '$ionicPopup',
    'LocationsService',
    'InstructionsService',
    function(
      $scope,
      $http,
      $window,
      $cordovaGeolocation,
      $stateParams,
      $ionicModal,
      $ionicPopup,
      LocationsService,
      InstructionsService
      ) {

      /**
       * Once state loaded, get put map on scope.
       */


      $scope.$on("$stateChangeSuccess", function() {

        $scope.locations = LocationsService.savedLocations;
        $scope.newLocation;

        // if(!InstructionsService.instructions.newLocations.seen) {
        //
        //   var instructionsPopup = $ionicPopup.alert({
        //     title: 'Add Locations',
        //     template: InstructionsService.instructions.newLocations.text
        //   });
        //   instructionsPopup.then(function(res) {
        //     InstructionsService.instructions.newLocations.seen = true;
        //     });
        //
        // }
        var mapDefaults = {
                    weight: 2,
                    colorOutside: '#ff612f',
                    type: 'circle',
                    color: 'red'
                };

        $scope.map = {
          defaults: {
            tileLayer: 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
            maxZoom: 18,
            zoomControlPosition: 'bottomleft'
          },
          markers : {},
          events: {
            map: {
              enable: ['context'],
              logic: 'emit'
            }
          },
          layers: {
                    baselayers: {
                      osm: {
                            name: 'OpenStreetMap',
                            url: 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                            type: 'xyz'
                        }
                    }
                  },
          paths: {

          }
        };


          $scope.getAvoid().then(function(datas){
            if(datas === '"[{}]"'){
              return;
            }else{
              var data = {};

              for (var i = 0; i < datas.length; i++) {
                data['p' + datas[i].avoid_id] = {
                  weight: mapDefaults.weight,
                  color: mapDefaults.color,
                  latlngs: {
                    'lat': parseFloat(datas[i].coordinates.split(', ')[0]),
                    'lng': parseFloat(datas[i].coordinates.split(', ')[1])
                  },
                  radius: 100,
                  type: mapDefaults.type

                };
              }
               $scope.map.paths = data;
             }
          });



        $scope.goTo(0);

      });

      // var Location = function() {
      //   if ( !(this instanceof Location) ) return new Location();
      //   this.lat  = "";
      //   this.lng  = "";
      //   this.name = "";
      // };

      // $ionicModal.fromTemplateUrl('templates/addLocation.html', {
      //   scope: $scope,
      //   animation: 'slide-in-up'
      // }).then(function(modal) {
      //     $scope.modal = modal;
      //   });

      /**
       * Detect user long-pressing on map to add new location
       */
      // $scope.$on('leafletDirectiveMap.contextmenu', function(event, locationEvent){
      //   $scope.newLocation = new Location();
      //   $scope.newLocation.lat = locationEvent.leafletEvent.latlng.lat;
      //   $scope.newLocation.lng = locationEvent.leafletEvent.latlng.lng;
      //   $scope.modal.show();
      // });

      // $scope.saveLocation = function() {
      //   LocationsService.savedLocations.push($scope.newLocation);
      //   $scope.modal.hide();
      //   $scope.goTo(LocationsService.savedLocations.length - 1);
      // };

      /**
       * Center map on specific saved location
       * @param locationKey
       */
      $scope.goTo = function(locationKey) {

        var location = LocationsService.savedLocations[locationKey];

        $scope.map.center  = {
          lat : 0,
          lng : 0,
          zoom : 30
        };

        $cordovaGeolocation
          .getCurrentPosition()
          .then(function (position) {

          $scope.map.center  = {
            lat : position.coords.latitude,
            lng : position.coords.longitude,
            zoom : 15
          };

          $scope.map.markers[locationKey] = {
            lat:position.coords.latitude,
            lng:position.coords.longitude,
            message: "You Are Here",
            focus: true,
            draggable: false
          };
        });

      };

      /**
       * Center map on user's current position
       */
      $scope.locate = function(){

        $cordovaGeolocation
          .getCurrentPosition()
          .then(function (position) {
            $scope.map.center.lat  = position.coords.latitude;
            $scope.map.center.lng = position.coords.longitude;
            $scope.map.center.zoom = 15;

            $scope.map.markers.now = {
              lat:position.coords.latitude,
              lng:position.coords.longitude,
              message: "You Are Here",
              focus: true,
              draggable: false
            };

          }, function(err) {
            // error
            console.log("Location error!");
            console.log(err);
          });

      };

      $scope.addAvoid = function(){
        $cordovaGeolocation
          .getCurrentPosition()
          .then(function (position) {
            $http.post('http://localhost/php-projects/sensurge/mobile-api/add-avoid.php', {lat:position.coords.latitude, lng: position.coords.longitude})
            .then(function successCallback(response) {
              var Popup = $ionicPopup.alert({
                  title: 'Status',
                  template: 'Surge recorded! thanks.',
                  buttons: [
                    {
                      text: '<b>Ok</b>',
                      type: 'button-positive',
                      onTap: function(e) {
                        location.reload();

                      }
                    }
                  ]
                });
              console.log(response.statusText);
            }, function errorCallback(response) {
              console.log(response.statusText);
            });
          });
      };

      $scope.getAvoid = function(){
        return $http.get('http://localhost/php-projects/sensurge/mobile-api/get-avoid.php')
        .then(function successCallback(response) {
          console.log(response.data);
          return response.data;
        }, function errorCallback(response) {
          console.log(response.statusText);
        });
      };






    }]);
