<?php

	include('dbconfig.php');	

	if(isset($_POST["destination"]))
	{
		$name = $_POST['name'];
		$details = $_POST['details'];
		$origin = $_POST['origin'];
		$destination = $_POST['destination'];

		$sql = "INSERT INTO routes(name, details, origin, destination) VALUES('name', 'details', '$origin', '$destination')";
    
    if ($mysqli->query($sql) === TRUE) {
      
      header('Location: ../dashboard.php');
      
		} else {
		    // echo "Error: " . $sql . "<br>" . $mysqli->error;
		  ?><script type="text/javascript">
		    	alert('Something went wrong');
				window.location.href='../dashboard.php';
			</script><?php
		}

		$mysqli->close();


	}

?>