<?php
$bdd = mysqli_connect('localhost', 'root', '', 'korreszen');
$pointDInterets = mysqli_query($bdd,"SELECT nom_point,description FROM point_interet ");
$points = mysql_fetch_array($pointDInterets);
