<?php
	echo "
	<div class=\"container\">
		<div class=\"card\">
			<div class=\"container-fliud\">
				<div class=\"wrapper row\">
				  <div class=\"preview col-md-6\">
						<div class=\"preview-pic tab-content\">
						  <div class=\"tab-pane active\" id=\"pic-1\"><img src=\"".$row["Img1"]."\"/></div>
						  <div class=\"tab-pane\" id=\"pic-2\"><img  src=\"".$row["Img2"]."\"/></div>
						  <div class=\"tab-pane\" id=\"pic-3\"><img src=\"".$row["Img3"]."\"/></div>
						  <div class=\"tab-pane\" id=\"pic-4\"><img src=\"".$row["Img4"]."\"/></div>
						</div>
						<ul class=\"preview-thumbnail nav nav-tabs\">
						  <li class=\"active\"><a data-target=\"#pic-1\" data-toggle=\"tab\"><img src=\"".$row["Img1"]."\"/></a></li>
						  <li><a data-target=\"#pic-2\" data-toggle=\"tab\"><img src=\"".$row["Img2"]."\"/></a></li>
						  <li><a data-target=\"#pic-3\" data-toggle=\"tab\"><img src=\"".$row["Img3"]."\"/></a></li>
						  <li><a data-target=\"#pic-4\" data-toggle=\"tab\"><img src=\"".$row["Img4"]."\"/></a></li>
						</ul>
						
					</div>
					<div class=\"details col-md-6\">
						<h3 class=\"product-title\">".$row["Denumire"]."</h3>
					  <div class=\"vizualizari\">
							<span class=\"review-no\"><b>Acest produs a fost vizualizat de: ".$row["Vizualizari"]." persoane</b></span>
						</div>
						<h3>Descriere Produs</h3>
					  <p class=\"product-description\">".$row["Descriere"]."</p>
						<h4 class=\"price\">Pret: <span>".$row["Pret"]." Lei</span></h4>
						<h5 class=\"sizes\">Negociabil:
						  <span class=\"size\" data-toggle=\"tooltip\" title=\"small\">".$row["Negociabil"]."</span>
						</h5>
						<h5 class=\"sizes\">Stare:
						  <span class=\"size\" data-toggle=\"tooltip\" title=\"small\">".$row["Stare"]."</span>
						</h5>
						<form method=\"POST\" action=\"".$self."?id=".$GLOBALS['id']."\">
							<div class=\"action\">
								<button name=\"addFav\" class=\"btn btn-warning\" type=\"submit\">Adauga la Favorite</button>
								<button class=\"btn btn-primary\" type=\"button\" onClick=\"afiseazaDetaliiVanzator()\">Detalii Seller</button>
								<button class=\"btn btn-success\" type=\"submit\" name=\"butModifica\"> Modifica</button>
								<button class=\"add-to-cart btn btn-success\" type=\"submit\" name=\"addCos\"> Adauga in Cos</button>
							</div>
						</form>
						<div class=\"detailsSeller\" id=\"aa\">
							<div class=\"datailItem\">
								<h3>Nume vanzator: ".$row2["nume"]."</h3>
							</div>
							<div class=\"datailItem\">
								<h3>Nr. telefon: ".$row2["telefon"]."</h3>
							</div>
							<div class=\"datailItem\">
								<h3>Judet: ".$row2["judet"]."</h3>
							</div>
							<div class=\"datailItem\">
								<h3>Localitate: ".$row2["localitate"]."</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	";
?>