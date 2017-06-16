<div class="header-top">
	 <div class="wrap"> 
		<div class="logo">
			<a href="Homepage.php"><img src="pics/logo.png" alt=""/></a>
	    </div>
	    <div class="cssmenu">
		   <ul>
		   <?php 
		   		if(!isset($_COOKIE['logged']))
		   		{
		   			echo "
		   			<li class=\"active\"><a href=\"Register.php\">Inregistreaza-te</a></li> 
			 		<li><a href=\"Login.php\">Log in</a></li> 
					<li><a href=\"Cos.php\">Cos</a></li>
		   			";
		   		}
		   		else
		   		{
		   			echo "
		   			<h3>Welcome:".$_COOKIE['username']."</h3>
		   			<li><a href=\"AccountDetails.php\">Contul meu</a></li>
		   			<li><a href=\"Cos.php\">Cos</a></li> 
			 		<li><a href=\"AnunturiSalvate.php\">Favorite</a></li>
					<li><a href=\"Istoric.php\">Istoric Plati</a></li>
					<li><a href=\"logout.php\">Log Out</a></li>
		   			";
		   		}
		    ?>
			 
			
		   </ul>
		   <ul>
		   <?php 
		   		if(isset($_COOKIE['logged']))
		   			if($_COOKIE['tip']=="admin")
						echo " <li><a href=\"Users.php\">Vezi toate Conturile</a></li> ";
		   	?>
		   </ul>
		</div>
		<div class="clear"></div>
 	</div>
</div>
   <div class="header-bottom">
   	<div class="wrap">
   		<!-- start header menu -->
		<ul class="megamenu skyblue">
		    <li><a class="color1" href="Homepage.php">Acasa</a></li>
			<li class="grid"><a class="color2">Categorii</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>Categorii</h4>
								<ul>
									<li><a href="Categorie.php?cat=1">Electronice si electrocasnice</a></li>
									<li><a href="Categorie.php?cat=2">Imobiliare</a></li>
									<li><a href="Categorie.php?cat=3">Animale de companie</a></li>
									<li><a href="Categorie.php?cat=4">Imbracaminte</a></li>
									<li><a href="Categorie.php?cat=5">Casa si gradina</a></li>
								</ul>	
							</div>
						</div>
					</div>
				</div>
				</li>
				<li><a class="color10" href="Products.php">Produse</a></li>
				<li><a class="color11" href="Contact.php">Contact</a></li>
				<li><a class="color12" href="About.php">About</a></li>
		   </ul>
		   <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
</script>
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
</script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
