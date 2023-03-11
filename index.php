
<?php
session_start();
if($_SESSION['reg'] ==NULL) {
    //user not logged in
    header("Location: register.php");
}
echo "Hello, <h3>" . $_SESSION['name'] . "</h3>";
function token(){
    require 'config.php';
    $i=0;
    $token='';
    while($i<5){
        $rn= rand(0,35); // 10 numbers and 26 alphabets
        if($rn<10){
            $token= $token . $rn;
        }else{
            $token= $token . chr(55 + $rn); //concatenation using ASCII values
        }
        $i++;
    }

    $sql="INSERT INTO token_customr(token, name, owner, time) VALUES('" . $token . "', '" . $_SESSION['name'] . "', '', '" . time() . "')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error on sql operation " . $conn->error;
      }
      $conn->close(); //left off from config.php
    return $token;
    //this function will return a random alpha-numeric token as a function of time and user
}

?>
<script> 

    function generate(){
        document.location="?t=0";
    }
    setInterval(updateConn, 2000);
    var str=0; //Number of currently listed shops
    function updateConn(){
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            document.getElementById("conn").innerHTML = this.responseText;
        }
        xmlhttp.open("GET", "getConn.php?q=" + str);
        xmlhttp.send();
    }
</script>

<button id="butn" style="font-style:bold; width:100%; font-size:200%;" onClick="generate()">Generate new Token </button>
<div id="token" border="5px" style="font-size: 250%;" align="center">
<?php if(isset($_GET['t']) && $_GET['t'] == 0){ echo token();} ?>
</div>
<style>div.noti{ overflow-y:auto;}</style>
<strong><u>Connected Shops</u></strong>
<div id="conn">

<!-- Connected shops with this particular user will be listed here -->
</div>