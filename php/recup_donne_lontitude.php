<?php 
header('Content-type: text/html; charset=UTF-8'); 
?>
<?php
$bdd = mysqli_connect('localhost', 'root', '', 'korreszen');
mysqli_set_charset($bdd, "utf8");
$idcoordonnee = $_POST["idcoordonnee"];

$latilon = mysqli_query($bdd,"SELECT latitude, longitude, nom_evenement, description_evenement FROM evenement inner join coordonnee on evenement.id_coordonnee = coordonnee.id_coordonnee where coordonnee.id_coordonnee = '$idcoordonnee' ");
$row = mysqli_fetch_assoc($latilon);
$evenement = $row;

header('Content-Type: application/json'); //Pour définir le type de données envoyée (ici du JSON)
echo json_encode($evenement);
?>