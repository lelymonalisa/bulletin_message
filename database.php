<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

// Support Heroku JawsDB or ClearDB via environment variable
$db_url = getenv('JAWSDB_URL') ?? getenv('CLEARDB_DATABASE_URL');

if ($db_url) {
    $url = parse_url($db_url);
    $hostName = $url['host'];
    $dbUser   = $url['user'];
    $dbPassword = $url['pass'];
    $dbName   = ltrim($url['path'], '/');
    $port     = isset($url['port']) ? $url['port'] : 3306;
    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName, $port);
} else {
    // Local development fallback
    $hostName = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "message_bulleting";
    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>