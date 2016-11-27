<?php
header('Content-type: text/html; charset=UTF-8'); 
?>
<?php 
  session_start(); 
  if($_SESSION['pseudo_user'] == "")
    include("../php/initialiseSessions.php");
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="../css/style_connexion.css">

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/normalize.css" />	
    <link rel="stylesheet" type="text/css" href="../css/type_voyage.css" />
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="../js/jquery-3.1.0.min.js"></script>
</head>
<body class="center" style="margin-top:0px;padding-top:0px;">
    
         <button  onclick="decouverte()" type="button" class="btn btn-default decouverte">Mode touristique</button>
   
            <button  onclick="exploration()" type="button" class="btn exploration btn-default">Mode découverte</button>
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>     
    <script src="../js/type_voyage.js"></script>

</body>
</html>