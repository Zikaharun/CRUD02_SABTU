<?php

$server = "localhost";
$user = "root";
$pass = "rooting";
$database = "crud02_sabtu";

$connect = new mysqli($server, $user,$pass,$database);

if ($connect-> connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

?>


