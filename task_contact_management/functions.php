<?php
include 'config.php';

// Function to retrieve all contacts from the database
function getContacts($conn) {
    // SQL query to select all contacts
    $sql = "SELECT * FROM contacts";
    // Execute query
    $result = $conn->query($sql);
    $contacts = array();
    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Fetch each row and append it to the contacts array
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
    // Execute query
    if ($conn->query($sql) === TRUE) {
        return true; // Contact added successfully
    } else {
        // Check for duplicate entry error
        if ($conn->errno == 1062) {
            return false; // Duplicate entry for phone number
        } else {
            echo "Error: " . $conn->error; // Other database error
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
    // Execute query
    return $conn->query($sql);
}

// Function to delete a contact from the database
function deleteContact($conn, $id) {
    // SQL query to delete contact
    $sql = "DELETE FROM contacts WHERE id=$id";
    // Execute query
    return $conn->query($sql);
}
?>
