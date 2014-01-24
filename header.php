<?php

	function getMenuActive($active, $language) {
		if($active == 'home' || $active == ''){
			$t = '<li class="active"><strong>'.$language['topmenu']['overview'].'</strong></li>';
		}else{
			$t = '<li><a href="index.php">&Uuml;bersicht</a></li>';
		}
		
		if($active == 'player'){
			$t .= '<li class="active"><strong>'.$language['topmenu']['player'].'</strong></li>';
		}else{
			$t .= '<li><a href="index.php?page=player">Spieler</a></li>';
		}
		
		if($active == 'server'){
			$t .= '<li class="active"><strong>'.$language['topmenu']['server'].'</strong></li>';
		}else{
			$t .= '<li><a href="index.php?page=server">Server</a></li>';
		}
		
		return $t;
	}

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Minecraft Statistiken"/>
		<meta name="author" content="Marcel 'ryg' Hering"/>
		<!-- mobile viewport optimisation -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
        <title><?php echo $pg_title; ?></title>
        <link rel="stylesheet" type="text/css" href="style.css">
		
		<!--[if lte IE 7]>
		<link rel="stylesheet" href="yaml/core/iehacks.min.css" type="text/css"/>
		<![endif]-->
	</head>
	
	<body>
		<header>
		<div class="ym-wrapper">
			<div class="ym-wbox">
				<h1><a href="index.php"><?php echo $pg_title; ?></a></h1>
			</div>
		</div>
		</header>
		<nav class="ym-hlist">
			<div class="ym-wrapper">
				<div class="ym-wbox">
					<ul>
						<?php echo getMenuActive($getPage, $lng); ?>
					</ul>
				</div>
			</div>
		</nav>