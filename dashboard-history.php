<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Quicksand|Roboto" rel="stylesheet"> 
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="css/dashboard.css">
		<link type="text/css" rel="stylesheet" href="css/nav.css">
	</head>
	<body>
		<nav>
			<img class="brand" src="images/sample1.jpg">
			<ul id="nav-menu" class="list-inline">
				<li><a href="#">Home</a></li>
				<li><a href="live-routes.php">Live Routes</a></li>
				<li><a href="sensurge-analytics.php">Sensurge Analytics</a></li>
			</ul>
		</nav>
		
		<div class="side-nav">
			<h3>My Routes</h3>
			<ul id="side-nav-items" class="list-group">
				<a href="dashboard.php"><li class="list-group-item">General</li></a>
				<a href="#"><li class="list-group-item">History</li></a>
				<!-- <a href=""><li class="list-group-item">Live Routes</li></a> -->
				<a href=""><li class="list-group-item">Re-routed Routes</li></a>
				<a href=""><li class="list-group-item">Disabled Routes</li></a>
			</ul>
		</div>

		<div class="main-content">
			<h2>History</h2>
			<table class="table table-striped">
				<thead>
					<th>Route</th>
					<th>Schedule</th>
					<th>Status</th>
					<th>Rerouted?</th>
					<th>Completion Date</th>
				</thead>
				<tbody>
					<tr>
						<td>Trinoma Delivery Route</td>
						<td>Monday 3pm</td>
						<td><span class="green">Completed</span></td>
						<td>No</td>
						<td>Monday 5pm</td>
					</tr>
				</tbody>
			</table>
		</div>

		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery-2.2.0.min.js"></script>
	</body>
</html>