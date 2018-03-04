<?php function googleMaps(){ ?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAb-Xtmw4zMGpHvKQ82yp63hHV4evXU0mc"></script>


        <script type="text/javascript">

	// Create and Initialise the Map (required) our google map below

            google.maps.event.addDomListener(window, 'load', init);

            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions

		var mapOptions = {

		     // How zoomed in you want the map to start at (always required)

                    zoom: 13,
                    scrollwheel: false,
                    // The latitude and longitude to center the map (always required)

                    center: new google.maps.LatLng(51.917007, 5.452366), // Nova Scotia

                    // How you would like to style the map. 
                    // This is where you would paste any style found on [Snazzy Maps][1].
                    // copy the Styles from Snazzy maps,  and paste that style info after the word "styles:"

                    styles: 
            [
    {
        "featureType": "administrative",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "administrative.locality",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "-100"
            },
            {
                "lightness": "45"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#005163"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#f49611"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "weight": "6.17"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#f49611"
            },
            {
                "lightness": "50"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#000000"
            },
            {
                "lightness": "71"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#48c9fe"
            },
            {
                "visibility": "on"
            },
            {
                "saturation": "-27"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text",
        "stylers": [
            {
                "color": "#005163"
            },
            {
                "visibility": "simplified"
            }
        ]
    }
]
                };



		var mapElement = document.getElementById('map');

                // Create the Google Map using out element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

		// Following section, you can create your info window content using html markup

                var contentString = '<div id="content">'+
                    '<div id="siteNotice">'+
                    '</div>'+
                    '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
                    '<div id="bodyContent">'+
                    '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
                    'sandstone rock formation in the southern part of the '+
                    'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
                    'south west of the nearest large town, Alice Springs; 450&#160;km '+
                    '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
                    'features of the Uluru - Kata Tjuta National Park. Uluru is '+
                    'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
                    'Aboriginal people of the area. It has many springs, waterholes, '+
                    'rock caves and ancient paintings. Uluru is listed as a World '+
                    'Heritage Site.</p>'+
                    '<p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
                    'http://en.wikipedia.org/w/index.php?title=Uluru</a> '+
                    '(last visited June 22, 2009).</p>'+
                    '</div>'+
                    '</div>';


		// Define the image to use for the map marker (58 x 44 px)

                var image = '/medel/wp-content/themes/medel/images/marker.png';

		// Define the Lattitude and Longitude for the map location

                var myLatLng = new google.maps.LatLng(51.92012308, 5.45543895);

		// Define the map marker characteristics

                var mapMarker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: image,
                title:  'Bedrijvenpark Medel'

                });

               // Following Lines are needed if you use the Info Window to display content when map marker is clicked

		   var infowindow = new google.maps.InfoWindow({
                            content: contentString
                        });

	    	// Following line turns the marker, into a clickable button and when clicked, opens the info window
                
                // Define the LatLng coordinates for the polygon's path.
        var triangleCoords = [
             new google.maps.LatLng(51.9191,5.46467), new google.maps.LatLng(51.92074,5.46272), new google.maps.LatLng(51.92093,5.4625), new google.maps.LatLng(51.92085,5.4614), new google.maps.LatLng(51.92134,5.46055), new google.maps.LatLng(51.92063,5.45458), new google.maps.LatLng(51.92012,5.4543), new google.maps.LatLng(51.92002,5.45236), new google.maps.LatLng(51.92077,5.4519), new google.maps.LatLng(51.91945,5.4469), new google.maps.LatLng(51.9199,5.44673), new google.maps.LatLng(51.91983,5.44226), new google.maps.LatLng(51.92075,5.43767), new google.maps.LatLng(51.92002,5.43671), new google.maps.LatLng(51.91857,5.4397), new google.maps.LatLng(51.91812,5.43935), new google.maps.LatLng(51.91705,5.44174), new google.maps.LatLng(51.91731,5.44229), new google.maps.LatLng(51.91622,5.44424), new google.maps.LatLng(51.91519,5.44589), new google.maps.LatLng(51.9129,5.44856), new google.maps.LatLng(51.91053,5.45072), new google.maps.LatLng(51.90751,5.45293), new google.maps.LatLng(51.90592,5.45395), new google.maps.LatLng(51.90536,5.45437), new google.maps.LatLng(51.90502,5.45514), new google.maps.LatLng(51.90501,5.45617), new google.maps.LatLng(51.90563,5.45853), new google.maps.LatLng(51.90624,5.46106), new google.maps.LatLng(51.90693,5.46372), new google.maps.LatLng(51.90751,5.466), new google.maps.LatLng(51.90784,5.46778), new google.maps.LatLng(51.90817,5.46952), new google.maps.LatLng(51.90888,5.47239), new google.maps.LatLng(51.90886,5.47241), new google.maps.LatLng(51.91046,5.47227), new google.maps.LatLng(51.91179,5.47225), new google.maps.LatLng(51.91151,5.47072), new google.maps.LatLng(51.9125,5.47014), new google.maps.LatLng(51.91411,5.4689), new google.maps.LatLng(51.91367,5.46644), new google.maps.LatLng(51.91617,5.46676), new google.maps.LatLng(51.91886,5.46726), 
        ];

        // Construct the polygon.
        var medelArea = new google.maps.Polygon({
          paths: triangleCoords,
          strokeColor: '#f49611',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#f49611',
          fillOpacity: 0.35
        });
        medelArea.setMap(map);                
}

</script>
    
<?php }