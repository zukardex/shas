<?php
$db_host=""; //Hostname for mysql
$db_username=""; //username for mysqli
$db_password=''; //password for mysqli
$db_database=""; //database name


//initiating the connections
$conn= new mysqli($db_host, $db_username, $db_password, $db_database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
/*if ( ($conn->query($sql) !== TRUE)) {
  echo "Error on sql operation" . $conn->error;
}// To be used for checking a query*/




$conn->close();
?>