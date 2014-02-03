<?php

$db_con=mysql_connect($db_server,$db_user, $db_pass) or die($lng['error']['dbcon']);
mysql_select_db($db_database,$db_con) or die($lng['error']['dbsel']);

