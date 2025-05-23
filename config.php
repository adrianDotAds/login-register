<?php

$host = 'fdb1028.awardspace.net';
$port = 3306; 
$user = '4637988_grin';
$password = 'bawalsabihin101';
$database = '4637988_grin';

$connection = new mysqli($host, $user, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

?>