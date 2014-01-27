<?php
$sql = "SELECT player_id FROM stats_players WHERE name = '".$getPlayer."'";
$result = mysql_query($sql);
$playerid = 0;
while($row = mysql_fetch_array($result)){$playerid = $row['player_id'];}

$sql = "SELECT
			stats_players.*, stats_move.*
		FROM
			stats_move
		INNER JOIN stats_players ON stats_move.player_id = stats_players.player_id
		WHERE stats_players.`player_id` = '".$playerid."' AND type=0 AND world='".$mc_world."'";
		
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
	echo '<div class="ym-gbox-left ym-clearfix">
				<div class="ym-grid linearize-level-2">
					<div class="ym-g50 ym-gl">
						<div class="ym-gbox-left">
							<!-- content -->
							<h6>Reisen</h6>
							<table>
								<thead>
									<th>Art</th>
									<th>Entfernung</th>
								</thead>
								<tbody>
									<tr>
										<td>Laufen</td>
										<td>'.intval($row['distance']).' Meter</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>';	
}

	$sql = "SELECT 
				stats_player.*, stats_players.* 
			FROM 
				stats_player 
			INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id 
			WHERE stats_players.`name` = '".$getPlayer."'";
	$result = mysql_query($sql); // or die("header.php Anfrage...");
	
	while($row = mysql_fetch_array($result)){

echo '<div class="ym-g50 ym-gr">
			<div class="ym-gbox-right">
				<!-- content -->
				<h6>Sonstiges</h6>
				<table>
					<thead>
						<th>Titel</th>
						<th>Wert</th>
					</thead>
					<tbody>
						<tr>
							<td>Spielzeit</td>
							<td>'.intervall($row['playtime']).'</td>
						</tr>
						<tr>
							<td>Pfeile Verschossen</td>
							<td>'.$row['arrows'].'</td>
						</tr>
						<tr>
							<td>Exp gesammelt</td>
							<td>'.$row['xpgained'].'</td>
						</tr>
						<tr>
							<td>Spielbeitritte</td>
							<td>'.$row['joins'].'</td>
						</tr>
						<tr>
							<td>Fische gefangen</td>
							<td>'.$row['fishcatched'].'</td>
						</tr>
						<tr>
							<td>Schaden genommen</td>
							<td>'.$row['damagetaken'].'</td>
						</tr>
						<tr>
							<td>Gekickt</td>
							<td>'.$row['timeskicked'].'</td>
						</tr>
						<tr>
							<td>Werkzeuge verbraucht</td>
							<td>'.$row['toolsbroken'].'</td>
						</tr>
						<tr>
							<td>Eier geworfen</td>
							<td>'.$row['eggsthrown'].'</td>
						</tr>
						<tr>
							<td>Items erstellt</td>
							<td>'.$row['itemscrafted'].'</td>
						</tr>
						<tr>
							<td>Gegessen</td>
							<td>'.$row['omnomnom'].'</td>
						</tr>
						<tr>
							<td>Feuer gefangen</td>
							<td>'.$row['onfire'].'</td>
						</tr>
						<tr>
							<td>Chat befehle</td>
							<td>'.$row['commandsdone'].'</td>
						</tr>
						<tr>
							<td>Letzter Logout</td>
							<td>'.$row['lastleave'].'</td>
						</tr>
						<tr>
							<td>Letzter Login</td>
							<td>'.$row['lastjoin'].'</td>
						</tr>
						<tr>
							<td>Abstimmungen</td>
							<td>'.$row['votes'].'</td>
						</tr>
						<tr>
							<td>Netherteleports</td>
							<td>'.$row['teleports'].'</td>
						</tr>
						<tr>
							<td>Items aufgenommen</td>
							<td>'.$row['itempickups'].'</td>
						</tr>
						<tr>
							<td>Ins Bett gegangen</td>
							<td>'.$row['bedenter'].'</td>
						</tr>
						<tr>
							<td>Einer gefüllt</td>
							<td>'.$row['bucketfill'].'</td>
						</tr>
						<tr>
							<td>Eimer geleert</td>
							<td>'.$row['bucketempty'].'</td>
						</tr>
						<tr>
							<td>Items verggeworfen</td>
							<td>'.$row['itemdrops'].'</td>
						</tr>
						<tr>
							<td>Schere genutzt</td>
							<td>'.$row['shear'].'</td>
						</tr>
						<tr>
							<td>Erster Login</td>
							<td>'.$row['firstjoin'].'</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>';
	}
	?>
	<h6>Blockstatistiken</h6>
	<p class='box info'>Diese Tabelle befindet sich noch im Beta stadium<p>
	<table>
		<thead>
			<th>Icon</th>
			<th>Name</th>
			<th>Gesetzt</th>
			<th>Abgebaut</th>
		</thead>
		<tbody>
			
			
			<?php
			$sql = "SELECT
						*
					FROM
						stats_block
					WHERE `player_id` = '".$playerid."'
					ORDER BY blockID ASC";
			$i = 0;
			$break0count = 0;
			$break1count = 0;
			$bid = 0;
			$result = array();
			
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result)){
				//Prüfen ob der gleiche Block wieder vorkommt
				if($bid == $row['blockID']){
					//Der gleiche Block 
					$break1count = $row['amount'];
				}else{
					//Neuer Block
					$break0count = 0;
					$break1count = 0;
					
					$bid = $row['blockID'];
					$break0count = $row['amount'];
					$i = $i + 1;
				}
				
				$result_bid[$i] = $bid;
				$result_break0[$i] = $break0count;
				$result_break1[$i] = $break1count;
				
			}

		$i = 1;
				
			foreach($result_bid as &$value){
				echo'
					<tr>
						<td><img src="assets/blocks/'.$value.'.png" width="32"></td>
						<td>'.$lng['block'][$value].'</td>
						<td>'.$result_break1[$i].'</td>
						<td>'.$result_break0[$i].'</td>
					</tr>';
					
				$i = $i + 1;
			}

			?>
			
		</tbody>
	</table>
</div>