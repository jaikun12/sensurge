<?php
	include('php/dbconfig.php');

	if(isset($_GET['route_id'])){
		$route_id = $_GET['route_id'];
	}
	$sql = "SELECT * FROM routes WHERE route_id = $route_id";
	$result = mysqli_query($mysqli,$sql);

	$row = mysqli_fetch_assoc($result);

	$name = $row['name'];

	$details = $row['details'];

	$origin_id = $row['origin'];

	$destination_id = $row['destination'];
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Quicksand|Roboto" rel="stylesheet">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="css/route-details.css">
		<link type="text/css" rel="stylesheet" href="css/nav.css">
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
			<img class="brand" src="images/sensurge-logo.png">
			<ul id="nav-menu" class="list-inline">
				<li><a href="dashboard.php">Home</a></li>
				<li><a href="live-routes.php">Live Routes</a></li>
				<li><a href="sensurge-analytics.php">Sensurge Analytics</a></li>
			</ul>
		</nav>

		<div id="main-content" class="container">
			<h1><?php echo $name; ?></h1>
			<h4><?php echo $details; ?></h4>
      <center>
      <div id="map"></div>
      </center>
			<input type="text" name="name" id="nanay" value="">

		</div>
		<script src="js/jquery-2.2.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
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

				origin_place_id = '<?php echo $origin_id; ?>';
				destination_place_id = '<?php echo $destination_id; ?>';

        directionsService.route({
          origin: {'placeId': origin_place_id},
          destination: {'placeId': destination_place_id},
					waypoints: [
						{
							'location': '14.664547, 121.021186',
							'stopover': false
						}
					],

          travelMode: travel_mode
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtRQL89zGF9X8RNB-745rI1zB14izj93E&libraries=places&callback=initMap"
        async defer></script>
	</body>
</html>
