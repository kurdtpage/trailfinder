@extends('master')
@section('title', $track->text.' - Trailfinder')
@section('content')


<!-- /*
	id
	text
	description
	directions
	gps_start_x
	gps_start_y
	gps_finish_x
	gps_finish_y
	category_id
	created_id
	modified_id
	created_at
	updated_at
*/ -->

	<script>
		var start  = [-44.9637503315,169.1284877810];
		var finish = [-44.9796500014,169.1843040002];
	</script>
	<div class="container">
		<div class="row">
			<div class="col-8 bg-white" id="main">
				<nav aria-label="breadcrumb" class="sticky-top bg-white">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Tracks</a></li>
						<li class="breadcrumb-item"><a href="#">{{ $track->category }}</a></li>
						<li class="breadcrumb-item active" aria-current="page">{{ $track->text }}</li>
					</ol>
				</nav>

				<p><pre>
					<?php 
						print_r($track);
					?>
				</pre></p>

				<h1>{{ $track->text }}</h1>
				
				<h2>Description</h2>
				<div id="description" class="justify">{{ $track->description }}</div>

				<h3>Technical info</h3>
				<ul id="technical">
					<li>Start coordinates: <span id="start_lat">123</span>,<span id="start_lng">456</span></li>
					<li>Finish coordinates: <span id="finish_lat">123</span>,<span id="finish_lng">456</span></li>
					<li>Length: 10km</li>
					<li>Start altitude: 100m</li>
					<li>Finish altitude: 200m</li>
					<li>Elevation gain: 100m</li>
					<li>Dogs allowed: Yes</li>
				</ul>
							
				<h2>What you'll see</h2>
				<div id="features" class="justify">features</div>
				<div class="row">
					<div id="flora" class="col-6">
						<ul>
							<li>Trees</li>
							<li>Bushes</li>
							<li>Grass</li>
						</ul>
					</div>
					<div id="fauna" class="col-6">
						<ul>
							<li>Birds</li>
							<li>Cows</li>
							<li>Crickets</li>
						</ul>
					</div>
				</div>
				
				<h2>How to get there</h2>
				<div id="directions" class="justify">{{ $track->directions }}</div>
				
				<h2>Comments</h2>
				<div id="comments" class="justify">
					<ul>
						<li>comment</li>
					</ul>
				</div>
			</div><!-- /main -->

			<div class="col-4" id="sidebar">
				<!-- topomap -->
				<div id="topomap" class="map bg-white">
					<script>
						<?php
							require 'js/topomap.js';
							if(!empty($debug) && $debug){
						?>	
						var lat, lng;
						topomap.addEventListener('mousemove', function(ev) {
							lat = ev.latlng.lat;
							lng = ev.latlng.lng;
						});
						document.getElementById("topomap").addEventListener("contextmenu", function (event) {
							// Prevent the browser's context menu from appearing
							event.preventDefault();

								// Add marker
								L.marker([lat, lng]).addTo(topomap)
									.bindPopup(lat + ", " + lng);
								//alert(lat + ', ' + lng);

								return false; // To disable default popup.
							});
						<?php
							}
						?>
					</script>
				</div>

				<!-- google map -->
				<div class="map bg-white">
					<iframe
						id="googlemap"
						frameborder="0"
						style="border:0"
						allowfullscreen
					></iframe>
					<script>
						document.getElementById('googlemap').src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12104.35546051531!2d" + start[1] + "!3d" + finish[1] + "!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDTCsDU3JzQ5LjUiUyAxNjnCsDExJzAzLjUiRQ!5e1!3m2!1sen!2snz!4v1554446714694!5m2!1sen!2snz";
					</script>
				</div>
				
				<!-- rain radar -->
				<div class="map bg-white">
					<iframe 
						src="https://www.metservice.com/maps-radar/rain-forecast/rain-forecast-3-day#player-image-wrapper"
						scrolling="no" id="rainradar"
					>&copy; MetService</iframe>
				</div>
				
				<!-- downloads -->
				<div class="map bg-white" id="downloads">
					<h3>Downloads</h3>
					<ul>
						<li><a href="#">Track PDF</a></li>
						<li><a href="#">KML file</a></li>
						<li><a href="#">Directions</a></li>
					</ul>
				</div>
		
   			</div><!-- /sidebar -->
		</div><!-- /row -->
		<br>
		<div class="row bg-white" id="images">
			<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src=".../800x400?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src=".../800x400?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src=".../800x400?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div><!-- /images -->
	</div><!-- /container -->
@endsection