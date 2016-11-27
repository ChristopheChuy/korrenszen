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
 $pseudo = $_POST["pseudo"];
 $password = $_POST["password"];
 $email = $_POST["email"];
 $testnom = htmlspecialchars($pseudo);
 $testnom = mysqli_real_escape_string($bdd, $testnom);
 $testmail = htmlspecialchars($email);
 $testmail = mysqli_real_escape_string($bdd, $testmail);

 $passwordsecure = md5($password);
 $mail = mysqli_query($bdd,"SELECT email FROM utilisateur WHERE utilisateur.email= '$testmail'");
 $mai = mysqli_fetch_assoc($mail);
 $mails = $mai["email"];

 if($mails == ""){ 
     
    $inscription = mysqli_query($bdd,"INSERT INTO `utilisateur`(`pseudo`, `email`, `mdp`) 
            VALUES ('$testnom', '$testmail', '$passwordsecure')");
            
    if($inscription){
      
        $_SESSION["pseudo_user"] = $testnom;
    }
 }else{
     echo "mailutilise";
 }

?>