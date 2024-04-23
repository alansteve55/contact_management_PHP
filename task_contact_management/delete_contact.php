<?php

include 'config.php';
include 'functions.php';

// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if (deleteContact($conn, $id)) {
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error deleting contact";
    }
} else {
    echo "Contact ID not provided.";
}
?>
