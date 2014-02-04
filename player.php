<main>
	<div class="ym-wrapper">
		<div class="ym-wbox">
			<section class="ym-grid linearize-level-1">
				<article class="ym-g66 ym-gl content">
					<?php
						if ($getPlayer == '') {
							include 'player_highscore.php';
						} else {
							if ($getWorld == '') {
								$getWorld = $mc_world;
							}

							include 'playerinfo.php';
						}
					?>
				</article>
				<aside class="ym-g33 ym-gr">
					<div class="ym-gbox-right ym-clearfix">
						<h3><?php echo $lng['player']['righttitle']; ?></h3>
						<?php
						$stmt = $dbh->prepare($sql['playerrmenu']);
						if ($stmt->execute()) {
						  while ($row = $stmt->fetch()) {
						    echo '<p><a href="index.php?page=player&player=' . $row['name'] . '">' . $row['name'] . '</a></p>';
						  }
						}

						?>
						<p class="box warning"><?php echo $lng['player']['rightinfo']; ?></p>
					</div>
				</aside>
			</section>
		</div>
	</div>
</main>