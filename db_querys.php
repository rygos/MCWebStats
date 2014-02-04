<?php
//Home (Top 5)
$sql['t5playtime'] = 'SELECT stats_player.*, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY stats_player.player_id ORDER BY playtime DESC LIMIT 5';
$sql['t5run'] = 'SELECT stats_player.*, stats_players.*, stats_move.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id INNER JOIN stats_move ON stats_player.player_id = stats_move.player_id WHERE type=0 GROUP BY stats_player.player_id ORDER BY distance DESC LIMIT 5';
$sql['t5kill'] = 'SELECT stats_players.name , sum(stats_kill.amount) as killcount FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id INNER JOIN stats_kill ON stats_player.player_id = stats_kill.player_id GROUP BY stats_kill.player_id ORDER BY killcount DESC LIMIT 5';
$sql['t5eat'] = 'SELECT stats_player.*, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY stats_player.player_id ORDER BY omnomnom DESC LIMIT 5';
$sql['t5break'] = 'SELECT stats_players.name, stats_players.*, sum(stats_block.amount) AS blockcount FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id INNER JOIN stats_block ON stats_player.player_id = stats_block.player_id WHERE break = 1 GROUP BY stats_block.player_id ORDER BY blockcount DESC LIMIT 5';
$sql['t5set'] = 'SELECT stats_players.name, stats_players.*, sum(stats_block.amount) AS blockcount FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id INNER JOIN stats_block ON stats_player.player_id = stats_block.player_id WHERE break = 0 GROUP BY stats_block.player_id ORDER BY blockcount DESC LIMIT 5';

//************* Player
//Right Menu
$sql['playerrmenu'] = 'SELECT name FROM stats_players ORDER BY name';

//Global Player Stats (Top 10 Lists)
$sql['glob_playtime'] = "SELECT (sum(stats_player.playtime) / 60 / 60) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_move'] = "SELECT (sum(stats_move.distance) / 1000) as result, stats_players.* FROM stats_move INNER JOIN stats_players ON stats_move.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_joins'] = "SELECT (sum(stats_player.joins)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_wordssaid'] = "SELECT (sum(stats_player.wordssaid)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_commandsdone'] = "SELECT (sum(stats_player.commandsdone)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_worldchange'] = "SELECT (sum(stats_player.worldchange)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_timeskicked'] = "SELECT (sum(stats_player.timeskicked)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_damagetaken'] = "SELECT (sum(stats_player.damagetaken)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_toolsbroken'] = "SELECT (sum(stats_player.toolsbroken)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_itemscrafted'] = "SELECT (sum(stats_player.itemscrafted)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_omnomnom'] = "SELECT (sum(stats_player.omnomnom)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_xpgained'] = "SELECT (sum(stats_player.xpgained)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_arrows'] = "SELECT (sum(stats_player.arrows)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_fishcatched'] = "SELECT (sum(stats_player.fishcatched)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_bucketfill'] = "SELECT (sum(stats_player.bucketfill)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_bucketempty'] = "SELECT (sum(stats_player.bucketempty)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_itempickups'] = "SELECT (sum(stats_player.itempickups) / 1000) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_itemdrops'] = "SELECT (sum(stats_player.itemdrops)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_onfire'] = "SELECT (sum(stats_player.onfire)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_bedenter'] = "SELECT (sum(stats_player.bedenter)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";
$sql['glob_shear'] = "SELECT (sum(stats_player.shear)) as result, stats_players.* FROM stats_player INNER JOIN stats_players ON stats_player.player_id = stats_players.player_id GROUP BY player_id ORDER BY result DESC LIMIT 10";

//Player Info
$sql['pi_playertbl'] = "SELECT * FROM stats_players WHERE name = ?";
$sql['pi_move'] = "SELECT * FROM stats_move WHERE player_id = ? AND world = ? ORDER BY type ASC";
$sql['pi_glob'] = "SELECT * FROM stats_player WHERE player_id = ? AND world = ?";
$sql['pi_block'] = "SELECT * FROM stats_block WHERE player_id = ? AND world = ?";
$sql['pi_kill'] = "SELECT * FROM stats_kill WHERE player_id = ? AND world = ?";

//Server Info
$sql['srv_move'] = "SELECT *, sum(stats_move.distance) AS dist FROM stats_move WHERE world = ? GROUP BY type ASC";
$sql['srv_glob'] = "SELECT sum(playtime), sum(arrows), sum(xpgained), sum(joins), sum(fishcatched), sum(damagetaken), sum(timeskicked), sum(toolsbroken), sum(eggsthrown), sum(itemscrafted), sum(omnomnom), sum(onfire), sum(wordssaid), sum(commandsdone), sum(votes), sum(teleports), sum(itempickups), sum(bedenter), sum(bucketfill), sum(bucketempty), sum(worldchange), sum(itemdrops), sum(shear) FROM stats_player WHERE world = ? GROUP BY world";
$sql['srv_block'] = "SELECT *, sum(amount) FROM stats_block WHERE world = ? AND break = ? GROUP BY blockID";
$sql['srv_kill'] = "SELECT *, sum(amount) FROM stats_kill WHERE  world = ? GROUP BY type";
