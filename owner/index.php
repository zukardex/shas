<?php
session_start();
if(!(isset($_SESSION['owner']))){
    header("Location: register.php");
}
echo "Hello, <h3>" . $_SESSION['owner'] . "</h3>";
function getRequests(){
    return "No pending requests";
}

if( isset($_POST['token'])){
    require "../config.php";
    $sql = "SELECT name FROM `token_customr` where token ='". $_POST['token'] . "';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //Token was found on the database
        /*
            If token is found-> add the token to the owner table-> alert the customer with the notification by adding this to the table.
        */   
        $sql="SELECT tokensc FROM owner WHERE  username ='" . $_SESSION['owner'] . "';";
        $results = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $token_j = mysqli_fetch_array($results, MYSQLI_BOTH);
        $arnt= $token_j[0] . ',' .$_POST['token'];
        if($arnt[0] == ','){$arnt[0]=' ';} //To manage some unexpected events
        $arnt=trim($arnt);                 //   "   "   "   "   "
        $sql="UPDATE `owner` SET `tokensc` = '" . $arnt . "' WHERE username ='" . $_SESSION['owner'] . "';";
        $results = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        //added token to the owners table


        //Now notifying the user about the successfull connection
        $sql= "update token_customr set owner = '" . $_SESSION['owner'] . "' where token ='" . $_POST['token'] . "';";
        $results = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    }
      $conn->close();
}
?>
<style>
div{
    text-align:center;
}
    </style>

<table border="3" width="100%">
<tr>
<th>Requests for bills</th>
<th>Connect a new customer</th>
<th>Push a new notification</th>
</tr>

<tr>
    <td><div id="reqsArea" width="30%" height="100%" align="left" > <?php echo getRequests(); ?>  </div></td>
    <td>
        <div id="connArea" width="30%" height="100%" align="center" >
                <form method="post"><input type="token" name="token" required><br><input type="submit"></form>
        </div>
    </td>


    <td><div id="pushArea" width="30%" height="100%" align="right" > uy  </div></td>
</tr>

</table>