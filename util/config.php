<?php
########## Database Info ##########
$db_server = 'localhost';
$db_name = 'db100001';
$db_user = 'root';
$db_passwd = '';

########## READ DATA

// Create connection
$mysqli = new mysqli($db_server, $db_user, $db_passwd, $db_name);
if ($mysqli->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}
