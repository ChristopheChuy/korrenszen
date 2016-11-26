<?php 
header('Content-type: text/html; charset=UTF-8'); 
?>
<?php
$bdd = mysqli_connect('localhost', 'root', '', 'korreszen');
mysqli_set_charset($bdd, "utf8");
 $password = $_POST["password"];
 $clef = $_POST["clef"];
 $testclef = htmlspecialchars($clef);
 $testclef = mysqli_real_escape_string($bdd, $testclef);
 $passwordsecure = md5($password);
 $mail = mysqli_query($bdd,"SELECT mail FROM Clients WHERE Clients.token= '$testclef' AND Clients.flag ='1'");
 $mai = mysqli_fetch_assoc($mail);
 $mails = $mai["mail"];
 
 if($mails != ""){
     $changementmdp = mysqli_query($bdd,"UPDATE Clients SET Clients.mdp='$passwordsecure', Clients.token='', Clients.flag='0' WHERE Clients.mail='$mails' AND Clients.token='$testclef' AND Clients.flag='1'");
    }else{
     echo "cleffausse";
    }

?>