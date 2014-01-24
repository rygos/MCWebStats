<?php
	if(isset($_GET['page'])) {
		$getPage = $_GET['page'];
	}else{
		$getPage = '';
	}
	
	if(isset($_GET['player'])) {
		$getPlayer = $_GET['player'];
	}else{
		$getPlayer = '';
	}

	include 'config.php';
	
	//hier kommt irgendwann die mehrsprachigkeit... xD
	Include 'lng/de.php';
	
	include 'functions.php';
	include 'db.php';
	
	include 'header.php';
	
	if($getPage == 'home' OR $getPage == ''){
		include 'home.php';
	}elseif($getPage == 'player'){
		include 'player.php';
	}elseif($getPage == 'server'){
		include 'server.php';
	}else{
		include 'home.php';
	}

	include("footer.php") 
	
?>