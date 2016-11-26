<?php 
header('Content-type: text/html; charset=UTF-8'); 
?>
<?php
$bdd = mysqli_connect('localhost', 'root', '', 'korreszen');
mysqli_set_charset($bdd, "utf8");
 $email = $_POST["email"];
 $testmail = htmlspecialchars($email);
 $testmail = mysqli_real_escape_string($bdd, $testmail);
 
 $mail = mysqli_query($bdd,"SELECT email FROM utilisateur WHERE utilisateur.email= '$testmail'");
 $mai = mysqli_fetch_assoc($mail);
 $mails = $mai["email"];
 $datedemande = date("Y-m-d");
 if($mails != ""){
     $recuppassword = mysqli_query($bdd,"SELECT mdp FROM utilisateur WHERE utilisateur.email= '$mails'");
     $recuppass = mysqli_fetch_assoc($recuppassword);
     $recuppasswords = $recuppass["mdp"];
     $recupnom = mysqli_query($bdd,"SELECT pseudo FROM utilisateur WHERE utilisateur.email= '$mails'");
     $recupn = mysqli_fetch_assoc($recupnom);
     $recupnoms = $recupn["email"];
     $token1 = $recuppasswords + $datedemande + $mails;
     $token = md5($token1);
     
     $testdejademande = mysqli_query($bdd,"SELECT mail FROM utilisateur WHERE utilisateur.mail= '$mails' AND utilisateur.token='' AND utilisateur.flag='0'  AND utilisateur.seudo='$recupnoms'");
     $testdejademan = mysqli_fetch_assoc($testdejademande);
     $testdejademandes = $testdejademan["email"];
     if($testdejademandes != ""){
         $changementmdp = mysqli_query($bdd,"UPDATE utilisateur SET utilisateur.token='$token', utilisateur.flag='1' WHERE utilisateur.email='$mails' AND utilisateur.token='' AND utilisateur.flag='0' AND utilisateur.pseudo='$recupnoms'");
     
$message='<html>
<head>
</head>
<body>
<center><h1>Bonjour '.$recupnoms.'</h1><center>
<p>Pour changer votre mot de passe entrez votre clef sur ce lien <a href="http://localhost/changement_password.php">SAM - Changer son mot de passe</a> et suivez les instructions</p>
<p>Voici la Clef pour reinitialiser votre mot de passe : '.$token.'</p>
<p>A tres bientôt sur SAM</p>
<p>Ceci est un message automatique, merci de ne pas y répondre</p>
</body>
</html>';
$subject = 'Mot de passe oublié';
$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-Type: text/html; charset=ISO-8859-1'. "\r\n";   
mail($mails, $subject, $message, $headers);		
     }else{
         echo "demandefaite";
     }   
    }else{
     echo "error";
    }

?>