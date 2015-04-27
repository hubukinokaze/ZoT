
function jsonLoad1(data) {
	var Dest = [];
	var Long = [];
	var Lat = [];
	var Stp = [];
	var Spd = [];

	$("div#source_01_1").html("</div>");
	$(data).find("TripMessage").text(function(){
		Dest.push($(this).find("Destination").text());
		Long.push($(this).find("Longitude").text());
		Lat.push($(this).find("Latitude").text());
		Stp.push($(this).find("Stop").text());
		Spd.push($(this).find("Speed").text());
	});

	for (i = 0; i < Dest.length; i++){
		$("div#source_01_1").append("<div class=\"row\"></div>");
		$("div#source_01_1").append("<div class=\"col-sm-4\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Destination: "+Dest[i]+"</div>"+
		"<div class=\"col-sm-3\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Long: "+Long[i]+", Lat: "+Lat[i]+"</div>"+
		"<div class=\"col-sm-3\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Next stop: "+Stp[i]+"</div>"+
		"<div class=\"col-sm-2\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Speed: "+Spd[i]+"</div></br>")};
}

function jsonLoad2(data) {
	$("div#source_02_1").html("</div>");
	for (i = 0; i < data.length; i++){
		$("div#source_02_1").append("<div class=\"row\"></div>");
		$("div#source_02_1").append("<div class=\"col-sm-2\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Station Name: "+data[i].station.name+"</div>"+
		"<div class=\"col-sm-3\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Long: "+data[i].station.coord.lon+", Lat: "+data[i].station.coord.lat+"</div>"+
		"<div class=\"col-sm-2\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Wind Speed: "+data[i].last.wind.speed+"</div></br>")};
}

function jsonLoad3(data) {
	$("div#source_03_1").html("</div>");
	for (i = 0; i < 20; i++){
		$("div#source_03_1").append("<div class=\"row\"></div>");
		$("div#source_03_1").append("<div class=\"col-sm-2\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Route name: "+data[i].route_name+"</div>"+
		"<div class=\"col-sm-5\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Route info: "+data[i].description+"</div>"+
		"<div class=\"col-sm-2\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Taking detour: "+data[i].isdetour+"</div></br>")};
}

function jsonLoad4(data) {
	$("div#source_04_1").html("</div>");
	for (i = 0; i < 20; i++){
		$("div#source_04_1").append("<div class=\"row\"></div>");
		$("div#source_04_1").append("<div class=\"col-sm-4\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Address: "+data[i].name+"</div>"+
		"<div class=\"col-sm-3\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Timestamp: "+data[i].timestamp+"</div>"+
		"<div class=\"col-sm-2\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Available bikes: "+data[i].bikes+"</div></br>")};
}

function eqfeed_callback(data){jsonLoad5(data);}

function jsonLoad5(data) {
	$("div#source_05_1").html("</div>");
	for (i = 0; i < 20; i++){
		$("div#source_05_1").append("<div class=\"row\"></div>");
		$("div#source_05_1").append("<div class=\"col-sm-4\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Place: "+data.features[i].properties.place+"</div>"+
		"<div class=\"col-sm-3\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Timestamp: "+data.features[i].properties.time+"</div>"+
		"<div class=\"col-sm-3\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Long: "+data.features[i].geometry.coordinates[1]+", Lat: "+data.features[i].geometry.coordinates[0]+"</div>"+
		"<div class=\"col-sm-2\" style=\"padding:10px;border:solid 2px black;word-wrap:break-word\">Magnitude: "+data.features[i].properties.mag+"</div></br>")};
}

function retrieveData(){
	$.ajax({
		url: "https://students.ics.uci.edu/~jkawa/myProxy.php?http://developer.mbta.com/lib/RTCR/RailLine_3.xml",
		dataType: "xml",
		success: jsonLoad1
	});

	$.ajax({
		url: "https://students.ics.uci.edu/~jkawa/myProxy.php?http://api.openweathermap.org/data/2.5/station/find?lat=33.6694&lon=-117.8231&cnt=5",
		dataType: "json",
		success: jsonLoad2
	});
	
	$.ajax({
		url: "https://students.ics.uci.edu/~jkawa/myProxy.php?http://www3.septa.org/hackathon/Alerts/",
		dataType: "json",
		success: jsonLoad3
	});

	$.ajax({
		url: "https://students.ics.uci.edu/~jkawa/myProxy.php?http://api.citybik.es/decobike-san-diego.json",
		dataType: "json",
		success: jsonLoad4
	});

	$.ajax({
		url: "https://students.ics.uci.edu/~jkawa/myProxy.php?http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_day.geojsonp",
		dataType: "jsonp",
		success: jsonLoad5
	});
}

$(document).ready(
	function(){
		retrieveData();
	}
);
