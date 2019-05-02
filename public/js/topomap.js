	//start and finish are defined previously in detail.php

	var center = [(start[0]+finish[0])/2, (start[1]+finish[1])/2];

	//base map
	var topomap = L.map('topomap', {center:center, zoom:17});

	//topomap tiles
	var LinzTopoMap = L.tileLayer('https://koordinates-tiles-a.global.ssl.fastly.net/services;key=' + config.TOPOMAP + '/tiles/v4/layer=52343,style=auto/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.linz.govt.nz/land/maps/topographic-maps/topo50-maps">LINZ</a>, &copy; <a href="https://koordinates.com/data/global/oceania/new-zealand/">koordinates</a>, &copy; <a href="https://catalogue.data.govt.nz/dataset/doc-tracks">DOC</a>'
	}).addTo(topomap);

	//kml overlay for doc tracks
	var kmlStyle = L.geoJson(null, {style: function(feature){ return{ color: 'purple' };}});
	var docTracks = omnivore.kml('inc/doc.kml', null, kmlStyle).addTo(topomap);

	//create a polyline from an array of LatLng points
	var polyline = L.polyline([start, finish]);

	//zoom the map to the polyline
	topomap.fitBounds(polyline.getBounds());

	//add scale
	L.control.scale().addTo(topomap);

	//place markers
	L.marker(start).addTo(topomap)
		.bindPopup('Start');
	L.marker(finish).addTo(topomap)
		.bindPopup('Finish');
