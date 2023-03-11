<?php
require 'config.php';
session_start();
if(isset($_GET['q'])){  
    $q = intval($_GET['q']);
    $sql="SELECT owner FROM `token_customr` where name='" . $_SESSION['name'] .  "';";
    $results = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $i=0;
    while($row = mysqli_fetch_array($results)){
         echo $row['owner'] . "<br>";
        //$i++;
    }
}
$conn->close();


?>