<?php
// Database connection parameters
$servername = "localhost"; // The hostname of the database server
$username = "root"; // The username to access the database
$password = ""; // The password to access the database (if any)
$database = "contact_manager"; // The name of the database to connect to

// Create a new MySQLi connection object
$conn = new mysqli($servername, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    // If connection fails, display an error message and terminate the script
    die("Connection failed: " . $conn->connect_error);
}
?>
