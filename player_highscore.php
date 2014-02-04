<?php

include 'player_highscore_menu.php';

if($getScore == ''){$getScore = 'playtime';}

switch($getScore){
	case 'playtime':
		$title = $lng['join']['playtime'].' (Hours)';
		break;
	case 'move':
		$title = $lng['move']['title'].' (km)';
		break;
	case 'joins':
		$title = $lng['general']['joins'];
		break;
	case 'wordssaid':
		$title = $lng['general']['wordssaid'];
		break;
	case 'commandsdone':
		$title = $lng['general']['commandsdone'];
		break;
	case 'worldchange':
		$title = $lng['general']['worldchange'];
		break;
	case 'timeskicked':
		$title = $lng['general']['timeskicked'];
		break;
	case 'damagetaken':
		$title = $lng['general']['damagetaken'];
		break;
	case 'toolsbroken':
		$title = $lng['general']['toolsbroken'];
		break;
	case 'itemscrafted':
		$title = $lng['general']['itemscrafted'];
		break;
	case 'omnomnom':
		$title = $lng['general']['omnomnom'];
		break;
	case 'xpgained':
		$title = $lng['general']['xpgained'];
		break;
	case 'arrows':
		$title = $lng['general']['arrows'];
		break;
	case 'fishcatched':
		$title = $lng['general']['fishcatched'];
		break;
	case 'bucketfill':
		$title = $lng['general']['bucketfill'];
		break;
	case 'bucketempty':
		$title = $lng['general']['bucketempty'];
		break;
	case 'itempickups':
		$title = $lng['general']['itempickups'].' 1/1000';
		break;
	case 'itemdrops':
		$title = $lng['general']['itemdrops'];
		break;
	case 'onfire':
		$title = $lng['general']['onfire'];
		break;
	case 'bedenter':
		$title = $lng['general']['bedenter'];
		break;
	case 'shear':
		$title = $lng['general']['shear'];
		break;
	default:
		$title = $lng['join']['playtime'].' (Hours)';
		$getScore = 'playtime';
		break;
}

$i = 0;
$data = array();
$datalabel = array();
$stmt = $dbh->prepare($sql['glob_'.$getScore]);
if ($stmt->execute()) {
	while ($row = $stmt->fetch()) {		$datalabel[$i] = $row['name'];
		$data[$i] = $row['result'];
		$i += 1;
	}
}

$send = implode(",",$data);
$send2 = implode(",",$datalabel);
$send3 = $title;
echo '<br><br><img src="graphbar.php?a='.$send.'&b='.$send2.'&c='.$send3.'">';
