<?php
require 'config.php'; //configuration for database connection
    if(isset($_POST['submit'])){  //To prevent automated requests      
        session_start();
            if((isset($_POST['name']) && isset($_POST['password'])) && ( ($_POST['name'] != NULL) && ($_POST['password']) !=NULL)){
                    $_SESSION['reg']=1; //To recognise whether the user was logged in or not
            }
    }
?>
<form method="post">
    <input type="name" name="name" placeholder="Your Username" required><br>
    <input type="password" name="password" placeholder="Your Password" required><br>
    <input type="submit" name="submit">
</form>