<?php
/*
 * Aufbau des getPlayerInfo Arrays
 *
 * id - SpielerID
 * name - Spielername
 * firstjoin - Erster Login
 * move.foot - Laufen
 * move.boat - Boot fahren
 * move.cart - Minecart Fahren
 * move.pig - Auf nem Schwein geritten
 */

//Lade Spielerinformationen in Array
function getPlayerInfo($worldname, $playername, $dbh, $sql) {
	//Fehlerreporting ausschalten
	//error_reporting(0);

	//Instanzieren des SpielerArrays
	$pinfo = array();

	//PlayerID Laden
	$stmt = $dbh -> prepare($sql['pi_playertbl']);
	$stmt -> bindParam(1, $playername);
	$stmt -> execute();
	$pinfo['id'] = 0;
	while ($row = $stmt -> fetch()) {
		$pinfo['id'] = $row['player_id'];
		$pinfo['name'] = $row['name'];
		$pinfo['firstjoin'] = $row['firstjoin'];
	}

	if (!isset($pinfo['name'])) {
		$pinfo['name'] = '=?unk?=';
		return $pinfo;
	}

	//Bewegungsinformationen:
	$pinfo['move']['foot'] = 0;
	$pinfo['move']['boat'] = 0;
	$pinfo['move']['cart'] = 0;
	$pinfo['move']['pig'] = 0;
	$pinfo['move']['horse'] = 0;

	$stmt = $dbh -> prepare($sql['pi_move']);
	$stmt -> bindParam(1, $pinfo['id']);
	$stmt -> bindParam(2, $worldname);
	$stmt -> execute();
	while ($row = $stmt -> fetch()) {
		if ($row['type'] == 0) {$pinfo['move']['foot'] = $row['distance'];
		}
		if ($row['type'] == 1) {$pinfo['move']['boat'] = $row['distance'];
		}
		if ($row['type'] == 2) {$pinfo['move']['cart'] = $row['distance'];
		}
		if ($row['type'] == 3) {$pinfo['move']['pig'] = $row['distance'];
		}
		if ($row['type'] == 5) {$pinfo['move']['horse'] = $row['distance'];
		}
	}

	//Globale Spielerinformationen
	$stmt = $dbh -> prepare($sql['pi_glob']);
	$stmt -> bindParam(1, $pinfo['id']);
	$stmt -> bindParam(2, $worldname);
	$stmt -> execute();
	while ($row = $stmt -> fetch()) {
		$pinfo['info']['playtime'] = $row['playtime'];
		$pinfo['info']['arrows'] = $row['arrows'];
		$pinfo['info']['xpgained'] = $row['xpgained'];
		$pinfo['info']['joins'] = $row['joins'];
		$pinfo['info']['fishcatched'] = $row['fishcatched'];
		$pinfo['info']['damagetaken'] = $row['damagetaken'];
		$pinfo['info']['timeskicked'] = $row['timeskicked'];
		$pinfo['info']['toolsbroken'] = $row['toolsbroken'];
		$pinfo['info']['eggsthrown'] = $row['eggsthrown'];
		$pinfo['info']['itemscrafted'] = $row['itemscrafted'];
		$pinfo['info']['omnomnom'] = $row['omnomnom'];
		$pinfo['info']['onfire'] = $row['onfire'];
		$pinfo['info']['wordssaid'] = $row['wordssaid'];
		$pinfo['info']['commandsdone'] = $row['commandsdone'];
		$pinfo['info']['lastleave'] = $row['lastleave'];
		$pinfo['info']['lastjoin'] = $row['lastjoin'];
		$pinfo['info']['votes'] = $row['votes'];
		$pinfo['info']['teleports'] = $row['teleports'];
		$pinfo['info']['itempickups'] = $row['itempickups'];
		$pinfo['info']['bedenter'] = $row['bedenter'];
		$pinfo['info']['bucketfill'] = $row['bucketfill'];
		$pinfo['info']['bucketempty'] = $row['bucketempty'];
		$pinfo['info']['worldchange'] = $row['worldchange'];
		$pinfo['info']['itemdrops'] = $row['itemdrops'];
		$pinfo['info']['shear'] = $row['shear'];
	}

	//Block Informationen
	$stmt = $dbh -> prepare($sql['pi_block']);
	$stmt -> bindParam(1, $pinfo['id']);
	$stmt -> bindParam(2, $worldname);
	$stmt -> execute();
	while ($row = $stmt -> fetch()) {
		if ($row['break'] == 1) {
			$pinfo['block']['break'][$row['blockID']] = $row['amount'];
		} elseif ($row['break'] == 0) {
			$pinfo['block']['set'][$row['blockID']] = $row['amount'];
		}
	}

	//Kill Informationen
	$stmt = $dbh -> prepare($sql['pi_kill']);
	$stmt -> bindParam(1, $pinfo['id']);
	$stmt -> bindParam(2, $worldname);
	$stmt -> execute();
	while ($row = $stmt -> fetch()) {
		$pinfo['kill'][$row['type']]['amount'] = $row['amount'];
		$pinfo['kill'][$row['type']]['name'] = $row['type'];
	}

	return $pinfo;

}
