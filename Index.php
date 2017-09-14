<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Intelligent Shopping</title>
<link rel="stylesheet" href="css/sliders.css">
<?php include 'Design.php'; ?>
</head>

<body>
	<!--  HEADER-ul -->
	<?php include 'header.php' ?>
	
	<!-- Slide-show cu ultimele anunturi -->
	<div id="Anunturi">
		<h2>Ultimele Anunturi:</h2>
		<div class="slideshow-container">
		<?php
		include 'DBconnect.php';
		$sql = "SELECT * From produse ORDER by ID DESC Limit 5";
		$result = $GLOBALS['conn']->query($sql);
		while($row=$result->fetch_assoc()):
		?>
		  <div class="mySlides fade">
			<a href="ProductDetails.php?id=<?php echo $row['ID']; ?>"><img src="<?php echo $row['Img1']; ?>"></a>
		  </div>
		<?php endwhile?>
		</div>
		<div style="text-align:center">
		  <span class="dot" onclick="currentSlide(1)"></span> 
		  <span class="dot" onclick="currentSlide(2)"></span> 
		  <span class="dot" onclick="currentSlide(3)"></span> 
		  <span class="dot" onclick="currentSlide(4)"></span> 
		  <span class="dot" onclick="currentSlide(5)"></span> 
		</div>
		<br>
	</div>

	<!-- Footer-ul -->
	<?php include 'footer.php' ?>
	
	<!-- Activare Slider -->
	<script>
		var slideIndex = 1;
		showSlides(slideIndex);
		autoChangeSlides();
	</script>
</body>
</html>
