<?php
// Include necessary files for database connection and functions
include 'config.php';
include 'functions.php';

// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    // Get the contact ID from the URL parameter
    $id = $_GET['id'];
    
    // Attempt to delete the contact using the deleteContact function
    if (deleteContact($conn, $id)) {
        // If contact deletion is successful, redirect to the index page
        header("Location: index.php");
        exit(); // Terminate the script to prevent further execution
    } else {
        // If an error occurs during contact deletion, display an error message
        echo "Error deleting contact";
    }
} else {
    // If the 'id' parameter is not provided in the URL, display a message indicating so
    echo "Contact ID not provided.";
}
?>
