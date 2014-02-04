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
function getServerInfo($worldname, $dbh, $sql) {
	//Fehlerreporting ausschalten
	//error_reporting(0);
	
	//Instanzieren des SpielerArrays
	$pinfo = array();

	//Bewegungsinformationen:
	$pinfo['move']['foot'] = 0;
	$pinfo['move']['boat'] = 0;
	$pinfo['move']['cart'] = 0;
	$pinfo['move']['pig'] = 0;
	$pinfo['move']['horse'] = 0;

	$stmt = $dbh->prepare($sql['srv_move']);
	$stmt->bindParam(1,$worldname);
	$stmt->execute();
	$pinfo['id'] = 0;
	while ($row = $stmt->fetch()) {
		if ($row['type'] == 0) {$pinfo['move']['foot'] = $row['dist'];}
		if ($row['type'] == 1) {$pinfo['move']['boat'] = $row['dist'];}
		if ($row['type'] == 2) {$pinfo['move']['cart'] = $row['dist'];}
		if ($row['type'] == 3) {$pinfo['move']['pig'] = $row['dist'];}
		if ($row['type'] == 5) {$pinfo['move']['horse'] = $row['dist'];}
	}

	//Globale Spielerinformationen
	$stmt = $dbh->prepare($sql['srv_glob']);
	$stmt->bindParam(1,$worldname);
	$stmt->execute();
	$pinfo['id'] = 0;
	while ($row = $stmt->fetch()) {
		$pinfo['info']['playtime'] = $row['sum(playtime)'];
		$pinfo['info']['arrows'] = $row['sum(arrows)'];
		$pinfo['info']['xpgained'] = $row['sum(xpgained)'];
		$pinfo['info']['joins'] = $row['sum(joins)'];
		$pinfo['info']['fishcatched'] = $row['sum(fishcatched)'];
		$pinfo['info']['damagetaken'] = $row['sum(damagetaken)'];
		$pinfo['info']['timeskicked'] = $row['sum(timeskicked)'];
		$pinfo['info']['toolsbroken'] = $row['sum(toolsbroken)'];
		$pinfo['info']['eggsthrown'] = $row['sum(eggsthrown)'];
		$pinfo['info']['itemscrafted'] = $row['sum(itemscrafted)'];
		$pinfo['info']['omnomnom'] = $row['sum(omnomnom)'];
		$pinfo['info']['onfire'] = $row['sum(onfire)'];
		$pinfo['info']['wordssaid'] = $row['sum(wordssaid)'];
		$pinfo['info']['commandsdone'] = $row['sum(commandsdone)'];
		$pinfo['info']['lastleave'] = 0;
		$pinfo['info']['lastjoin'] = 0;
		$pinfo['info']['votes'] = $row['sum(votes)'];
		$pinfo['info']['teleports'] = $row['sum(teleports)'];
		$pinfo['info']['itempickups'] = $row['sum(itempickups)'];
		$pinfo['info']['bedenter'] = $row['sum(bedenter)'];
		$pinfo['info']['bucketfill'] = $row['sum(bucketfill)'];
		$pinfo['info']['bucketempty'] = $row['sum(bucketempty)'];
		$pinfo['info']['worldchange'] = $row['sum(worldchange)'];
		$pinfo['info']['itemdrops'] = $row['sum(itemdrops)'];
		$pinfo['info']['shear'] = $row['sum(shear)'];
	}

	//Block Informationen
	$stmt = $dbh->prepare($sql['srv_block']);
	$stmt->bindParam(1,$worldname);
	$brtype = 1;
	$stmt->bindParam(2, $brtype);
	$stmt->execute();
	$pinfo['id'] = 0;
	while ($row = $stmt->fetch()) {
		$pinfo['block']['break'][$row['blockID']] = $row['sum(amount)'];
	}
	$brtype = 0;
	$stmt->execute();
	$pinfo['id'] = 0;
	while ($row = $stmt->fetch()) {
		$pinfo['block']['set'][$row['blockID']] = $row['sum(amount)'];
	}

	//Kill Informationen
	$stmt = $dbh->prepare($sql['srv_kill']);
	$stmt->bindParam(1,$worldname);
	$stmt->execute();
	$pinfo['id'] = 0;
	while ($row = $stmt->fetch()) {
		$pinfo['kill'][$row['type']]['amount'] = $row['sum(amount)'];
		$pinfo['kill'][$row['type']]['name'] = $row['type'];
	}

	return $pinfo;

}