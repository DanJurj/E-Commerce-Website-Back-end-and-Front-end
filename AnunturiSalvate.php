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
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Anunturi favorite</h5>
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
					$username="guest";
				function afisare()
				{
					$usr=$GLOBALS['username'];
					$sql = "SELECT * From Favorite Where User='$usr'";
					$result = $GLOBALS['conn']->query($sql);
					if (!$result) 
						trigger_error('Invalid query: ' . $conn->error);
					if($result->num_rows > 0)
					while($row = $result->fetch_assoc()) {
						$id_produs=$row["ID_Produs"];
						$user=$row["User"];
						$sql="SELECT Denumire, Pret, Stare, Img1 From Produse Where ID='$id_produs' ";
						$result2=$GLOBALS['conn']->query($sql);
						$row2=$result2->fetch_assoc();
						$sql="SELECT username, telefon From Conturi Where username='$user'";
						$result3=$GLOBALS['conn']->query($sql);
						$row3=$result3->fetch_assoc();
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
								<h6><strong>Vanzator: ".$row3["username"]." <span class=\"text-muted\"></span></strong></h6>
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
				}


				if (isset($_POST['sterge1'] ))
				{
					$id_produs=$_GET['id'];
					$sql = "DELETE FROM Favorite WHERE User='$username' and ID_Produs='$id_produs'";
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
						$sql = "DELETE FROM Favorite WHERE User='$username'";
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
						afisare();
				?>
					<div class="row">
						<div class="text-center">
						<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<div class="col-xs-3">
								<button type="submit" name="goleste" class="btn btn-danger btn-sm btn-block">
									Goleste
								</button>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	
	<!-- Footer-ul -->
	<?php include 'footer.php' ?>
	
</body>
</html>
