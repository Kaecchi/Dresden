//map	
var gmegMap, gmegMarker, gmegInfoWindow, gmegLatLng;

	function gmegInitializeMap() {
		gmegLatLng = new google.maps.LatLng(51.067203, 13.750174);
		gmegMap = new google.maps.Map(document.getElementById("gmeg_map_canvas"), {
			zoom: 15,
			center: gmegLatLng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		gmegMarker = new google.maps.Marker({
			map: gmegMap,
			position: gmegLatLng
		});
		gmegInfoWindow = new google.maps.InfoWindow({
			content: '<b></b><br>Hostel Louise 20, Louisenstraße, Dresden<br>'
		});
		gmegInfoWindow.open(gmegMap, gmegMarker);
	}
	google.maps.event.addDomListener(window, "load", gmegInitializeMap);
