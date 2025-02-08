<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "wms-pcc";


$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo "Failed to connect to DB: ". $conn->connect_error;
}