<?php

$servername = "localhost"; // The hostname of the database server
$username = "root"; // The username to access the database
$password = ""; // The password to access the database 
$database = "contact_manager"; // The name of the database to connect to

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
