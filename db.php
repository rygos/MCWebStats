<?php

try {
$dbh = new PDO('mysql:host='.$db_server.';dbname='.$db_database.'', $db_user, $db_pass,
      array(PDO::ATTR_PERSISTENT => true));

} catch (Exception $e) {
  die("Unable to connect: " . $e->getMessage());
}
