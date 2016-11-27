function initData() {
    $(document).ready(function () {
        $.ajax({
            url: '../php/recup_donne_map.php',
            type: 'POST',
            dataType: "json",
            data: { id_type: id_type_selected },
            success: function (response) {
                $toto = JSON.stringify(response);
                var nb = 0;
                console.log(response.id_evenement);
                for (var i in response[0]) {
                    nb++;
                    $toto = i;
                    $tata = response[0][i];
                }
                console.log(nb);
                var count = Object.keys(response).length;
                $cpt = 0;
                for ($i = 1; $i <= count; $i++) {
                    $idevenement = response[$cpt].id_evenement;
                    $nomevenement = response[$cpt].nom_evenement;
                    $idcoordonnee = response[$cpt].id_coordonnee;
                    $descriptionevenement = response[$cpt].description_evenement;


                    $.ajax({
                        url: '../php/recup_donne_lontitude.php',
                        type: 'POST',
                        dataType: "json",
                        data: { idcoordonnee: $idcoordonnee },
                        success: function (response) {



                            $longitude = response.longitude;
                            $latitude = response.latitude;
                            $nomevenementnou = response.nom_evenement;
                            $descriptionevenementnou = response.description_evenement;

                            markerAdd($latitude, $longitude, $nomevenementnou, $descriptionevenementnou);
                        },
                        error: function (XMLHttpRequest, textStatus, exception, response) { alert("Ajax failure\n" + response); },
                        async: true
                    });
                    $cpt++;
                }
            },
            error: function (XMLHttpRequest, textStatus, exception, response) { alert("Ajax failure\n" + response); },
            async: true
        });

    });
}
var id_type_selected = 1;
var map;
var markers = [];
function changeidType(valeur) {
    id_type_selected = valeur;
    clearMarkers();
    initData();
    console.log(id_type_selected);
}
// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setMapOnAll(null);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}
function initMap() {

    var mapOptions = {
        center: { lat: 47.316667, lng: 5.016667 },
        zoom: 12,
        disableDefaultUI: true,
        styles: [
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
    };
    map = new google.maps.Map(document.getElementById('map'),
        mapOptions);

    // map = new google.maps.Map(document.getElementById('map'), );
    // var GeoMarker = new GeolocationMarker(map);


    // Try HTML5 geolocation.
    var GeoMarker = new GeolocationMarker(map);
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
                // lat: 47.316667,
                // lng: 5.016667
            };
            map.setCenter(pos);
        })

    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
    initData();
    //
}

function markerAdd(lati, long, nom, descip) {
    // console.log(lati);
    // console.log(long);
    $latitu = Number(lati);
    console.log($latitu);
    $longitu = Number(long);
    $nom = nom;
    $descrip = descip;
    var uluru = { lat: $latitu, lng: $longitu };
    console.log(uluru);
    var contentString = '<div id="content">' +
        '<div id="siteNotice">' +
        '</div>' +
        '<h1 id="firstHeading" class="firstHeading">' + $nom + '</h1>' +
        '<div id="bodyContent">' +
        '<p>' + $descrip + '</p>';


    switch (id_type_selected) {
        case 3:
            var icon = '../img/marqueurrouge.png';
            break;
        case 2:
            var icon = '../img/marqueurbleu.png';
            break;
        case 4:
            var icon = '../img/marqueurvert.png';
            break;
        case 1:
            var icon = '../img/marqueurorange.png';
            break;
        default:
            var icon = '../img/marqueurrouge.png';
            break;
    }
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map,
        icon: icon
    });
    markers.push(marker);
    marker.addListener('click', function () {
        infowindow.open(map, marker);
    });
};


function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
}
