<?php
$bdd = mysqli_connect('localhost', 'root', '', 'korreszen');
$id_type = $_POST["id_type"];
$result = mysqli_query($bdd,'SELECT nom_evenement FROM evenement where id_type = 1');
$result->mysqli_fetch_array(MYSQLI_ASSOC);

$reponses->evenement =$result = mysqli_query($bdd,'SELECT nom_point FROM point_interet where id_type = 1');
$reponses->point_interet = $result->mysqli_fetch_array(MYSQLI_ASSOC);


echo json_encode(['reponses' => $reponses]);
