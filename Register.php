<!doctype html>
<html>
	<script>
		function ValidareReg(){
			$('#telefonInco').css("display","none");
			$('#passNec').css("display","none");
			$('#passIneq').css("display","none");
			$('#numErr').css("display","none");
			var pass=$('#pass').val();
			var tel=$('#telefon').val();
			var repass=$('#repass').val();
			var nume=$('#nume').val();
			var prenume=$('#prenume').val();
			var corect=true;
			if(pass.search(/\d+/g)<0 || pass.search(/[a-z]/g)<0 || pass.search(/[A-Z]/g)<0)
				{
					$('#passNec').css({"display":"block","color":"red"});
					corect=false;
				}
			if(tel.length!=10 || tel.search(/[a-zA-Z]/g)>=0)
				{
					$('#telefonInco').css("display","block");
					$('#telefonInco').css("color","red");
					corect=false;
				}
			if(pass!=repass)
				{
					$('#passIneq').css({"display":"block","color":"red"});
					corect=false;
				}
			if( nume.search(/[0-9]/g)>=0 || prenume.search(/[0-9]/g)>=0 )
				{
					$('#numErr').css({"display":"block","color":"red"});
					corect=false;
				}
			return corect;
		}
	</script>
<?php
	include 'DBconnect.php';
	function test()
	{
		$user=test_input($_POST["username"]);
		$emaill=test_input($_POST["E-mail"]);
		$sql = "SELECT email From Conturi Where email='$emaill' or username='$user'";
		$result = $GLOBALS['conn']->query($sql);
		if (!$result) {
		    trigger_error('Invalid query: ' . $conn->error);
		}
		if($result->num_rows > 0)
		{
			header('Location: Register.php');
			die();
		}
		else
		{
			Create();
		}
	}

	function Create()
	{
		//preluarea datelor din html
		$username = test_input($_POST["username"]);
		$nume = test_input($_POST["nume"]);
		$prenume = test_input($_POST["prenume"]);
		$email = test_input($_POST["E-mail"]);
		$parola = test_input($_POST["pass"]);
		$telefon = test_input($_POST["telefon"]);
		$adresa = test_input($_POST["adresa"]);
		$judet = test_input($_POST["judet"]);
		$loc = test_input($_POST["loc"]);
		$seca = test_input($_POST["seca"]);
		//inserarea datelor
		$sql = "INSERT INTO Conturi (username, nume, prenume, email, parola, telefon, adresa, judet, localitate, raspuns, Bani)
		VALUES ('$username', '$nume', '$prenume', '$email', '$parola', '$telefon', '$adresa', '$judet', '$loc', '$seca', '100000')";
		if ($GLOBALS['conn']->query($sql) === TRUE) 
		{
			header('Location: Login.php');
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	if(isset($_POST['butReg'] ))
		{
			test();
		}
	$conn->close();
?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/RegisterForm.css">
<script src="extra/jquery-3.2.0.min.js"></script>
<?php include 'Design.php'; ?>
</head>

<body>
	<!--  HEADER-ul -->
	<?php include 'header.php' ?>	

	<br><br><br>
	<div id="TabLogin" align="center">
		<div id="RegHeader">
			<div class="Login">
				<a href="Login.php"><h3>Intra in Cont</h3></a>
			</div>
			<div class="Login">
				<a href="Register.php"><h3>Creeaza Cont</h3></a>
			</div>
		</div>

		<form id="formReg" method="POST" onsubmit="return ValidareReg()" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="itemReg">
				Username: <input type="text" name="username" placeholder="  must be unique " class="Box" required>
			</div>
			<div class="itemReg">
				Nume: <input type="text" id="nume" name="nume" placeholder="  Jurj" class="Box" required>
			</div>
			<div class="itemReg">
				Prenume: <input type="text" id="prenume" name="prenume" placeholder="  Danut" class="Box" required>
			</div>
			<div class="itemReg">
				E-mail: <input type="email" name="E-mail" placeholder="  E-mail" class="Box" required>
			</div>
			<div class="itemReg">
				Parola: <input type="password" name="pass" placeholder="  Password (mininm o litera si o cifra)" class="Box" id="pass" required>
			</div>
			<div class="itemReg">
				Reintroduceti Parola: <input type="password" id="repass" name="repass" placeholder="  Password (mininm o litera si o cifra)" class="Box" required>
			</div>
			<div class="itemReg">
				Telefon: <input type="tel" id="telefon" name="telefon" placeholder="  07xxxxxxxx" class="Box" required>
			</div>
			<div class="itemReg">
				Adresa:  <input type="text" name="adresa" placeholder="  (Strada) (nr)" class="Box" >
			</div>
			<div class="itemReg">
				Judet:   <input type="text" name="judet" placeholder="  Bucuresti" class="Box" >
			</div>
			<div class="itemReg">
				Localitate: <input type="text" name="loc" placeholder="  Sector 5" class="Box" >
			</div>
			<div class="itemReg">
			<select name="secq" id="secq" required>
				<option disabled selected value> -- Selectati o intrebare de securitate -- </option>
				<option>Care este numele primului tau animal de companie?</option>
				<option>Care a fost primul tau serial vizionat?</option>
				<option>Care este filmul tau preferat?</option>
			</select><br>
			</div>
			<div class="itemReg">
				<input type="text" name="seca" placeholder=" *Raspunsul" class="Box" ><br>
			</div>
			<input type="checkbox" name="agreement" required> * Sunt de acord cu Termeni de utilizare site-ului IS.ro<br>
			<p id="passNec" class="eroare">Parola trebuie sa contina o litera mare, una mica si o cifra!</p>
			<p id="telefonInco" class="eroare">Numarul de telefon nu este corect!</p>
			<p id="numErr" class="eroare">Numele si Prenumele poate contine doar litere!</p>
			<p id="passIneq" class="eroare">Cele 2 parole trebuie sa fie identice!</p>
			<button type="submit" id="buton1" name="butReg"><h3>Inregistreaza-te</h3></button>
		</form>
	</div>
	<br><br><br>

	
	
	<script type="text/javascript">
	function openwindow (url) {
	   var win = window.open(url, "window1", "width=600,height=400,status=yes,scrollbars=yes,resizable=yes");
	   win.focus();
	}
	</script>

	
	<!-- Footer-ul -->
	<?php include 'footer.php' ?>

</body>
</html>
