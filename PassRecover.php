<?php
	include 'DBconnect.php';
	function test()
	{
		$user=test_input($_POST["username"]);
		$seca = test_input($_POST["seca"]);
		$sql = "SELECT email From Conturi Where username='$user' and raspuns='$seca'";
		$result = $GLOBALS['conn']->query($sql);
		if (!$result) {
		    trigger_error('Invalid query: ' . $conn->error);
		}
		if($result->num_rows == 1)
		{
			$newpass=generatePassword(8);
			echo $newpass;
			$row=$result->fetch_assoc();
			$destEmail=$row["email"];
			echo $destEmail;
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <dan.jurj22@gmail.com>' . "\r\n";
			mail($destEmail,"PasswordRecover",$newpass,$headers);
		}
		else
		{
			header('Location:PassRecover.php');
		}
	}
	function generatePassword($length = 8) 
	{
	    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	    $count = mb_strlen($chars);

	    for ($i = 0, $result = ''; $i < $length; $i++) 
	    {
	        $index = rand(0, $count - 1);
	        $result .= mb_substr($chars, $index, 1);
	    }

	    return $result;
	}
	if(isset($_POST['but']))
		test();
	$conn->close();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/myStyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/Header and Footer.css">
<link rel="stylesheet" href="css/searchBar.css">
<link rel="stylesheet" href="css/general.css">
<link rel="stylesheet" href="css/RegisterForm.css">
<script src="js/cat.js"></script>
<link rel="stylesheet" href="css/megamenu.css"  media="all">
<link rel="stylesheet" href="css/style.css"  media="all">
<script src="js/megamenu.js"></script>
</head>

<body>
	<!--  HEADER-ul -->
	<?php include 'header.php' ?>
	
	<br><br><br>
	<div id="TabLogin" align="center">
		<div class="Login">
			<a href="Login.html"><h3>Intra in Cont</h3></a>
		</div>
		<div class="Login">
			<a href="Register.html"><h3>Creeaza Cont</h3></a>
		</div>
		<form method="POST" action="PassRecover.php">
			<input type="text" name="username" placeholder="  Username" class="Box" required><br>
			<select name="secq" id="secq" required>
				<option disabled selected value> -- Selectati o intrebare de securitate -- </option>
				<option>Care este numele primului tau animal de companie?</option>
				<option>Care a fost primul tau serial vizionat?</option>
				<option>Care este filmul tau preferat?</option>
			</select><br>
			<input type="text" name="seca" placeholder=" Raspunsul" class="Box" required><br>
			<!-- <button type="submit" id="buton1"><h3>Recupereaza</h3></button>  -->
			<button type="submit" id="buton1" name="but"><h3>Recupereaza</h3></button>
		</form>
	</div>
	<br><br><br>

	<!-- Footer-ul -->
	<?php include 'footer.php' ?>
</body>
</html>
