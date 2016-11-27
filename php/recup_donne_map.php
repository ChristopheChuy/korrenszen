<?php 
header('Content-type: text/html; charset=UTF-8'); 
?>
<?php
$bdd = mysqli_connect('localhost', 'root', '', 'korreszen');
mysqli_set_charset($bdd, "utf8");

$mail = mysqli_query($bdd,"SELECT id_evenement, nom_evenement, id_coordonnee, description_evenement FROM evenement ");

$evenement = array();
$cp = 0;
 while($row = mysqli_fetch_assoc($mail))
    {
        $evenement[$cp] = $row;
        $cp++;
    }
header('Content-Type: application/json'); //Pour définir le type de données envoyée (ici du JSON)
echo json_encode($evenement);
?>