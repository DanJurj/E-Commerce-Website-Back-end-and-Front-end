<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/ProductDetails.css" rel="stylesheet">
<link href="css/modal.css" rel="stylesheet">
<link href="css/buttons.css" rel="stylesheet">
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
?>
<div id="form" style="text-align: center;">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input name="den" type="text"/>
	<select name="criteriu">
		<option disabled selected>Cauta dupa</option>
		<option>Username</option>
		<option>Nume</option>
		<option>Prenume</option>
		<option>Adresa</option>
		<option>E-mail</option>
		<option>Telefon</option>
	</select>
	<button name="butCauta" type="submit" class="button">Cauta</button><br>
	<button name="butLog" type="submit" class="button">Vezi Utilizatorii Logati</button>
	<button name="butDelog" type="submit" class="button" >Vezi Utilizatorii Delogati</button><br>
	<button name="butAct" type="submit" class="button" >Vezi Conturile Active</button>
	<button name="butDeact" type="submit" class="button" >Vezi Conturile Blocate</button>
</form>
</div>
	<div class="container" style="background-color: white;">
	<div class="row">
		<div class="span5">
            <table class="table table-striped table-condensed" id="tabel">
                  <thead>
                  <tr>
                      <th scope="col">Username</th>
				      <th scope="col">Nume</th>
				      <th scope="col">Prenume</th>
				      <th scope="col">Adresa</th>
				      <th scope="col">Judet</th>
				      <th scope="col">Localitate</th>
				      <th scope="col">E-mail</th>
				      <th scope="col">Telefon</th>
				      <th scope="col">Status Cont</th>
				      <th scope="col">Status Utilizator</th>                                 
                  </tr>
              	</thead> 
			</table>
	</div>
	</div>
	</div>
	
<?php
	include 'DBconnect.php';
	$sql = "SELECT * From Conturi";
	if(isset($_POST['butCauta'] ))
		{
			$val=$_POST['den'];
			$criteriu=$_POST['criteriu'];
			switch ($criteriu) {
				case 'Username':
					$sql=$sql . " Where locate('$val',username)";
					break;
				case 'Nume':
					$sql=$sql . " Where locate('$val',nume)";
					break;
				case 'Prenume':
					$sql=$sql . " Where locate('$val',prenume)";
					break;
				case 'Adresa':
					$sql=$sql . " Where locate('$val',adresa)";
					break;
				case 'E-mail':
					$sql=$sql . " Where locate('$val',email)";
					break;
				case 'Telefon':
					$sql=$sql . " Where telefon='$val'";
					break;
				default:
					echo "alert(\"Nu ati selectat criteriul!\")";
					break;
			}
		}
	if(isset($_POST['butLog'] ))
		{
			$sql=$sql . " Where StatusU='logat'";
		}
	if(isset($_POST['butDelog'] ))
		{
			$sql=$sql . " Where StatusU='delogat'";
		}
	if(isset($_POST['butAct'] ))
		{
			$sql=$sql . " Where StatusC='activ'";
		}
	if(isset($_POST['butDeact'] ))
		{
			$sql=$sql . " Where StatusC='blocat'";
		}



	$result = $GLOBALS['conn']->query($sql);
	if (!$result) 
		trigger_error('Invalid query: ' . $conn->error);
	else
		if($result->num_rows > 0)
			while($row = $result->fetch_assoc())
			{
				$username=$row["username"];
				$nume=$row["nume"];
				$prenume=$row["prenume"];
				$adresa=$row["adresa"];
				$judet=$row["judet"];
				$localitate=$row["localitate"];
				$email=$row["email"];
				$telefon=$row["telefon"];
				$statusC=$row["statusC"];
				$statusU=$row["statusU"];
				echo "<script> $('#tabel').append(
					'<tr>' + 
					'<td>' + \"".$username."\" + '</td>' + 
					'<td>' + \"".$nume."\" + '</td>' + 
					'<td>' + \"".$prenume."\" + '</td>' + 
					'<td>' + \"".$adresa."\" + '</td>' + 
					'<td>' + \"".$localitate."\" + '</td>' + 
					'<td>' + \"".$judet."\" + '</td>' + 
					'<td>' + \"".$email."\" + '</td>' + 
					'<td>' + \"".$telefon."\" + '</td>' + 
					'<td>' + \"".$statusC."\" + '</td>' + 
					'<td>' + \"".$statusU."\" + '</td>' + 
					'</tr>') </script>";
			}
?>

	<!-- Footer-ul -->
	<?php include 'footer.php' ?>
</body>
</html>
