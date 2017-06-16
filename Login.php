<?php
	include 'DBconnect.php';
	function test()
	{
		$user=$_POST["username"];
		$pass=$_POST["pass"];
		$sql = "SELECT * From Conturi Where username='$user' and parola='$pass'";
		$result = $GLOBALS['conn']->query($sql);
		if (!$result) {
		    trigger_error('Invalid query: ' . $conn->error);
		}
		if($result->num_rows > 0)
		{
			$row=$result->fetch_assoc();
			setcookie('timp',$row['timpDelogare']);
			setcookie('username',$row['username']);
			setcookie('logged',true,time()+$row['timpDelogare']);
			if($row['ID_tipCont']==1)
				setcookie('tip',"user");
			else
				setcookie('tip',"admin");
			header('Location: Homepage.php');
		}
		else
		{
			header('Location: Login.php');
			echo "<script> alert(\"Datele Introduse nu se regasesc in baza de date!Va rugam reincercati!\") </script>";
		}
	}
	if(isset($_POST['butLog'] ))
		{
			test();
		}
	$conn->close();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/RegisterForm.css">
<?php include 'Design.php'; ?>
</head>

<body>
	<!--  HEADER-ul -->
	<?php include 'header.php' ?>
	
	<!-- Tab-ul de Login -->
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
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="text" name="username" placeholder="  Username" class="Box" required><br>
			<input type="password" name="pass" placeholder="  Password" class="Box" required><br>
			<a href="PassRecover.php" style="float: right; margin-right: 5%;"><i><u>Ti-ai uitat parola?</u></i></a><br>
			<button type="submit" id="buton1" name="butLog"><h3>Intra in Cont</h3></button>
		</form>
		<p>Prin accesarea contului, esti de acord cu <br><i>Termenii si Conditiile</i> site-ului</p>
	</div>
	<br><br><br>
	
	<!-- Footer-ul -->
	<?php include 'footer.php' ?>
</body>
</html>
