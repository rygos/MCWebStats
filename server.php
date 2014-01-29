<main>
	<div class="ym-wrapper">
		<div class="ym-wbox">
			<section class="ym-grid linearize-level-1">
				<article class="ym-g66 ym-gl content">
					<h2><?php echo $lng['server']['title']; ?></h2>
					
					<?php
						if ($getWorld == '') {
							$getWorld = $mc_world;
						}

						echo '
							<a class="ym-button" href="index.php?page=server&world=' . $mc_world . '">' . $lng['button']['world'] . '</a>
							<a class="ym-button" href="index.php?page=server&world=' . $mc_world . '_nether">' . $lng['button']['nether'] . '</a>
							<a class="ym-button" href="index.php?page=server&world=' . $mc_world . '_end">' . $lng['button']['theend'] . '</a>
							<br><br>
							';

						include 'serverinfo.php';
					?>
				</article>
				<aside class="ym-g33 ym-gr">
					<div class="ym-gbox-right ym-clearfix">
						<h3><?php echo $lng['server']['righttitle']; ?></h3>
						<p class="box warning"><?php echo $lng['server']['rightinfo']; ?></p>
					</div>
				</aside>
			</section>
		</div>
	</div>
</main>