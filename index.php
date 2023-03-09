<?php
if(!(isset($_SESSION['reg']))){
    //user not logged in
    header("Location: register.php");
}

?>