<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBNme = "loginsystem";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBNme);

if (!$conn) {
    die("Connection failed: ".mysql_connect_error());
}