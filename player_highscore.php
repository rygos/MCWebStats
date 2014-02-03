<?php

include 'player_highscore_menu.php';

if($getScore == ''){$getScore = 'playtime';}

switch($getScore){
	case 'playtime':
		$sql = "SELECT (sum(stats_player.playtime) / 60 / 60) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['join']['playtime'].' (Hours)';
		break;
	case 'move':
		$sql = "SELECT (sum(stats_move.distance) / 1000) as result, stats_players.* FROM stats_move INNER JOIN stats_players ON stats_move.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['move']['title'].' (km)';
		break;
	case 'joins':
		$sql = "SELECT (sum(stats_player.joins)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['joins'];
		break;
	case 'wordssaid':
		$sql = "SELECT (sum(stats_player.wordssaid)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['wordssaid'];
		break;
	case 'commandsdone':
		$sql = "SELECT (sum(stats_player.commandsdone)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['commandsdone'];
		break;
	case 'worldchange':
		$sql = "SELECT (sum(stats_player.worldchange)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['worldchange'];
		break;
	case 'timeskicked':
		$sql = "SELECT (sum(stats_player.timeskicked)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['timeskicked'];
		break;
	case 'damagetaken':
		$sql = "SELECT (sum(stats_player.damagetaken)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['damagetaken'];
		break;
	case 'toolsbroken':
		$sql = "SELECT (sum(stats_player.toolsbroken)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['toolsbroken'];
		break;
	case 'itemscrafted':
		$sql = "SELECT (sum(stats_player.itemscrafted)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['itemscrafted'];
		break;
	case 'omnomnom':
		$sql = "SELECT (sum(stats_player.omnomnom)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['omnomnom'];
		break;
	case 'xpgained':
		$sql = "SELECT (sum(stats_player.xpgained)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['xpgained'];
		break;
	case 'arrows':
		$sql = "SELECT (sum(stats_player.arrows)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['arrows'];
		break;
	case 'fishcatched':
		$sql = "SELECT (sum(stats_player.fishcatched)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['fishcatched'];
		break;
	case 'bucketfill':
		$sql = "SELECT (sum(stats_player.bucketfill)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['bucketfill'];
		break;
	case 'bucketempty':
		$sql = "SELECT (sum(stats_player.bucketempty)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['bucketempty'];
		break;
	case 'itempickups':
		$sql = "SELECT (sum(stats_player.itempickups) / 1000) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['itempickups'].' 1/1000';
		break;
	case 'itemdrops':
		$sql = "SELECT (sum(stats_player.itemdrops)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['itemdrops'];
		break;
	case 'onfire':
		$sql = "SELECT (sum(stats_player.onfire)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['onfire'];
		break;
	case 'bedenter':
		$sql = "SELECT (sum(stats_player.bedenter)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['bedenter'];
		break;
	case 'shear':
		$sql = "SELECT (sum(stats_player.shear)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
		$title = $lng['general']['shear'];
		break;
}

$i = 0;
$data = array();
$datalabel = array();
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){	$datalabel[$i] = $row['name'];
	$data[$i] = $row['result'];
	$i += 1;
}

	$send = implode(",",$data);
	$send2 = implode(",",$datalabel);
	$send3 = $title;
	echo '<br><br><img src="graphbar.php?a='.$send.'&b='.$send2.'&c='.$send3.'">';