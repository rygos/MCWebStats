<?php
	include('get_playerinfo.php');
	$t = getPlayerInfo($getWorld, $getPlayer);

echo '
<div class="ym-gbox-left ym-clearfix">
	<div class="ym-grid linearize-level-2">
		<div class="ym-g50 ym-gl">
			<div class="ym-gbox-left">
				<h6>'.$lng['join']['title'].'</h6>
				<table>
					<thead>
						<th>'.$lng['misc']['title'].'</th>
						<th>'.$lng['misc']['value'].'</th>
					</thead>
					<tbody>
						<tr>
							<td>'.$lng['join']['first'].'</td>
							<td>'.$t['firstjoin'].'</td>
						</tr>
						<tr>
							<td>'.$lng['join']['last'].'</td>
							<td>'.$t['info']['lastjoin'].'</td>
						</tr>
						<tr>
							<td>'.$lng['join']['leave'].'</td>
							<td>'.$t['info']['lastleave'].'</td>
						</tr>
						<tr>
							<td>'.$lng['join']['lastplaytime'].'</td>
							<td>'.intervall(strtotime($t['info']['lastleave']) - strtotime($t['info']['lastjoin'])).'</td>
						</tr>
						<tr>
							<td>'.$lng['join']['playtime'].'</td>
							<td>'.intervall($t['info']['playtime']).'</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	
		<div class="ym-g50 ym-gr">
			<div class="ym-gbox-right">
				<h6>'.$lng['move']['title'].'</h6>
				<table>
					<thead>
						<th>'.$lng['misc']['title'].'</th>
						<th>'.$lng['misc']['value'].'</th>
						<th>'.$lng['misc']['unit'].'</th>
					</thead>
					<tbody>
						<tr>
							<td>'.$lng['move']['foot'].'</td>
							<td>'.intval($t['move']['foot']).'</td>
							<td>'.$lng['misc']['meter'].'</td>
						</tr>
						<tr>
							<td>'.$lng['move']['boat'].'</td>
							<td>'.intval($t['move']['boat']).'</td>
							<td>'.$lng['misc']['meter'].'</td>
						</tr>
						<tr>
							<td>'.$lng['move']['cart'].'</td>
							<td>'.intval($t['move']['cart']).'</td>
							<td>'.$lng['misc']['meter'].'</td>
						</tr>
						<tr>
							<td>'.$lng['move']['pig'].'</td>
							<td>'.intval($t['move']['pig']).'</td>
							<td>'.$lng['misc']['meter'].'</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="ym-grid linearize-level-2">
		<div class="ym-g50 ym-gl">
			<div class="ym-gbox-left">
				<h6>'.$lng['general']['title'].'</h6>
				<table>
					<thead>
						<th>'.$lng['misc']['title'].'</th>
						<th>'.$lng['misc']['value'].'</th>
					</thead>
					<tbody>
						<tr>
							<td>'.$lng['general']['joins'].'</td>
							<td>'.$t['info']['joins'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['wordssaid'].'</td>
							<td>'.$t['info']['wordssaid'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['commandsdone'].'</td>
							<td>'.$t['info']['commandsdone'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['teleports'].'</td>
							<td>'.$t['info']['teleports'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['worldchange'].'</td>
							<td>'.$t['info']['worldchange'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['votes'].'</td>
							<td>'.$t['info']['votes'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['timeskicked'].'</td>
							<td>'.$t['info']['timeskicked'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['damagetaken'].'</td>
							<td>'.$t['info']['damagetaken'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['toolsbroken'].'</td>
							<td>'.$t['info']['toolsbroken'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['itemscrafted'].'</td>
							<td>'.$t['info']['itemscrafted'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['omnomnom'].'</td>
							<td>'.$t['info']['omnomnom'].'</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	
		<div class="ym-g50 ym-gr">
			<div class="ym-gbox-right">
				<h6>'.$lng['general']['title'].'</h6>
				<table>
					<thead>
						<th>'.$lng['misc']['title'].'</th>
						<th>'.$lng['misc']['value'].'</th>
					</thead>
					<tbody>
						<tr>
							<td>'.$lng['general']['xpgained'].'</td>
							<td>'.$t['info']['xpgained'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['arrows'].'</td>
							<td>'.$t['info']['arrows'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['fishcatched'].'</td>
							<td>'.$t['info']['fishcatched'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['eggsthrown'].'</td>
							<td>'.$t['info']['eggsthrown'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['bucketfill'].'</td>
							<td>'.$t['info']['bucketfill'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['bucketempty'].'</td>
							<td>'.$t['info']['bucketempty'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['itempickups'].'</td>
							<td>'.$t['info']['itempickups'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['itemdrops'].'</td>
							<td>'.$t['info']['itemdrops'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['onfire'].'</td>
							<td>'.$t['info']['onfire'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['bedenter'].'</td>
							<td>'.$t['info']['bedenter'].'</td>
						</tr>
						<tr>
							<td>'.$lng['general']['shear'].'</td>
							<td>'.$t['info']['shear'].'</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<h6>Blockstatistiken</h6>
	<p class="box info">Beta, Beta =)<p>
	<table>
		<thead>
			<th>Icon</th>
			<th>Name</th>
			<th>Gesetzt</th>
			<th>Abgebaut</th>
		</thead>
		<tbody>';
			
				for ($i = 1; $i <= 256; $i++) {
					$break = false;
					$set = false;
					$breakcount=0;
					$setcount=0;
					if(isset($i, $t['block']['break'][$i]) == true){
						$break=true;
						$breakcount = $t['block']['break'][$i];
					}
					if(isset($i, $t['block']['set'][$i]) == true){
						$set=true;
						$setcount = $t['block']['set'][$i];
					}
						
					if($break == true or $set == true){
						echo '<tr>
								<td><img src="assets/blocks/'.$i.'.png" width="32"></td>
								<td>'.$lng['block'][$i].'</td>
								<td>'.$setcount.'</td>
								<td>'.$breakcount.'</td>
							</tr>';
					}else{
						
					}
					
				}

			echo '
		</tbody>
	</table>
</div>
';