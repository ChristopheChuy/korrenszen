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
        console.log(nb);
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
                    $nomevenementnou = response.nom_evenement;
                    $descriptionevenementnou = response.description_evenement;
                    
                    markerAdd($latitude, $longitude, $nomevenementnou, $descriptionevenementnou);
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

var map;
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 43.609850699999996, lng: 3.8811104999999997 },
        zoom: 8,
        styles : [
    {
        "featureType": "landscape",
        "stylers": [
            {
                "hue": "#FFBB00"
            },
            {
                "saturation": 43.400000000000006
            },
            {
                "lightness": 37.599999999999994
            },
            {
                "gamma": 1
            }
        ]
    },
    {
        "featureType": "road.highway",
        "stylers": [
            {
                "hue": "#FFC200"
            },
            {
                "saturation": -61.8
            },
            {
                "lightness": 45.599999999999994
            },
            {
                "gamma": 1
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "stylers": [
            {
                "hue": "#FF0300"
            },
            {
                "saturation": -100
            },
            {
                "lightness": 51.19999999999999
            },
            {
                "gamma": 1
            }
        ]
    },
    {
        "featureType": "road.local",
        "stylers": [
            {
                "hue": "#FF0300"
            },
            {
                "saturation": -100
            },
            {
                "lightness": 52
            },
            {
                "gamma": 1
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "hue": "#0078FF"
            },
            {
                "saturation": -13.200000000000003
            },
            {
                "lightness": 2.4000000000000057
            },
            {
                "gamma": 1
            }
        ]
    },
    {
        "featureType": "poi",
        "stylers": [
            {
                "hue": "#00FF6A"
            },
            {
                "saturation": -1.0989010989011234
            },
            {
                "lightness": 11.200000000000017
            },
            {
                "gamma": 1
            }
        ]
    }
]
    });
    console.log(map);

    
    
    
    
    
  
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            map.setCenter(pos);
        })
        
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}

function markerAdd(lati, long, nom, descip) {
    console.log(lati);
    console.log(long);
    $latitu = Number(lati);
    $longitu = Number(long);
    $nom = nom;
    $descrip = descip;
    var sens = 1;
    if (Math.random() < 0.5) {
        sens = -1
    }
    var uluru = { lat: (Math.random() * 0.2) + $latitu, lng: (Math.random() * sens * 0.2) + $longitu };
    var contentString = '<div id="content">' +
        '<div id="siteNotice">' +
        '</div>' +
        '<h1 id="firstHeading" class="firstHeading">'+ $nom +'</h1>' +
        '<div id="bodyContent">' +
        '<p>'+ $descrip + '</p>' +


        '<span class="glyphicon glyphicon-star " style="color:yellow" aria-hidden="true"></span>' +
        '<span class="glyphicon glyphicon-star " style="color:yellow" aria-hidden="true"></span>' +
        '<span class="glyphicon glyphicon-star " style="color:yellow" aria-hidden="true"></span>' +
        '<span class="glyphicon glyphicon-star-empty " style="color:yellow" aria-hidden="true"></span>' +
        '<span class="glyphicon glyphicon-star-empty " style="color:yellow" aria-hidden="true"></span>' +
        '<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>' +

        '(last visited June 22, 2009).</p>' +
        '</div>' +
        '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    var marker = new google.maps.Marker({
        position: uluru,
        map: map,
        title: '',
        icon: '../img/testmarqueurrouge.png'
    });
    marker.addListener('click', function () {
        infowindow.open(map, marker);
    });
}


function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
}
function getPointDInteret(){

}