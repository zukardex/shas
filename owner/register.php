<?php
require '../config.php'; //configuration for database connection
    if(isset($_POST['Connect'])){  //To prevent automated requests      
        session_start();
            if((isset($_POST['name']) && isset($_POST['password'])) && ( ($_POST['name'] != NULL) && ($_POST['password']) !=NULL)){
                    //$_SESSION['reg']=1; //To recognise whether the user was logged in or not
                    $sql= "INSERT INTO owner(id, username, password, tokensc) VALUES ('','". $_POST['name'] . "','" . $_POST['password'] . "','')";
                        //tokensc includes the collected tokens by a merchant as JSON
                    if ($conn->query($sql) === TRUE) {
                        $_SESSION['owner']= $_POST['name'];
                        echo '<script>alert("You have been successfully registered");</script>';
                        //header("Location: index.php");
                      } else {
                        echo "Error on sql operation " . $conn->error;
                      }
                      $conn->close(); //left off from config.php
            }
    }

?>
<form method="post">
    <input type="name" name="name" placeholder="Your Username" required><br>
    <input type="password" name="password" placeholder="Your Password" required><br>
    <input type="submit" name="Connect">
</form>