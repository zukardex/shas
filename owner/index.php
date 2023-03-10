<?php
session_start();
if(!(isset($_SESSION['owner']))){
    header("Location: register.php");
}
function getRequests(){
    return "No pending requests";
}

if(isset($_POST['token'])){
    require "../config.php";
    $sql = "SELECT name FROM `token_customr` where token ='". $_POST['token'] . "';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //Token was found on the database
        while($rowt= ( $result->fetch_assoc())){
        echo"found " . $rowt['name'];
        }
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