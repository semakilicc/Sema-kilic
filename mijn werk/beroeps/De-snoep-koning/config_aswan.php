<?php

$db_hostname = 'localhost';
$db_username = 'db_85124';
$db_password = 'E36fk9MV';
$db_database = 'aswanleerjaar2';

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (!$mysqli) {
    echo "FOUT geen connectie naar database. <br>";
    echo "Errno: " . mysqli_connect_errno() . "<br>";
    echo "Error: " . mysqli_connect_error() . "<br>";
    exit;
}

error_reporting(E_ALL);
ini_set('display_errors', '1');
