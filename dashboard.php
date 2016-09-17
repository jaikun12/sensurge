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
		</nav>
		
		<div class="side-nav">
			<h3>My Routes</h3>
			<ul id="side-nav-items" class="list-group">
				<a href="#"><li class="list-group-item">General</li></a>
				<a href="dashboard-history.php"><li class="list-group-item">History</li></a>
				<a href=""><li class="list-group-item">Live Routes</li></a>
				<a href=""><li class="list-group-item">Re-routed Routes</li></a>
				<a href=""><li class="list-group-item">Disabled Routes</li></a>
			</ul>
		</div>

		<div class="main-content">
			<h2>General</h2>
			<div class="card">
				<div class="card-img-container">
					<img class="card-img" src="images/landingbg.jpg">
				</div>
				<div class="card-text-container">
					<p class="card-title">Trinoma Delivery Route</p>
					<div class="divider"></div>
					<p class="card-sched">Place schedule details here</p>
					<a class="card-link" href="card-details.php">See Details</a>
				</div>
			</div>

			<div class="card">
				<div class="card-img-container">
					<img class="card-img" src="images/sample1.jpg">
				</div>
				<div class="card-text-container">
					<p class="card-title">M Plaza Delivery Route</p>
					<div class="divider"></div>
					<p class="card-sched">Place schedule details here</p>
					<a class="card-link" href="card-details.php">See Details</a>
				</div>
			</div>

			<div class="card">
				<div class="card-img-container">
					<img class="card-img" src="images/sample2.jpg">
				</div>
				<div class="card-text-container">
					<p class="card-title">Busan Delivery Route</p>
					<div class="divider"></div>
					<p class="card-sched">Place schedule details here</p>
					<a class="card-link" href="card-details.php">See Details</a>
				</div>
			</div>

			<div class="card">
				<div class="card-img-container">
					<img class="card-img" src="images/newroute.jpg">
				</div>
				<div class="card-text-container">
					<p class="card-title">Create a new Route</p>
					<div class="divider"></div>
					<p class="card-sched"></p>
					<a class="card-link" href="card-details.php">Create Here</a>
				</div>
			</div>
		</div>

		<script src="bootstrap.min.js"></script>
		<script src="js/jquery-2.2.0.min.js"></script>
	</body>
</html>