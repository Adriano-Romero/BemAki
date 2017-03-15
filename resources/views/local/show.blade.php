@extends('layouts.app')

@section('content')
	<style>
	#map-canvas{
		width: 400px;
		height: 400px;
	}
</style>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q"
  type="text/javascript"></script>

<div class="container">

  <h1>{{$local[0]->nome}}</h1>

  <div id="map-canvas"></div>
</div>

<script>

  var lat = {{$local[0]->stx}};
  var lng = {{$local[0]->sty}};

  var map = new google.maps.Map(document.getElementById('map-canvas'),{
    center:{
      lat: lat,
      lng: lng
    },
    zoom: 15
  });

  var marker = new google.maps.Marker({
    position:{
      lat:lat,
      lng: lng
    },
    map:map
  });


  //thanks for watching..................
  //subscribe, share, like, comment............................
</script>
@stop