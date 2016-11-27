<!DOCTYPE html>
<html>
  <head>
    <title>Maps</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/map.css" rel="stylesheet">
  
  </head>
 
  <body>
 
<div class="row bordure" >
    <div onclick="changeidType(3)" class="center col-xs-3">
        <img src="../img/bouton rouge.png" alt=""></img>
        <span>CULINAIRE</span>
    </div>
    <div onclick="changeidType(1)" class="center col-xs-3">
        <img src="../img/bouton orange.png" alt=""></img>
        <span>HISTOIRE</span>
    </div>
    <div  onclick="changeidType(2)" class="center col-xs-3">
        <img src="../img/bouton bleu.png" alt=""></img>
        <span>ART</span>
    </div>
    <div onclick="changeidType(4)"  class="center col-xs-3">
        <img src="../img/bouton vert.png" alt=""></img>
        <span>LOISIRS</span>
    </div>
</div>
    <div id="map"></div>
    <script src="../js/jquery-3.1.0.min.js"></script>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4wilqA9ziJWNZhpyvpyxfzzcWv9pG45I"
       ></script>
         <script src="../node_modules/geolocation-marker.js"></script>
    <script src="../js/map.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
    <script>initMap()</script>
  </body>
</html>
        