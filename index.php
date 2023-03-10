<?php
session_start();
if($_SESSION['reg'] ==NULL) {
    //user not logged in
    header("Location: register.php");
}

function token(){
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
    return $token;
    //this function will return a random alpha-numeric token as a function of time and user
}

?>
<script>
    function generate(){
        document.getElementById("token").innerHTML= "<?php echo token(); ?>";
    }
</script><button id="butn" style="font-style:bold; width:100%; font-size:200%;" onClick="generate()">Generate new Token </button>
<div id="token" border="5px" style="font-size: 250%;" align="center">

</div>