@extends('layouts.app')
@section('header')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDZfJBn41vq6Qgh8WiplJ3-o7mmECt63_0&sensor=false&signed_in=true&libraries=geometry,places">
  </script>


	<style type="text/css">
	#map {
		border:1px solid red;
		width: 1100px;
		height: 500px;    
	}
	</style>
@stop

@section('content')
<h1 class='text-center'>Marcadores coletados - Index</h1>
	
<div class="container vertical-center">
	<div id="map"></div>
</div>
 <script>
 function initMap() {


        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 3,
          center: new google.maps.LatLng( -19.834604713854,-43.16810250423),
        });

        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = [];
        for (var i = 0; i < 100; i++) {
    var latLng = new google.maps.LatLng(locations[i].stx, locations[i].sty);
    var marker = new google.maps.Marker({'position': latLng});
    markers.push(marker);
    }

      


        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }
      

      
  </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>  

 

@stop