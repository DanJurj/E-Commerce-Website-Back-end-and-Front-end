<!doctype html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/products.css">
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/searchBar.css">
<?php include 'Design.php'; ?>
</head>

<body>
	<!--  HEADER-ul -->
	<?php include 'header.php' ?>
	<div id="filtru" style="text-align: center;">
	<h3>Filtreaza Rezultatele</h3>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="search">
  			<input name="den" type="text" size="50" placeholder="Cauta..." />
  			<button name="cautaBut" id="cautaBut"></button><br>
  			<span>Pret de la:</span>
  			<input type="text" size="20" name="pret1" />
  			<span>pana la:</span>
  			<input type="text" size="20" name="pret2"/>
  			<button id="cautaBut" name="butPret"></button><br>
  			<button name="PretC" class="button">Pret Crescator</button>
  			<button name="PretD" class="button">Pret Descrescator</button><br>
  			<button name="DispoC" class="button">Disponibilitate Crescator</button>
  			<button name="DispoD" class="button">Diponibilitate descrescator</button><br>
	</form>
	</div>
	
	<!-- Afisare Produse -->
	<div class="flex-container">
		<?php
		include 'DBconnect.php';
		$sql = "SELECT * From Produse";
		if(isset($_POST['PretC'] ))
		{
			$sql=$sql . " Order By Pret";
		}
		if(isset($_POST['PretD'] ))
		{
			$sql=$sql . " Order By Pret DESC";
		}
		if(isset($_POST['DispoC'] ))
		{
			$sql=$sql . " Order By Stoc";
		}
		if(isset($_POST['DispoD'] ))
		{
			$sql=$sql . " Order By Stoc DESC";
		}
		if(isset($_POST['cautaBut'] ))
		{
			$den=$_POST['den'];
			$sql=$sql . " Where locate('$den',Denumire) ";
		}
		if(isset($_POST['butPret'] ))
		{
			$pret1=$_POST['pret1'];
			$pret2=$_POST['pret2'];
			$sql=$sql . " Where Pret>='$pret1' and Pret<='$pret2'";
		}


		$result = $GLOBALS['conn']->query($sql);
		if (!$result) 
		{
			trigger_error('Invalid query: ' . $conn->error);
		}
		if($result->num_rows > 0)
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
		?>		
	</div>
	
	<br><br>
	<!-- Footer-ul -->
	<?php include 'footer.php' ?>
	
</body>
</html>
