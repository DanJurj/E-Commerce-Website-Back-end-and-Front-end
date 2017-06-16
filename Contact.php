<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'Design.php'; ?>
</head>

<body>
	<!--  HEADER-ul -->
	<?php include 'header.php' ?>
	
    <div id="map">
    </div>
    <script>
      function initMap() {
        var uluru = {lat: 44.4176873, lng: 26.0845195};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJnQxkVKpHVCMoLOHhpXpVjPQYcxs-lc4&callback=initMap">
    </script>
    
    <aside id="contact">
    	<h3>Detalii de Contact:</h3>
    	<p>Tel.: 0754-985-147</p>
		<p>Adresa: Bulevardul G. Cosbuc nr.39, Sector 5, Bucuresti</p>
		<p>E-mail: dan.jurj19@gmail.com</p>
		<p>Fax: 255-255-255</p>
    </aside>

	<!-- Footer-ul -->
	<?php include 'footer.php' ?>

</body>
</html>
