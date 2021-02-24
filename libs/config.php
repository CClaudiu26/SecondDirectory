<?php

$dbServername = "eu-cdbr-west-03.cleardb.net";
$dbUsername = "bf6a4232071198";
$dbPassword = "b37bf9df";
$dbName = "heroku_eaf36263e6f5538";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }

?>
