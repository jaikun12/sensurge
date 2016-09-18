<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Heatmaps</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/cards.css">
    <link rel="stylesheet" type="text/css" href="css/analytics.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
  </head>

  <body>
    <nav>
      <img class="brand" src="images/sensurge-logo.png">
      <ul id="nav-menu" class="list-inline">
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="live-routes.php">Live Routes</a></li>
        <li><a href="#">Sensurge Analytics</a></li>
      </ul>
    </nav>
    <center><h1>Sensurge Heatmap</h1></center>
    <div id="floating-panel">
      <button onclick="toggleHeatmap()">Toggle Heatmap</button>
      <button onclick="changeGradient()">Change gradient</button>
      <button onclick="changeRadius()">Change radius</button>
      <button onclick="changeOpacity()">Change opacity</button>
    </div>
    <div id="map"></div>
    <br><br><br>
    <center><h1>Route Analytics</h1>
    <p>Know more about the situation of your current supply routes</p></center>
    <br><br><br>
    <div id="most-affected" class="container">
      <h3>Most Affected Routes</h3>
      <div class="divider"></div>
      <div class="long-card-centered">
        <div class="card-img-container">
          <img class="card-img" src="images/landingbg.jpg">
        </div>
        <div class="card-text-container">
          <p class="card-title">Trinoma Delivery Route</p>
          <div class="divider"></div>
          <table class="table table-striped">
            <thead>
              <th></th>
              <th></th>
            </thead>
            <tbody>
              <tr>
                <td>Times Rerouted (per month):</td>
                <td>21</td>
              </tr>
              <tr>
                <td>Failed Deliveries:</td>
                <td>5</td>
              </tr>
              <tr>
                <td>Delayed Deliveries:</td>
                <td>18</td>
              </tr>
            </tbody>
          </table>
          <div class="rating-div">
            <center>
              <h2 class="orange">43</h2>
              <h5>Route Rating</h5>
            </center>
          </div>
          <br><br>
          <a class="card-link" href="card-details.php">Go to Route Details</a>
        </div>
      </div>
    </div>
    
    <br><br><br>
    <div id="top-performing" class="container">
      <h3>Top Performing Routes</h3>
      <div class="divider"></div>
      <div class="long-card">
        <div class="card-img-container">
          <img class="card-img" src="images/sample1.jpg">
        </div>
        <div class="card-text-container">
          <p class="card-title">M Plaza Delivery Route</p>
          <div class="divider"></div>
          <table class="table table-striped">
            <thead>
              <th></th>
              <th></th>
            </thead>
            <tbody>
              <tr>
                <td>Times Rerouted (per month):</td>
                <td>5</td>
              </tr>
              <tr>
                <td>Failed Deliveries:</td>
                <td>0</td>
              </tr>
              <tr>
                <td>Delayed Deliveries:</td>
                <td>1</td>
              </tr>
            </tbody>
          </table>
          <div class="rating-div">
            <center>
              <h2 class="green">91</h2>
              <h5>Route Rating</h5>
            </center>
          </div>
          <br><br>
          <a class="card-link" href="card-details.php">Go to Route Details</a>
        </div>
        </div>

        <div class="long-card">
        <div class="card-img-container">
          <img class="card-img" src="images/sample2.jpg">
        </div>
        <div class="card-text-container">
          <p class="card-title">Busan Delivery Route</p>
          <div class="divider"></div>
          <table class="table table-striped">
            <thead>
              <th></th>
              <th></th>
            </thead>
            <tbody>
              <tr>
                <td>Times Rerouted (per month):</td>
                <td>6</td>
              </tr>
              <tr>
                <td>Failed Deliveries:</td>
                <td>0</td>
              </tr>
              <tr>
                <td>Delayed Deliveries:</td>
                <td>2</td>
              </tr>
            </tbody>
          </table>
          <div class="rating-div">
            <center>
              <h2 class="green">87</h2>
              <h5>Route Rating</h5>
            </center>
          </div>
          <br><br>
          <a class="card-link" href="card-details.php">Go to Route Details</a>
        </div>
      </div>
    </div>




























    <script>

      // This example requires the Visualization library. Include the libraries=visualization
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=visualization">

      var map, heatmap;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 14.611401, lng: 120.988218},
          mapTypeId: 'satellite'
        });

        heatmap = new google.maps.visualization.HeatmapLayer({
          data: getPoints(),
          map: map
        });
      }

      function toggleHeatmap() {
        heatmap.setMap(heatmap.getMap() ? null : map);
      }

      function changeGradient() {
        var gradient = [
          'rgba(0, 255, 255, 0)',
          'rgba(0, 255, 255, 1)',
          'rgba(0, 191, 255, 1)',
          'rgba(0, 127, 255, 1)',
          'rgba(0, 63, 255, 1)',
          'rgba(0, 0, 255, 1)',
          'rgba(0, 0, 223, 1)',
          'rgba(0, 0, 191, 1)',
          'rgba(0, 0, 159, 1)',
          'rgba(0, 0, 127, 1)',
          'rgba(63, 0, 91, 1)',
          'rgba(127, 0, 63, 1)',
          'rgba(191, 0, 31, 1)',
          'rgba(255, 0, 0, 1)'
        ]
        heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
      }

      function changeRadius() {
        heatmap.set('radius', heatmap.get('radius') ? null : 20);
      }

      function changeOpacity() {
        heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
      }

      // Heatmap data: 500 Points
      function getPoints() {
        return [
          new google.maps.LatLng(14.611389, 120.988222),
          new google.maps.LatLng(14.611144, 120.987868),
          new google.maps.LatLng(14.612286, 120.989198),
          new google.maps.LatLng(14.612089, 120.988908),
          new google.maps.LatLng(14.609940, 120.986451),
          new google.maps.LatLng(14.612369, 120.986144),
          new google.maps.LatLng(14.612743, 120.986551),
          new google.maps.LatLng(14.609462, 120.992749),
          new google.maps.LatLng(14.607593, 120.988994),
         
        ];
      }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key= AIzaSyC4yQOIuoiFTKwrdk21GSU0_W5nmyh5vmU &libraries=visualization&callback=initMap">
    </script>
  </body>
</html>