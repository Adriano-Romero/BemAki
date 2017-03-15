@extends('layouts.app')
@section('header')
<style>
	#map-canvas {
		width: 1050px;
		height: 350px; 
	}
</style>
@stop
@section('content')
	<div class="container">
	<div class="col-sm-4">
		<h1>Adicionar Localização</h1>
		{!! Form::open([
    'route' => 'locals.store'
]) !!}
			<div class="form-group">
				<label for="">Nome</label>
				<input type="text" class="form-control input-sm" name="nome">
			</div>

			<div class="form-group">
				<label for="">Endereço</label>
				<input type="text" class="form-control input-sm" name="address">
			</div>

			<div class="form-group">
				<label for="">Tipo</label>
				<input type="text" class="form-control input-sm" name="tipo">
			</div>

			<div class="form-group">
				<label for="">Mapa</label>
				<input type="text" id="searchmap">
				<div id="map-canvas"></div>
			</div>

			<div class="form-group">
				<label for="">Lat</label>
				<input type="text" class="form-control input-sm" name="latitude" id="lat">
			</div>

			<div class="form-group">
				<label for="">Lng</label>
				<input type="text" class="form-control input-sm" name="longitude" id="lng">
			</div>

			<button class="btn btn-sm btn-danger">Salvar</button>
		{{Form::close()}}
	</div>

</div>
@stop

@section('footer')
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDZfJBn41vq6Qgh8WiplJ3-o7mmECt63_0&sensor=false&signed_in=true&libraries=geometry,places">
  </script>

<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>

<script>


	var map = new google.maps.Map(document.getElementById('map-canvas'),{
		center:{
			lat: -19.83540200819097,
			lng: -43.16863894603273
		},
		zoom:18

	});

	var marker = new google.maps.Marker({
		position: {
			lat: -19.83540200819097,
			lng: -43.16863894603273
		},
		map: map,
		draggable: true
	});

	var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
	

	google.maps.event.addListener(searchBox,'places_changed',function(){

		var places = searchBox.getPlaces();
		var bounds = new google.maps.LatLngBounds();
		var i, place;

		for(i=0; place=places[i];i++){
			bounds.extend(place.geometry.location);
			marker.setPosition(place.geometry.location); 
		}

  		map.fitBounds(bounds);
  		map.setZoom(15);

	});

	google.maps.event.addListener(marker,'position_changed',function(){

		var lat = marker.getPosition().lat();
		var lng = marker.getPosition().lng();

		$('#lat').val(lat);
		$('#lng').val(lng);

	});

</script>
@stop