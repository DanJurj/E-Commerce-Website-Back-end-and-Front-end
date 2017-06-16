<?php
	setcookie('logged',true,time()-5000);
	setcookie('username',"guest");
	header("location: Homepage.php");
?>