<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="extra/bootstrap.css" rel="stylesheet">
<?php include 'Design.php'; ?>
</head>

<body>
	<!--  HEADER-ul -->
	<?php include 'header.php' ?>
	
	<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Cos de cumparaturi</h5>
							</div>
							<div class="col-xs-6">
							<a href="Products.php">
								<button type="button" class="btn btn-primary btn-sm btn-block">
									<span class="glyphicon glyphicon-share-alt"></span> Continua cautarea
								</button>
							</a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">

				<?php
				include 'DBconnect.php';
				if(isset($_COOKIE['logged']))
					$username = $_COOKIE["username"];
				else
					$username = "guest";
				$gtotal=0;
				function afisare()
				{
					$usr=$GLOBALS['username'];
					$sql = "SELECT * From Cos Where User='$usr'";
					$result = $GLOBALS['conn']->query($sql);
					$total=0;
					if (!$result) 
						trigger_error('Invalid query: ' . $conn->error);
					if($result->num_rows > 0)
					while($row = $result->fetch_assoc()) {
						$id_produs=$row["ID_Produs"];
						$user=$row["User"];
						$sql="SELECT Denumire, Pret, Stare, Img1, `Username Vanzator` From Produse Where ID='$id_produs' ";
						$result2=$GLOBALS['conn']->query($sql);
						$row2=$result2->fetch_assoc();
						$sql="SELECT username, telefon From Conturi Where username='$user'";
						$result3=$GLOBALS['conn']->query($sql);
						$row3=$result3->fetch_assoc();
						$total+=$row2["Pret"];
				echo "
					<div class=\"row\">
						<a href=\"#\">
							<div class=\"col-xs-2\"><img class=\"img-responsive\" src=\"".$row2["Img1"]."\">
							</div>
						</a>
						<div class=\"col-xs-4\">
							<h4 class=\"product-name\"><strong>".$row2["Denumire"]."</strong></h4><h4><small>Stare: ".$row2["Stare"]."</small></h4>
						</div>
						<div class=\"col-xs-6\">
							<div class=\"col-xs-6 text-right\">
								<h6><strong>Vanzator: ".$row2["Username Vanzator"]." <span class=\"text-muted\"></span></strong></h6>
							</div>
							<div class=\"col-xs-6\">
								<h5><strong>".$row3["telefon"]."<span class=\"text-muted\"></span></strong></h5>
							</div>
							<div class=\"col-xs-6\">
								<h5><strong>".$row2["Pret"]." LEI<span class=\"text-muted\"></span></strong></h5>
							</div>
							<div class=\"col-xs-6\">
							<form method=\"POST\" action=\"".$_SERVER['PHP_SELF']."?id=".$id_produs."\">
								<button type=\"submit\" name=\"sterge1\" class=\"btn btn-link btn-xs\">
									<span class=\"glyphicon glyphicon-trash\"> </span>
								</button>
							</form>
							</div>
						</div>
					</div>
					<hr>
					";
				}
				echo "
					<div class=\"row\">
						<div class=\"text-right\">
							<div class=\"col-xs-3\">
								<span>Nr Produse: ".$result->num_rows."</span><br>
								";
								$usr=$_COOKIE["username"];
								$sql="SELECT SUM(Pret) as total From produse INNER JOIN cos ON produse.ID=cos.ID_Produs INNER JOIN conturi ON conturi.username='$usr'";
								$result4=$GLOBALS['conn']->query($sql);
								$row4=$result4->fetch_assoc();
								$GLOBALS['gtotal']=$total;
								echo"
								<span>Total de plata:".$total." LEI</span>
							</div>
						</div>
					</div>
					<div class=\"row\">
						<div class=\"text-center\">
						<form method=\"POST\" action=\"".$_SERVER['PHP_SELF']."\">
							<div class=\"checkbox\">
  								<label><input type=\"checkbox\" name=\"pastreaza\">Pastreaza Produsele in Cos dupa Cumparare</label>
							</div>
							<div class=\"col-xs-3\">
								<button type=\"submit\" name=\"goleste\" class=\"btn btn-danger btn-sm btn-block\">
									Goleste
								</button>
							</div>
							<div class=\"col-xs-3\">
								<button type=\"submit\" name=\"plateste\" class=\"btn btn-success btn-sm btn-block\">
									Plateste
								</button>
							</div>
						</form>
						</div>
					</div>
					";
				}

				if (isset($_POST['sterge1'] ))
				{
					$id_produs=$_GET['id'];
					$sql = "DELETE FROM Cos WHERE User='$username' and ID_Produs='$id_produs'";
					if ($GLOBALS['conn']->query($sql) === TRUE) 
					{
					   afisare();
					} 
					else 
					{
						afisare();
						echo "<script>alert(\"Error updating record: " . $conn->error."\") </script>";
					}
				}
				else
					if (isset($_POST['goleste'] ))
					{
						$sql = "DELETE FROM Cos WHERE User='$username'";
						if ($GLOBALS['conn']->query($sql) === TRUE) 
						{
					   		afisare();
						} 
						else 
						{
							afisare();
							echo "<script>alert(\"Error updating record: " . $conn->error."\") </script>";
						}
					}
					if (isset($_POST['plateste'] ))
					{
						$usr=$_COOKIE["username"];
						if($usr=="guest")
						{
							echo "<script> alert(\"Va rugam sa va inregistrati pentru a plati!\") </script>";
							die();
						}
						echo $usr;
						$sql = "Select SUM(Pret) From Produse 
						Inner Join Cos On Cos.ID_Produs=Produse.ID Where Cos.User='$usr'";
						$result=$GLOBALS['conn']->query($sql);
						$dePlatit=$result->fetch_assoc()['SUM(Pret)'];
						
						$sql= "Select Bani From Conturi WHERE username='$usr'";
						$result=$GLOBALS['conn']->query($sql);
						$baniInCont=$result->fetch_assoc()['Bani'];

						if($baniInCont<$dePlatit)
						{
							echo "<script> alert(\"Nu aveti suficienti bani in Cont!\") </script>";
						}
						else
						{
							//verificam daca este vreun produs care nu mai e pe stoc in cos
							$sql="Select * From Cos Inner Join Produse On Produse.ID=Cos.ID_Produs Where User='$usr'";
							if ($result=$GLOBALS['conn']->query($sql))
								while($row=$result->fetch_assoc())
									if($row['Stoc']==0)
									{
										echo "<script> alert(\"Un produs din cos nu mai este pe Stoc! Va rugam sa incercati din nou fara el!\") </script>";
										die();
									}
							$rest=$baniInCont-$dePlatit;
							$sql = "UPDATE Conturi SET Bani=\"$rest\" WHERE username='$usr'";
							if ($GLOBALS['conn']->query($sql) == FALSE) 
							{
								echo "<script>alert(\"Error updating record: " . $conn->error."\") </script>";
							}
							$sql="Select * From Cos Inner Join Produse On Produse.ID=Cos.ID_Produs Where User='$usr'";
							if ($result=$GLOBALS['conn']->query($sql))
								while($row=$result->fetch_assoc())
								{
									$denumire=$row['Denumire'];
									$pret=$row['Pret'];
									$sql =" Insert Into plati(User,Denumire,Suma_Platita,Data)
									 Values ('$usr', '$denumire', '$pret', NOW())";
									$GLOBALS['conn']->query($sql);
									$sql ="Update produse Set Stoc=Stoc-1 Where Denumire='$denumire'";
									$GLOBALS['conn']->query($sql);
								}
							//verificam daca mai pastram produsele in cos sau nu
							if(isset($_POST['pastreaza']))
								afisare();
							else
							{
								$sql = "DELETE FROM Cos WHERE User='$username'";
								$GLOBALS['conn']->query($sql);
							}
						}
					}
					else	
					{
						afisare();
					}
				?>	

					
				</div>
			</div>
		</div>
	</div>
	</div>
	
	<!-- Footer-ul -->
	<?php include 'footer.php' ?>
	
</body>
</html>
