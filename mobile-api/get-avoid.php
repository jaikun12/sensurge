<?php
  header("Access-Control-Allow-Origin: *");
  include("../php/dbconfig.php");

  $sql = "SELECT * FROM avoid;";
  $result = $mysqli->query($sql);

  $avoid = [];

  while($row = mysqli_fetch_array($result)){
    $avoid[] = $row;
  }

  if(sizeof($avoid) >0){
    echo json_encode($avoid);
  }else{
    echo json_encode("[{}]");
  }

?>
