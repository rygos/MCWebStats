<?php

	function getMenuActive($active, $language) {
		if($active == 'home' || $active == ''){
			$t = '<li class="active"><a href="index.php">'.$language['topmenu']['overview'].'</a></li>';
		}else{
			$t = '<li><a href="index.php">'.$language['topmenu']['overview'].'</a></li>';
		}
		
		if($active == 'player'){
			$t .= '<li class="active"><a href="index.php?page=player">'.$language['topmenu']['player'].'</a></li>';
		}else{
			$t .= '<li><a href="index.php?page=player">'.$language['topmenu']['player'].'</a></li>';
		}
		
		if($active == 'server'){
			$t .= '<li class="active"><a href="index.php?page=server">'.$language['topmenu']['server'].'</a></li>';
		}else{
			$t .= '<li><a href="index.php?page=server">'.$language['topmenu']['server'].'</a></li>';
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
        <link rel="stylesheet" href="yaml/add-ons/accessible-tabs/tabs.css" type="text/css"/>
		<script src="js/jquery-1.7.min.js" type="text/javascript" />
		<script src="yaml/add-ons/accessible-tabs/jquery.tabs.js" type="text/javascript" />
		<script src="yaml/add-ons/syncheight/jquery.syncheight.js" type="text/javascript" />
		<script type="text/javascript">
			    $(document).ready(function(){
    				$('.jquery_tabs').accessibleTabs();
    			});
		</script>
		
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