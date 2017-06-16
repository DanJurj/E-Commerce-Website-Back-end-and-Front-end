<!doctype html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/products.css">
<?php include 'Design.php'; ?>
</head>

<body>
	<!--  HEADER-ul -->
	<?php include 'header.php' ?>
	
	<?php
		$categorie=$_GET["cat"];
		include 'DBconnect.php';
		$sql = "SELECT * From Categorii Where ID='$categorie'";
		$result = $GLOBALS['conn']->query($sql);
		if (!$result) 
		{
			trigger_error('Invalid query: ' . $conn->error);
		}
		$row = $result->fetch_assoc();
		echo "<h1 style=\"color: blue\">".$row["Denumire"]."</h1>";
		$sql = "SELECT * From Produse Where `ID Categorie`='$categorie'";
		$result = $GLOBALS['conn']->query($sql);
		if (!$result) 
		{
			trigger_error('Invalid query: ' . $conn->error);
		}
		if($result->num_rows > 0)
		{
			echo "<div class=\"flex-container\">";
			while($row = $result->fetch_assoc()) 
			{
				echo "
				<a href=\"ProductDetails.php?id=".$row["ID"]."\">
				<div class=\"produs\">
					<img class=\"prinImg\" src=\"".$row["Img1"]."\">
					<div class=\"sec\">
						<img class=\"secImg\" src=\"".$row["Img2"]."\"/>
						<img class=\"secImg\" src=\"".$row["Img3"]."\"/>
						<img class=\"secImg\" src=\"".$row["Img4"]."\"/>
					</div>
					<div class=\"textul\">
						<h3>".$row["Denumire"]."</h3>
						<h3>".$row["Pret"]." LEI</h3>
					</div>	
				</div>
				</a>
				";
			}
			echo "</div>";
		}
	?>	
	
	<br><br>
	<!-- Footer-ul -->
	<?php include 'footer.php' ?>
	
</body>
</html>

