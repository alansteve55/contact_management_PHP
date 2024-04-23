<?php
include 'config.php';

// Function to retrieve all contacts from the database
function getContacts($conn) {
    $sql = "SELECT * FROM contacts";
    $result = $conn->query($sql);
    $contacts = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $contacts[] = $row;
        }
    }
    return $contacts;
}

// Function to add a new contact to the database
function addContact($conn, $name, $email, $phone, $address) {
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    }

    // Validate phone number format (10 digits)
    if (!preg_match('/^\d{10}$/', $phone)) {
        return "Invalid phone number format";
    }
    
    // SQL query to insert new contact
    $sql = "INSERT INTO contacts (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
    if ($conn->query($sql) === TRUE) {
        return true; 
    } else {
        // Check for duplicate entry error
        if ($conn->errno == 1062) {
            return false; 
        } else {
            echo "Error: " . $conn->error; 
            return false;
        }
    }
}

// Function to update an existing contact in the database
function updateContact($conn, $id, $name, $email, $phone, $address) {
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    }

    // Validate phone number format (10 digits)
    if (!preg_match('/^\d{10}$/', $phone)) {
        return "Invalid phone number format";
    }
    
    // SQL query to update contact
    $sql = "UPDATE contacts SET name='$name', email='$email', phone='$phone', address='$address' WHERE id=$id";
    return $conn->query($sql);
}

// Function to delete a contact from the database
function deleteContact($conn, $id) {
    $sql = "DELETE FROM contacts WHERE id=$id";
    return $conn->query($sql);
}
?>
