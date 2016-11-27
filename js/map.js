var map;
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
    var map = new google.maps.Map(document.getElementById('map'),
        mapOptions);
    
    // map = new google.maps.Map(document.getElementById('map'), );
    // var GeoMarker = new GeolocationMarker(map);

    // Try HTML5 geolocation.
    var GeoMarker = new GeolocationMarker(map);
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: 47.316667,
                lng: 5.016667
            };
            map.setCenter(pos);
        })
        var contentString = '<div id="content">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
            '<div id="bodyContent">' +
            '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
            'sandstone rock formation in the southern part of the ' +
            'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) ' +
            'south west of the nearest large town, Alice Springs; 450&#160;km ' +
            '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major ' +
            'features of the Uluru - Kata Tjuta National Park. Uluru is ' +
            'sacred to the Pitjantjatjara and Yankunytjatjara, the ' +
            'Aboriginal people of the area. It has many springs, waterholes, ' +
            'rock caves and ancient paintings. Uluru is listed as a World ' +
            'Heritage Site.</p>' +
            '<div class="fb-like" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>' +

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
        for (var i = 0; i < 150; i++) {
            markerAdd(infowindow,map);
        }
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
    //
}

function markerAdd(infowindow,map) {
    var sens = 1;
    if (Math.random() < 0.5) {
        sens = -1
    }
    switch (Math.random() * 4 | 0) {
      /*  case 0:
            var icon = '../img/marqueurrouge.png';
            break;
        case 1:
            var icon = '../img/marqueurbleu.png';
            break;
        case 2:
            var icon = '../img/marqueurvert.png';
            break;
        case 3:
            var icon = '../img/marqueurorange.png';
            break;*/

        default:
            var icon = '../img/marqueurrouge.png';
            break;
    }
    var uluru = { lat: (Math.random() * 0.2) + 47.316667, lng: (Math.random() * sens * 0.2) + 5.016667 };

    var marker = new google.maps.Marker({
        position: uluru,
        map: map,
        title: '',
        icon: icon
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

function getHistorique(type) {
    console.log(type);
    $.ajax({
        url: '../php/getPointInteretEvenement.php', // Le nom du fichier indiqué dans le formulaire
        type: 'POST', // La méthode indiquée dans le formulaire (get ou post)
        data: { id_type: type }, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
        success: function (answer) { // Je récupère la réponse du fichier PHP
            alert(answer); // J'affiche cette réponse
            console.log(answer);
        }
    });

}