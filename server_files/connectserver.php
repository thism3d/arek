<?php

$servername = "localhost";
$username = "dbu582390";
$password = '#Muzahid221';
$dbname = "dbs13046608";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "Database Communicatoin Error, Server in Maintainance, Call us immediately to solve this issue +447456289388.";
    die("Connection failed: " . $conn->connect_error);
    exit();
}
