<?php

$db_con=mysql_connect($db_server,$db_user, $db_pass) or die("Ups... Datenbankserver konnte nicht verbunden werden =O");
mysql_select_db($db_database,$db_con) or die("Oha... Datenbank konnte nicht gew&auml;hlt werden =O");

