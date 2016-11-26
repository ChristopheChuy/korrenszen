<?php 
header('Content-type: text/html; charset=UTF-8'); 
?>
<?php 
  session_start();
    if($_SESSION['pseudo_user'] == ""){
    include("initialiseSessions.php");
  }
?>
<?php
$bdd = mysqli_connect('localhost', 'root', '', 'korreszen');
mysqli_set_charset($bdd, "utf8");
 $password = $_POST["password"];
 $email = $_POST["email"];
 $testmail = htmlspecialchars($email);
 $testmail = mysqli_real_escape_string($bdd, $testmail);
 
 $mail = mysqli_query($bdd,"SELECT email FROM utilisateur WHERE utilisateur.email= '$testmail'");
 $mai = mysqli_fetch_assoc($mail);
 $mails = $mai["email"];

 if($mails != ""){
     $recuppassword = mysqli_query($bdd,"SELECT mdp FROM utilisateur WHERE utilisateur.email= '$mails'");
     $recuppass = mysqli_fetch_assoc($recuppassword);
     $recuppasswords = $recuppass["mdp"];
     $passwordsecure = md5($password);
     if($passwordsecure == $recuppasswords){
        $result =mysqli_query($bdd,"SELECT pseudo FROM utilisateur WHERE utilisateur.email = '$mails'");
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION["pseudo_user"] = $row['pseudo'];
        }
     }else{
         echo "error";
     }
        
    }else{
     echo "error";
    }

?>