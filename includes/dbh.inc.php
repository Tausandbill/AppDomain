<?php

$servername = 'localhost';
$dBUsername = 'root';//for localhost this is "root"
$dBPassword = '';//for localhost this is "(empty if you are using phpMyadmin)"
$dBNme = 'app_domain';//for localhost this is "(the name you give to your local database)"

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBNme);

if (!$conn) {
    echo "Not connected";
    die("Connection failed: ".mysql_connect_error());
}