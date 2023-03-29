<?php
$con = mysqli_connect("team1db.cbublt8spaue.us-east-2.rds.amazonaws.com","team1master","\$123Fuelquote456", 'sys');

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>