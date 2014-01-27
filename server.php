<?php
include('get_playerinfo.php');

$temp = getPlayerInfo('peppels-welt', 'PPHammer83');


echo "<pre>";
print_r($temp);
echo "</pre>";
