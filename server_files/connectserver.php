<?php

$servername = "localhost";
$username = "moshcplo_arpm";
$password = '3v.2ryGQ3jF9';
$dbname = "moshcplo_arpm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "Database Communicatoin Error, Server in Maintainance, Call us immediately to solve this issue +447456289388.";
    die("Connection failed: " . $conn->connect_error);
    exit();
}

