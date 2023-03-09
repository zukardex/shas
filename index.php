<?php
session_start();
if($_SESSION['reg'] ==NULL) {
    //user not logged in
    header("Location: register.php");
}

?>