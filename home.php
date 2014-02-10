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
										$stmt = $dbh->prepare($sql['t5playtime']);
										$data = array();
										$datalabel = array();
										$i = 0;
										if ($stmt->execute()) {
										  while ($row = $stmt->fetch()) {
										    echo intervall($row['playtime']).' - <a href="index.php?page=player&player='.$row['name'].'">'.$row['name'].''.getPlayerState($row['name'],$sql,$dbh).'</a><br>';
											$data[$i] = $row['playtime'];
											$datalabel[$i] = $row['name'];
											$i = $i + 1;
										  }
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
										$stmt = $dbh->prepare($sql['t5run']);
										$data = array();
										$datalabel = array();
										$i = 0;
										if ($stmt->execute()){
										while($row = $stmt->fetch())
											{
												echo intval($row['distance']).' Meter - <a href="index.php?page=player&player='.$row['name'].'">'.$row['name'].''.getPlayerState($row['name'],$sql,$dbh).'</a><br>';
												$data[$i] = $row['distance'];
												$datalabel[$i] = $row['name'];
												$i = $i + 1;
											}
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
								$stmt = $dbh->prepare($sql['t5kill']);
								$data = array();
								$datalabel = array();
								$i = 0;
								if ($stmt->execute()) {
									while ($row = $stmt->fetch()) {
										echo intval($row['killcount']).' Kills - <a href="index.php?page=player&player='.$row['name'].'">'.$row['name'].''.getPlayerState($row['name'],$sql,$dbh).'</a><br>';
										$data[$i] = $row['killcount'];
										$datalabel[$i] = $row['name'];
										$i = $i + 1;
									}
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
										$stmt = $dbh->prepare($sql['t5eat']);
										$data = array();
										$datalabel = array();
										$i = 0;
										if ($stmt->execute()) {
											while ($row = $stmt->fetch()) {
												echo $row['omnomnom'].' - <a href="index.php?page=player&player='.$row['name'].'">'.$row['name'].''.getPlayerState($row['name'],$sql,$dbh).'</a><br>';
												$data[$i] = $row['omnomnom'];
												$datalabel[$i] = $row['name'];
												$i = $i + 1;
											}
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
										$stmt = $dbh->prepare($sql['t5break']);	
										$data = array();
										$datalabel = array();
										$i = 0;
										if ($stmt->execute()) {
											while ($row = $stmt->fetch()) {
												echo intval($row['blockcount']).' Blöcke - <a href="index.php?page=player&player='.$row['name'].'">'.$row['name'].''.getPlayerState($row['name'],$sql,$dbh).'</a><br>';
												$data[$i] = $row['blockcount'];
												$datalabel[$i] = $row['name'];
												$i = $i + 1;
											}
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
								$stmt = $dbh->prepare($sql['t5set']);				
								$data = array();
								$datalabel = array();
								$i = 0;
								if ($stmt->execute()) {
									while ($row = $stmt->fetch()) {
										echo intval($row['blockcount']).' Blöcke - <a href="index.php?page=player&player='.$row['name'].'">'.$row['name'].''.getPlayerState($row['name'],$sql,$dbh).'</a><br>';
										$data[$i] = $row['blockcount'];
										$datalabel[$i] = $row['name'];
										$i = $i + 1;
									}
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