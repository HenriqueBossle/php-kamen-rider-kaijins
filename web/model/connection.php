<?php



$hostname = "127.0.0.1";
$username = "root";
$password = "12345";
$databank = "kaijin";

$mysqli = new mysqli($hostname, $username, $password, $databank);
if ($mysqli->connect_errno) {
    echo "Falha: " . $mysqli -> connect_error;
    exit();
}
