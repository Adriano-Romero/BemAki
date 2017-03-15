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
<h1 class='text-center'>Marcadores coletados</h1>
  
<div class="container vertical-center">
  <div id="map"></div>
</div>
  

  <script type="text/javascript">

    var locations = <?php echo $locations ?>;

     var map = new google.maps.Map(document.getElementById('map'), {
  center: new google.maps.LatLng( -19.834604713854,-43.16810250423),
      zoom:15
    });
 var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i].stx, locations[i].sty),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i].nome);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }


  </script>

@stop