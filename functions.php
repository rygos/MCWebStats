<?php

function getPlayerState($playername, $sql, $dbh){
	$leave = 0;
	$join = 0;
	$stmt = $dbh -> prepare($sql['player_online']);
	$stmt -> bindParam(1, $playername);
	$stmt -> execute();
	while ($row = $stmt -> fetch()) {
		$leave = strtotime($row['lastleave']);
		$join = strtotime($row['lastjoin']);
	}
	$t = '';
	if($join > $leave){
		$t = '<img src="assets/player_online.png">';
	}else{
		$t = '<img src="assets/player_offline.png">';
	}
	
	return $t;
}

function intervall($sek) {
    $i = sprintf('%dT %dS %dM %ss',
            $sek / 86400,
            $sek / 3600 % 24,
            $sek / 60 % 60,
            $sek % 60
         );
    return $i;
}