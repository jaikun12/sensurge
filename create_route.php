<!DOCTYPE html>
<html>
  <head>
    <title>Sensurge</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/create-route.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <meta charset="utf-8">
    <style>
      html, body {
        margin: 0;
        padding: 0;
      }
      #map {
        height:500px;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #origin-input,
      #destination-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 200px;
      }

      #origin-input:focus,
      #destination-input:focus {
        border-color: #4d90fe;
      }

      #mode-selector {
        color: #fff;
        background-color: #4d90fe;
        margin-left: 12px;
        padding: 5px 11px 0px 11px;
      }

      #mode-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

    </style>
  </head>
  <body>
   <nav>
      <img class="brand" src="images/sample1.jpg">
      <ul id="nav-menu" class="list-inline">
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="live-routes.php">Live Routes</a></li>
        <li><a href="sensurge-analytics.php">Sensurge Analytics</a></li>
      </ul>
    </nav>

    <form action="php/add_route.php" method="post">
      <p><input type="text" name="origin_id" id="origin_place_id" value="" hidden></p>
      <p><input type="text" name="destination_id" id="destination_place_id" value="" hidden></p>

      <div class="create-form">
      <center>
      <h1>Create new route</h1>
      <br><br>
      <p>Name route</p>
      <p><input type="text" name="name" value="" class="form-control"></p>
       
      <p>Details</p>
      <p><textarea name="details" rows="8" cols="40" class="textarea"></textarea></p>
      </center>
      </div>
      
      <input id="origin-input" class="controls" type="text" placeholder="Enter an origin location">

      <input id="destination-input" class="controls" type="text" name="destination" placeholder="Enter a destination location">

      <center>
      <div id="map"></div>
      </center>
      <br><br>
      <center>
      <input type="submit" name="save" value="Save" class="button-1">
      </center>
      <br><br>
    </form>



    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var origin_place_id = null;
        var destination_place_id = null;
        var travel_mode = 'DRIVING';
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          center: {lat: 14.5995, lng: 120.9842},
          zoom: 10
        });
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        directionsDisplay.setMap(map);

        var origin_input = document.getElementById('origin-input');
        var destination_input = document.getElementById('destination-input');

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(origin_input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(destination_input);

        var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
        origin_autocomplete.bindTo('bounds', map);
        var destination_autocomplete = new google.maps.places.Autocomplete(destination_input);
        destination_autocomplete.bindTo('bounds', map);

        function expandViewportToFitPlace(map, place) {
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }
        }
        console.log(origin_input);
        origin_autocomplete.addListener('place_changed', function() {
          var place = origin_autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
          }
          expandViewportToFitPlace(map, place);

          // If the place has a geometry, store its place ID and route if we have
          // the other place ID
          origin_place_id = place.place_id;
          document.getElementById('origin_place_id').value = origin_place_id;
          route(origin_place_id, destination_place_id, travel_mode, directionsService, directionsDisplay);
          // console.log('origin: '+ origin_place_id);
          // console.log('dest: '+destination_place_id);
          // console.log(travel_mode);
        });

        destination_autocomplete.addListener('place_changed', function() {
          var place = destination_autocomplete.getPlace();
          console.log(place);
          if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
          }
          expandViewportToFitPlace(map, place);

          // If the place has a geometry, store its place ID and route if we have
          // the other place ID
          destination_place_id = place.place_id;
          document.getElementById('destination_place_id').value = destination_place_id;
          route(origin_place_id, destination_place_id, travel_mode, directionsService, directionsDisplay);
        });

        function route(origin_place_id, destination_place_id, travel_mode, directionsService, directionsDisplay) {
          if (!origin_place_id || !destination_place_id) {
            return;
          }
          directionsService.route({
            origin: {'placeId': origin_place_id},
            destination: {'placeId': destination_place_id},
            travelMode: travel_mode
          }, function(response, status) {
            if (status === 'OK') {
              directionsDisplay.setDirections(response);
            } else {
              window.alert('Directions request failed due to ' + status);
            }
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtRQL89zGF9X8RNB-745rI1zB14izj93E&libraries=places&callback=initMap"
        async defer></script>
  </body>
</html>
