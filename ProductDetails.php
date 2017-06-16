<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/ProductDetails.css" rel="stylesheet">
<link rel="stylesheet" href="css/products.css">
<link rel="stylesheet" href="extra/animate.css">
<link href="extra/bootstrap.css" rel="stylesheet">
<link href="extra/bootstrap.min.css" rel="stylesheet">
<script src="extra/bootstrap.js"></script>
<script src="extra/jquery-3.2.0.min.js"></script>
<script src="extra/bootstrap.min.js"></script>
<?php include 'Design.php'; ?>
</head>

<body>
<?php
	include 'header.php';
	// Containerul cu detalii
	$id=$_GET["id"];
	include 'DBconnect.php';
	$sql = "SELECT * From Produse Where ID='$id'";
	$result = $GLOBALS['conn']->query($sql);
	$self=$_SERVER['PHP_SELF'];
	if (!$result) 
	{
		trigger_error('Invalid query: ' . $conn->error);
	}
	$row = $row2 = $username = "";
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$username=$row["Username Vanzator"];
		$sql2="SELECT * From Conturi Where username='$username'";
		$result2 = $GLOBALS['conn']->query($sql2);
		if($result2->num_rows > 0)
			$row2 = $result2->fetch_assoc();
	}
	function afisarePagina()
	{
		$id=$GLOBALS['id'];
		$sql = "SELECT * From Produse Where ID='$id'";
		$result = $GLOBALS['conn']->query($sql);
		$row= $result->fetch_assoc();
		$self=$GLOBALS['self'];
		$row2=$GLOBALS['row2'];
		include 'afisareProdus.php';
	}
	
	//Verificare apasare butoane
	if(isset($_POST['butSave'] ))
	{
		$denumire = test_input($_POST["denumire"]);
		$descriere = test_input($_POST["descriere"]);
		$pret = test_input($_POST["pret"]);
		$negociabil = test_input($_POST["negociabil"]);
		$stare = test_input($_POST["stare"]);
		$id=$GLOBALS['id'];
		$sql3 = "UPDATE Produse SET  Denumire=\"$denumire\", Descriere=\"$descriere\", Pret=\"$pret\", Negociabil=\"$negociabil\", Stare=\"$stare\" WHERE ID='$id'";
		if ($GLOBALS['conn']->query($sql3) === TRUE) 
		{
		   afisarePagina();
		   echo "<script>alert(\"Modificarile au fost inregistrate!\") </script>";
		} 
		else 
		{
			afisarePagina();
			echo "<script>alert(\"Error updating record: " . $conn->error."\") </script>";
		}
	}
	else
		if(isset($_POST['butModifica'] ))
		{
			include 'modificareProdus.php';
		}
		else
			if(isset($_POST['addFav'] ))
			{
				afisarePagina();
				if($_COOKIE['logged']==true)
					$username = $_COOKIE["username"];
				else
					$username ="guest";
				$sql = "INSERT INTO Favorite (User, ID_Produs)
				VALUES ('$username', '$id')";
				if ($GLOBALS['conn']->query($sql) === TRUE) 
				{
				   afisarePagina();
				   echo "<script>alert(\"Modificarile au fost inregistrate!\") </script>";
				} 
				else 
				{
					afisarePagina();
					echo "<script>alert(\"Error updating record: " . $conn->error."\") </script>";
				}
			}
			else
			if(isset($_POST['addCos'] ))
			{
				afisarePagina();
				if($_COOKIE['logged']==true)
					$username = $_COOKIE["username"];
				else
					$username ="guest";
				$sql = "INSERT INTO Cos (User, ID_Produs)
				VALUES ('$username', '$id')";
				if ($GLOBALS['conn']->query($sql) === TRUE) 
				{
				   afisarePagina();
				   echo "<script>alert(\"Modificarile au fost inregistrate!\") </script>";
				} 
				else 
				{
					afisarePagina();
					echo "<script>alert(\"Error updating record: " . $conn->error."\") </script>";
				}
			}
			else
			{
				afisarePagina();
			}
?>

	<!-- Footer-ul -->
	<?php include 'footer.php' ?>
	
	<script>
		function afiseazaDetaliiVanzator(){
			$(".detailsSeller").show();
		}
	</script>
</body>
</html>
