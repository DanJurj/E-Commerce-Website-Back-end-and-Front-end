<?php
	//conectarea la baza de server
	$servername="localhost";
	$username="root";
	$password="";
	$dbname = "IS";
	$conn=new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) 
	{
		die("Eroare la conectare: " . $conn->connect_error);
	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	/*
	if(isset($_COOKIE['logged']))
		setcookie('logged',true,time()+$_COOKIE['timp']);
	else
		setcookie('logged',true,time()-$_COOKIE['timp']);*/
?>