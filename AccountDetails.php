<?php 
	$username = $nume = $prenume = $email = $parola = $telefon = $adresa = $judet = $localitate = $raspuns = $timp = "";
	include 'DBconnect.php';
	$username = $_COOKIE["username"];
	$sql = "SELECT * From Conturi Where username='$username'";
	$result = $GLOBALS['conn']->query($sql);
	$target_dir = "database/Anunturi/uploads/";
	if (!$result) 
	{
		trigger_error('Invalid query: ' . $conn->error);
	}
	if($result->num_rows > 0)
	{
		$row=$result->fetch_assoc();
		$GLOBALS['username']=$row["username"];
		$GLOBALS['nume']=$row["nume"];
		$GLOBALS['prenume']=$row["prenume"];
		$GLOBALS['email']=$row["email"];
		$GLOBALS['parola']=$row["parola"];
		$GLOBALS['telefon']=$row["telefon"];
		$GLOBALS['adresa']=$row["adresa"];
		$GLOBALS['judet']=$row["judet"];
		$GLOBALS['localitate']=$row["localitate"];
		$GLOBALS['raspuns']=$row["raspuns"];
		$GLOBALS['timp']=$row["timpDelogare"];
		$GLOBALS['bani']=$row["Bani"];
	};
	$username = $_COOKIE["username"];
	$sql = "SELECT ID From Produse Where `Username Vanzator`='$username'";
	$result = $GLOBALS['conn']->query($sql);
	if (!$result) 
	{
		trigger_error('Invalid query: ' . $conn->error);
	}
	$nr = $result->num_rows;
	function uploadPhoto($locName)
	{
		$target_file = $GLOBALS['target_dir'] . basename($_FILES[$locName]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") 
		{
   			die();
		} 
		if ($_FILES[$locName]["size"] > 5000000)
		{
			die();
		}
		move_uploaded_file($_FILES[$locName]["tmp_name"], $target_file);
		return $target_file;
	}
	if (isset($_POST['submit'] ))
	{
	 	
		$username=$_COOKIE["username"];
		$nume = test_input($_POST["nume"]);
		$prenume = test_input($_POST["prenume"]);
		$email = test_input($_POST["email"]);
		$parola = test_input($_POST["pass"]);
		$telefon = test_input($_POST["telefon"]);
		$adresa = test_input($_POST["adresa"]);
		$judet = test_input($_POST["judet"]);
		$loc = test_input($_POST["localitate"]);
		$seca = test_input($_POST["seca"]);
		$timp = test_input($_POST["timp"]);

		$sql = "UPDATE Conturi SET nume='$nume', prenume='$prenume', email='$email', parola='$parola', telefon='$telefon', adresa='$adresa', judet='$judet', localitate='$loc', raspuns='$seca', timpDelogare='$timp' WHERE username='$username'";

		if ($conn->query($sql) === TRUE) {
		   echo "<script>alert(\"Modificarile au fost inregistrate!\") </script>";
		} else {
		   echo "Error updating record: " . $conn->error;
		}
		$conn->close();
	}else
	if (isset($_POST['modal_add'])) 
	{
			//$categorie="Imobiliare";
			//mkdir('/database/Anunturi/Imobiliare/10asd', 0777, true);
			$denumire = test_input($_POST["denumire"]);
			$descriere = test_input($_POST["descriere"]);
			$pret = test_input($_POST["pret"]);
			$categorie=test_input($_POST["sel1"]);
			$stare = $negociabil = "";
			if(isset($_POST['radio1']))
				$stare=$_POST['radio1'];
			if(isset($_POST['radio2']))
				$negociabil=$_POST['radio2'];
			$target_file1 = uploadPhoto("addPhoto1");
			$target_file2 = uploadPhoto("addPhoto2");
			$target_file3 = uploadPhoto("addPhoto3");
			$target_file4 = uploadPhoto("addPhoto4");
			$username=$_SESSION["username"];
			$sql = "INSERT INTO Produse (Denumire, Pret, Img1, Img2, Img3, Img4, `ID Categorie`, Vizualizari, Descriere, Negociabil, Stare, `Username Vanzator`)
		VALUES ($denumire', '$pret', '$target_file1', '$target_file2', '$target_file3', '$target_file4', '$categorie', '0' , '$descriere', '$negociabil', '$stare', '$username')";
		if ($GLOBALS['conn']->query($sql) === TRUE) 
		{
			echo "<script>alert(\"Anuntul a fost inregistrat si postat!\") </script>";
		}else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'Design.php'; ?>
<link href="extra/bootstrap.css" rel="stylesheet">
<link href="extra/bootstrap.min.css" rel="stylesheet">
<link href="css/modal.css" rel="stylesheet">
<script src="extra/bootstrap.js"></script>
<script src="extra/jquery-3.2.0.min.js"></script>
<script src="extra/bootstrap.min.js"></script>
</head>

<body>
	<!--  HEADER-ul -->
	<?php include 'header.php'; ?>
	
	<div id="anunturiContainer">
	<!-- Account Details -->
	<div class="row">
		<div class="col-md-4 col-md-offset-3" style="margin-top: 50px">
		  <form class="form-horizontal" role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<fieldset>
			  <legend>Detalii Cont</legend>
			  
			  <div class="form-group">
				<label class="col-sm-2 control-label" for="textinput">Username:</label>
				<div class="col-sm-10">
				  <input name="username" value="<?php echo  $GLOBALS['username'] ?>" type="text" class="form-control" disabled>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-2 control-label" for="textinput">Nume:</label>
				<div class="col-sm-10">
				  <input name="nume" type="text" class="form-control" value="<?php echo  $GLOBALS['nume'] ?>">
				</div>
			  </div>

			  <div class="form-group">
				<label class="col-sm-2 control-label" for="textinput">Prenume:</label>
				<div class="col-sm-10">
				  <input name="prenume" type="text" class="form-control" value="<?php echo  $GLOBALS['prenume'] ?>">
				</div>
			  </div>

			  <div class="form-group">
				<label class="col-sm-2 control-label" for="textinput">E-mail:</label>
				<div class="col-sm-10">
				  <input name="email" type="email" class="form-control" value="<?php echo  $GLOBALS['email'] ?>">
				</div>
			  </div>

			  <div class="form-group">
				<label class="col-sm-2 control-label" for="textinput">Parola:</label>
				<div class="col-sm-8">
				  <input name="pass" type="text" class="form-control" value="<?php echo  $GLOBALS['parola'] ?>">
				</div>
			  </div>

			  <div class="form-group">
				<label class="col-sm-2 control-label" for="textinput">Telefon:</label>
				<div class="col-sm-10">
				  <input name="telefon" type="tel" class="form-control" value="<?php echo  $GLOBALS['telefon'] ?>">
				</div>
			  </div>

			  <div class="form-group">
				<label class="col-sm-2 control-label" for="textinput">Adresa:</label>
				<div class="col-sm-4">
				  <input name="adresa" type="text" class="form-control" value="<?php echo  $GLOBALS['adresa'] ?>">
				</div>
			  </div>

			  <div class="form-group">
				<label class="col-sm-2 control-label" for="textinput">Judet:</label>
				<div class="col-sm-10">
				  <input name="judet" type="text" class="form-control" value="<?php echo  $GLOBALS['judet'] ?>">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-2 control-label" for="textinput">Localitate:</label>
				<div class="col-sm-10">
				  <input name="localitate" type="text" class="form-control" value="<?php echo  $GLOBALS['localitate'] ?>">
				</div>
			  </div>

			  <div class="form-group">
				<label class="col-sm-2 control-label" for="textinput">Raspuns Intrebare Securitate:</label>
				<div class="col-sm-10">
				  <input name="seca" type="text" class="form-control" value="<?php echo  $GLOBALS['raspuns'] ?>">
				</div>
			  </div>

			  <div class="form-group">
				<label class="col-sm-2 control-label" for="textinput">Timp Exprirare Logare:</label>
				<div class="col-sm-10">
				  <input name="timp" type="text" class="form-control" value="<?php echo  $GLOBALS['timp'] ?>">
				</div>
			  </div>
			  <div class="form-group">
				<label class="col-sm-2 control-label" for="textinput">Bani in Cont:</label>
				<div class="col-sm-10">
				  <input name="bani" type="text" class="form-control" value="<?php echo  $GLOBALS['bani'] ?> Lei" disabled>
				</div>
			  </div>
			  
			  
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <div class="pull-right">
					<button type="submit" name="submit" class="btn btn-success">Salveaza Modificarile</button>
				  </div>
				</div>
			  </div>

			</fieldset>
		  </form>
		</div>
	</div>

	<!-- Detalii Anunturi-->
	<legend style="text-align: center; margin-top: 50px;">Adaugare Anunturi</legend>
	<div id="addAnunt">
		<div class="col-md-4 col-md-offset-4">
			  <div class="form-group">
				<label class="col-sm-6 control-label" for="textinput" style="color: black">Anunturi adaugate:</label>
				<div class="col-sm-2">
				  <input type="text" value="<?php echo $GLOBALS['nr'] ?>" class="form-control" disabled>
				</div>
				<div><button data-toggle="modal" data-target="#anuntModal" class="btn btn-primary center-block">Adauga Anunt</button></div>
			  </div>
		</div>
	</div>
	
	
	<!-- modalul -->
	<div class="modal fade" id="anuntModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<h3 class="modal-title" id="lineModalLabel">Adaugare Anunt</h3>
			</div>
			<div class="modal-body">

				<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
				  <div class="form-group">
					<label for="addDenumire">Denumire Produs</label>
					<input type="text" class="form-control" id="addDenumire" name="denumire" placeholder="Iphone/Laptop..." required>
				  </div>
				  <div class="form-group">
					<label for="addDescriere">Descriere</label>
					<textarea type="text" rows="3" class="form-control" id="addDescriere" name="descriere" placeholder="Ram ... Procesor ..." required></textarea>
				  </div>
				  <div class="form-group">
					<label for="addPret1">Pret</label>
					<input type="number" class="form-control" id="addPret" name="pret" placeholder="1000 lei..." required>
				  </div>
				  <div class="form-group">
				  	<label for="sel1">Categorie</label>
					  <select class="form-control" id="sel1" name="sel1" required>
						<option disabled selected value> -- Selectati Categoria -- </option>
						<option value="1">Electronice si electrocasnice</option>
						<option value="2">Imobiliare</option>
						<option value="3">Animale de companie</option>
						<option value="4">Imbracaminte</option>
						<option value="5">Casa si Gradina</option>
					  </select>
				  </div>
				  <div class="form-group">
					<label for="addPhoto">Adaugati fotografii...( obligatoriu 4)</label>
					<input type="file" id="addPhoto1" name="addPhoto1" required>
					<input type="file" id="addPhoto2" name="addPhoto2" >
					<input type="file" id="addPhoto3" name="addPhoto3" >
					<input type="file" id="addPhoto4" name="addPhoto4" >
				  </div>
				  <div class="checkbox">
					<label>
					  <p class="help-block">Stare:</p>
					  <input type="radio" name="radio1" value="NOU"> Nou <br>
					  <input type="radio" name="radio1" value="FOLOSIT"> Folosit
					</label>
				  </div>
				   <div class="checkbox">
					<label>
					  <p class="help-block">Negociabil:</p>
					  <input type="radio" name="radio2" value="DA"> DA <br>
					  <input type="radio" name="radio2" value="NU"> NU
					</label>
				  </div>
				  <button type="submit" name="modal_add" value="modal" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	  </div>
	</div>
	</div>
	
	<!-- Footer-ul -->
	<?php include 'footer.php' ?>
</body>
</html>
