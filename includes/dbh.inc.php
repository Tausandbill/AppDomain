<?php

$servername = 'localhost';
$dBUsername = 'id12344163_root';//for localhost this is "root"
$dBPassword = 'kennesaw123';//for localhost this is "(empty if you are using phpMyadmin)"
$dBNme = 'id12344163_appdomain';//for localhost this is "(the name you give to your local database)"

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBNme);

if (!$conn) {
    echo "Not connected";
    die("Connection failed: ".mysql_connect_error());
}