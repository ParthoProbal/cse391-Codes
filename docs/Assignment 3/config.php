<?php

$hostName = "sql212.infinityfree.com";
$dbUser = "if0_42276667";          
$dbPassword = "XIpXjK4pEnt";         
$dbName = "if0_42276667_car_mechanic";


$dbConnection = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);


if (!$dbConnection) {
    
    die("Database connection failed: " . mysqli_connect_error());
}


mysqli_set_charset($dbConnection, "utf8");
?>