<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      #map {
      height: 50%;
		  width: 50%;
      }

      html, body {
        height: 100%;
      }

      .header {
      padding: 0px;
      font-size: 40px;
      text-align: center;
      background: white;
      }

      .topnav {
      overflow: hidden;
      background-color: #333;
      }

      .topnav a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      }

      .topnav a:hover {
      background-color: #ddd;
      color: black;
      }
    </style>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  </head>
  <body>

      <div class="header">
        <h2>Roado</h2>
      </div>

      <div class="topnav">
            <a href="#">Look Up Nearest service centers</a>
            <a href="index.php">Our service centers</a>
              <a href="add.html">Add new store data</a>
            <a href="#" style="float:right">Contact Us</a>
      </div>
      <br/>
    <div id="map"></div>
    <script>
      var map, infoWindow,pos={lat:12.972442, lng: 77.580643};
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 12.972442, lng: 77.580643},
          zoom: 8
        });
        infoWindow = new google.maps.InfoWindow;
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            pos.lat=position.coords.latitude;
            pos.lng=position.coords.longitude;

            console.log(pos);

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
			sendData();
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
		//console.log(pos.lat);
      function sendData(){
		  var latitude=pos.lat;
		  var longitude=pos.lng;
		$.post('showClosest.php',{postlat:latitude,postlong:longitude},function(data){
			$('#result').html(data);
		});

      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzkXFvRhfIpvRthS8J7EKCvRbMTPFNn40&callback=initMap">
    </script>
	<div id="result"></div>
  </body>
</html>
