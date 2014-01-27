<main>
	<div class="ym-wrapper">
		<div class="ym-wbox">
			<section class="ym-grid linearize-level-1">
				<article class="ym-g66 ym-gl content">
					<h2><?php echo $getPlayer; ?></h2>
					
					<?php 
						if($getPlayer == ''){
							echo '<div class="ym-gbox-left ym-clearfix"><p>'.$lng['player']['info'].'</p></div>';
						}else{
							if($getWorld == ''){
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
							$sql = "SELECT name FROM stats_players";
							$result = mysql_query($sql); // or die("header.php Anfrage...");
							
							while($row = mysql_fetch_array($result)){
								echo '<p><a href="index.php?page=player&player='.$row['name'].'">'.$row['name'].'</a></p>';
							}
						?>
						<p class="box warning"><?php echo $lng['player']['rightinfo']; ?></p>
					</div>
				</aside>
			</section>
		</div>
	</div>
</main>