<?php
// database logingegevens
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'portfolio';

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (!$mysqli) {
    echo "FOUT geen connectie naar database. <br>";
    echo "Errno: " . mysqli_connect_errno() . "<br>";
    echo "Error: " . mysqli_connect_error() . "<br>";
    exit;
}

error_reporting(E_ALL);
ini_set('display_errors', '1');