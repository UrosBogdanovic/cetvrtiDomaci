<?php
$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "test";

$db = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db) or die(mysqli_error($db));