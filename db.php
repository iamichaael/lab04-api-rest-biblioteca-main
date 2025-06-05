<?php

require 'config.php';

$host = $config ['host'];
$username = $config['username'];
$password = $config['password'];
$database = $config['database'];
$mysqli = new mysqli($host, $username, $password, $database);

if($mysqli->connect_error){
    die("Connection failed: " .$mysqli->connect_error);
}

return $mysqli;
