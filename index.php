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

	if(isset($_GET['world'])) {
		$getWorld = $_GET['world'];
	}else{
		$getWorld = '';
	}

	include 'config.php';
	
	//hier kommt irgendwann die mehrsprachigkeit... xD
	Include 'lng/de.php';
	
	include 'functions.php';
	include 'db.php';
	
	include 'get_playerinfo.php';
	
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