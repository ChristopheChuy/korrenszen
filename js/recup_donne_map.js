$( document ).ready(function() {
    
$.ajax({
    url: '../php/recup_donne_map.php',
    type: 'POST',
    dataType: "json",
    data: {},
    success: function (response) 
    { 
        $toto = JSON.stringify(response);
        var nb=0;
        console.log(response.id_evenement);
        for(var i in response[0]){
            nb++;
            $toto = i; 
            $tata = response[0][i];
        }
        var count = Object.keys(response).length;
        $cpt = 0;
        for($i=1;$i<=count;$i++){
            $idevenement = response[$cpt].id_evenement;
            $nomevenement = response[$cpt].nom_evenement;
            $idcoordonnee = response[$cpt].id_coordonnee;
            $descriptionevenement = response[$cpt].description_evenement;
            
            $.ajax({
                url: '../php/recup_donne_lontitude.php',
                type: 'POST',
                dataType: "json",
                data: { idcoordonnee: $idcoordonnee},
                success: function (response) 
                { 
                    $longitude = response.longitude;
                    $latitude = response.latitude;
                    
                },
                error: function(XMLHttpRequest, textStatus, exception, response) { alert("Ajax failure\n" + response ); },
                async: true
            });
            $cpt++;
        }
    },
    error: function(XMLHttpRequest, textStatus, exception, response) { alert("Ajax failure\n" + response ); },
    async: true
}); 
    
});