<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Quicksand|Roboto" rel="stylesheet"> 
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="css/live-routes.css">
		<link type="text/css" rel="stylesheet" href="css/cards.css">
		<link type="text/css" rel="stylesheet" href="css/nav.css">
	</head>
	<body>
		<nav>
			<img class="brand" src="images/sample1.jpg">
			<ul id="nav-menu" class="list-inline">
				<li><a href="dashboard.php">Home</a></li>
				<li><a href="#">Live Routes</a></li>
				<li><a href="sensurge-analytics.php">Sensurge Analytics</a></li>
			</ul>
		</nav>
		
		<!-- <div class="side-nav">
			<h3>My Routes</h3>
			<ul id="side-nav-items" class="list-group">
				<a href="dashboard.php"><li class="list-group-item">General</li></a>
				<a href="#"><li class="list-group-item">History</li></a>
				<!-- <a href=""><li class="list-group-item">Live Routes</li></a>
				<a href=""><li class="list-group-item">Re-routed Routes</li></a>
				<a href=""><li class="list-group-item">Disabled Routes</li></a>
			</ul>
		</div> -->

		<div id="main-content" class="container">
			<center><h2>Live Routes</h2></center>
			<div class="long-card-centered">
        <div class="card-img-container">
          <img class="card-img" src="images/sample1.jpg">
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
          <center><p>Live status: <span class="orange">Re-routed</span></p></center>
          <br>
          <a class="card-link" href="card-details-rerouted.php?route_id='1'">Go to Route Details</a>
        </div>


			
		</div>

		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery-2.2.0.min.js"></script>
	</body>
</html>