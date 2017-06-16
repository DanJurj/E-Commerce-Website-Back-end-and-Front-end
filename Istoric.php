<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Intelligent Shopping</title>
<link href="extra/bootstrap.css" rel="stylesheet">
<link href="extra/bootstrap.min.css" rel="stylesheet">
<script src="extra/bootstrap.js"></script>
<script src="extra/jquery-3.2.0.min.js"></script>
<script src="extra/bootstrap.min.js"></script>
<?php include 'Design.php'; ?>
</head>

<body>
<?php include 'header.php'; ?>
<div id="form" style="text-align: center; color: black; background-color: green;">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<span>Ordoneaza dupa</span>
	<select name="criteriu1">
		<option disabled selected>Select</option>
		<option>Suma platita</option>
		<option>Data tranzactiei</option>
	</select>
	<select name="criteriu2">
		<option disabled selected>Select</option>
		<option>Crescator</option>
		<option>Descrescator</option>
	</select>
	<button name="butOrd" type="submit">GO</button><br>
</form>
</div>

	<div class="container" style="background-color: white;">
	<div class="row">
		<div class="span5">
            <table class="table table-striped table-condensed" id="tabel">
                  <thead>
                  <tr>
            		  <th scope="col">ID Tranzactie</th>
            		<?php
            		if ($_COOKIE["tip"]=="admin")
					echo "<th scope=\"col\">User</th>";
				    ?>
				      <th scope="col">Suma Platita</th>
				      <th scope="col">Denumire Produs</th>
				      <th scope="col">Data</th>
				   </tr>
				   </thead> 
			</table>
		</div>
	</div>
	</div>

<?php
	if ($_COOKIE["tip"]=="admin") {
	include 'DBconnect.php';
	$usr=$_COOKIE["username"];
	$sql = "SELECT * From Plati";
	if(isset($_POST['butOrd'] ))
		{
			$criteriu1=$_POST['criteriu1'];
			$criteriu2=$_POST['criteriu2'];
			switch ($criteriu1) {
				case 'Suma platita':
					switch ($criteriu2) {
						case 'Crescator':
							$sql=$sql . " Order by Suma_Platita ASC";
							break;
						case 'Descrescator':
							$sql=$sql . " Order by Suma_Platita DESC";
							break;
						default:
							break;
					}
					break;
				case 'Data tranzactiei':
					switch ($criteriu2) {
						case 'Crescatorre':
							$sql=$sql . " Order by Data ASC";
							break;
						case 'Descrescator':
							$sql=$sql . " Order by Data ASC";
							break;
						default:
							break;
					}
					break;
				default:
					break;
			}
			

		}
	$result = $GLOBALS['conn']->query($sql);
	if (!$result) 
		trigger_error('Invalid query: ' . $conn->error);
	else
		if($result->num_rows > 0)
			while($row = $result->fetch_assoc())
			{
				$id_tranzactie=$row["ID_Plata"];
				$user=$row["User"];
				$suma=$row["Suma_Platita"];
				$data=$row["Data"];
				$denumire=$row["Denumire"];
				echo "<script> $('#tabel').append(
					'<tr>' + 
					'<td>' + ".$id_tranzactie." + '</td>' + 
					'<td>' + \"".$user."\" + '</td>' + 
					'<td>' + \"".$suma."\" + '</td>' + 
					'<td>' + \"".$denumire."\" + '</td>' + 
					'<td>' + \"".$data."\" + '</td>' + 
					'</tr>') </script>";
			}
	}
	else
	{
		include 'DBconnect.php';
		$usr=$_COOKIE["username"];
		$sql = "SELECT * From Plati Where User='$usr'";
		$result = $GLOBALS['conn']->query($sql);
		if (!$result) 
			trigger_error('Invalid query: ' . $conn->error);
		else
			if($result->num_rows > 0)
				while($row = $result->fetch_assoc())
				{
					$id_tranzactie=$row["ID_Plata"];
					$suma=$row["Suma_Platita"];
					$data=$row["Data"];
					$denumire=$row["Denumire"];
					echo "<script> $('#tabel').append(
					'<tr>' + 
					'<td>' + ".$id_tranzactie." + '</td>' + 
					'<td>' + \"".$suma."\" + '</td>' + 
					'<td>' + \"".$denumire."\" + '</td>' +
					'<td>' + \"".$data."\" + '</td>' + 
					'</tr>') </script>";
				}
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
