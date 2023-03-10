<?php
session_start();
if(!(isset($_SESSION['owner']))){
    header("Location: register.php");
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
    <td><div id="reqsArea" width="30%" height="100%" align="left" > tyu  </div></td>
    <td><div id="connArea" width="30%" height="100%" align="center" > yuy  </div></td>
    <td><div id="pushArea" width="30%" height="100%" align="right" > uy  </div></td>
</tr>

</table>