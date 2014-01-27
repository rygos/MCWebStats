<main>
	<div class="ym-wrapper">
		<div class="ym-wbox">
			<section class="box info">
				<div class="ym-grid linearize-level-1">
					<div class="ym-g66 ym-gl">
						<div class="ym-grid linearize-level-2">
							<article class="ym-g50 ym-gl">
								<div class="ym-gbox-left">
									<h4><?php echo $lng['home']['t5play']; ?></h4>
									<?php
										$sql = "SELECT 
													stats_player.*, stats_players.* 
												FROM 
													stats_player 
												INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id
												GROUP BY stats_player.player_id 
												ORDER BY playtime DESC 
												LIMIT 5";
										$result = mysql_query($sql); // or die("header.php Anfrage...");
										
										$data = array();
										$datalabel = array();
										$i = 0;
										while($row = mysql_fetch_array($result))
										{
											echo intervall($row['playtime']).' - <a href="index.php?page=player&player='.$row['name'].'">'.$row['name'].'</a><br>';
											$data[$i] = $row['playtime'];
											$datalabel[$i] = $row['name'];
											$i = $i + 1;
										}
										
										$send = implode(",",$data);
										$send2 = implode(",",$datalabel);
										echo '<br><img src="graph3d.php?a='.$send.'&b='.$send2.'">';
									?>
								</div>
							</article>
							<article class="ym-g50 ym-gr">
								<div class="ym-gbox">
									<h4><?php echo $lng['home']['t5run']; ?></h4>
									<?php
										$sql = "SELECT 
													stats_player.*, stats_players.*, stats_move.* 
												FROM 
													stats_player 
												INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id 
												INNER JOIN stats_move ON stats_player.player_id = stats_move.player_id 
												WHERE type=0
												GROUP BY stats_player.player_id
												ORDER BY distance DESC 
												LIMIT 5";
										$result = mysql_query($sql); // or die("header.php Anfrage...");
										
										$data = array();
										$datalabel = array();
										$i = 0;
										while($row = mysql_fetch_array($result))
										{
											echo intval($row['distance']).' Meter - <a href="index.php?page=player&player='.$row['name'].'">'.$row['name'].'</a><br>';
											$data[$i] = $row['distance'];
											$datalabel[$i] = $row['name'];
											$i = $i + 1;
										}
										
										$send1 = implode(",",$data);
										$send2 = implode(",",$datalabel);
										echo '<br><img src="graph3d.php?a='.$send1.'&b='.$send2.'">';
									?>
								</div>
							</article>
						</div>
					</div>
					<article class="ym-g33 ym-gr">
						<div class="ym-gbox-right secondary">
							<h4><?php echo $lng['home']['t5kills']; ?></h4>
							<?php
								$sql = "SELECT
											stats_players.name , sum(stats_kill.amount) as killcount
										FROM
											stats_player
										INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id
										INNER JOIN stats_kill ON stats_player.player_id = stats_kill.player_id
										GROUP BY stats_kill.player_id
										ORDER BY killcount DESC
										LIMIT 5";

								$result = mysql_query($sql); // or die("header.php Anfrage...");
								
								$data = array();
								$datalabel = array();
								$i = 0;
								while($row = mysql_fetch_array($result))
								{
									echo intval($row['killcount']).' Kills - <a href="index.php?page=player&player='.$row['name'].'">'.$row['name'].'</a><br>';
									$data[$i] = $row['killcount'];
									$datalabel[$i] = $row['name'];
									$i = $i + 1;
								}
								
								$send1 = implode(",",$data);
								$send2 = implode(",",$datalabel);
								echo '<br><img src="graph3d.php?a='.$send1.'&b='.$send2.'">';												
							?>
						</div>
					</article>
				</div>
				
				<br><br>
				
				<div class="ym-grid linearize-level-1">
					<div class="ym-g66 ym-gl">
						<div class="ym-grid linearize-level-2">
							<article class="ym-g50 ym-gl">
								<div class="ym-gbox-left">
									<h4><?php echo $lng['home']['t5eat']; ?></h4>
									<?php
										$sql = "SELECT 
													stats_player.*, stats_players.* 
												FROM 
													stats_player 
												INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id 
												GROUP BY stats_player.player_id
												ORDER BY omnomnom DESC 
												LIMIT 5";
										$result = mysql_query($sql); // or die("header.php Anfrage...");
										
										$data = array();
										$datalabel = array();
										$i = 0;
										while($row = mysql_fetch_array($result))
										{
											echo $row['omnomnom'].' - <a href="index.php?page=player&player='.$row['name'].'">'.$row['name'].'</a><br>';
											$data[$i] = $row['omnomnom'];
											$datalabel[$i] = $row['name'];
											$i = $i + 1;
										}
										
										$send = implode(",",$data);
										$send2 = implode(",",$datalabel);
										echo '<br><img src="graph3d.php?a='.$send.'&b='.$send2.'">';
									?>
								</div>
							</article>
							<article class="ym-g50 ym-gr">
								<div class="ym-gbox">
									<h4><?php echo $lng['home']['t5break']; ?></h4>
									<?php
										$sql = "SELECT
													stats_players.name,
													stats_players.*, sum(stats_block.amount) AS blockcount
												FROM
													stats_player
												INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id
												INNER JOIN stats_block ON stats_player.player_id = stats_block.player_id
												WHERE
													break = 1
												GROUP BY
													stats_block.player_id
												ORDER BY
													blockcount DESC
												LIMIT 5";
										$result = mysql_query($sql); // or die("header.php Anfrage...");
										
										$data = array();
										$datalabel = array();
										$i = 0;
										while($row = mysql_fetch_array($result))
										{
											echo intval($row['blockcount']).' Blöcke - <a href="index.php?page=player&player='.$row['name'].'">'.$row['name'].'</a><br>';
											$data[$i] = $row['blockcount'];
											$datalabel[$i] = $row['name'];
											$i = $i + 1;
										}
										
										$send1 = implode(",",$data);
										$send2 = implode(",",$datalabel);
										echo '<br><img src="graph3d.php?a='.$send1.'&b='.$send2.'">';
									?>
								</div>
							</article>
						</div>
					</div>
					<article class="ym-g33 ym-gr">
						<div class="ym-gbox-right secondary">
							<h4><?php echo $lng['home']['t5set']; ?></h4>
							<?php
								$sql = "SELECT
											stats_players.name,
											stats_players.*, sum(stats_block.amount) AS blockcount
										FROM
											stats_player
										INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id
										INNER JOIN stats_block ON stats_player.player_id = stats_block.player_id
										WHERE
											break = 0
										GROUP BY
											stats_block.player_id
										ORDER BY
											blockcount DESC
										LIMIT 5";

								$result = mysql_query($sql); // or die("header.php Anfrage...");
								
								$data = array();
								$datalabel = array();
								$i = 0;
								while($row = mysql_fetch_array($result))
								{
									echo intval($row['blockcount']).' Blöcke - <a href="index.php?page=player&player='.$row['name'].'">'.$row['name'].'</a><br>';
									$data[$i] = $row['blockcount'];
									$datalabel[$i] = $row['name'];
									$i = $i + 1;
								}
								
								$send1 = implode(",",$data);
								$send2 = implode(",",$datalabel);
								echo '<br><img src="graph3d.php?a='.$send1.'&b='.$send2.'">';												
							?>
						</div>
					</article>
				</div>
			</section>
		</div>
	</div>
</main>