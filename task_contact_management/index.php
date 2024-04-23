<?php
// Include necessary files
include 'config.php';
include 'functions.php';

// Fetch contacts from the database
$contacts = getContacts($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Manager</title>
    <!-- links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Contact Manager</h1>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Check if $contacts is set and not empty before looping through it
                if(isset($contacts) && !empty($contacts)):
                    foreach ($contacts as $contact): ?>
                        <tr>
                            <td><?php echo $contact['name']; ?></td>
                            <td><?php echo $contact['email']; ?></td>
                            <td><?php echo $contact['phone']; ?></td>
                            <td><?php echo $contact['address']; ?></td>
                            <td>
                                <button class="btn btn-primary" onclick="editContact(<?php echo $contact['id']; ?>)">Edit</button>
                                <button class="btn btn-danger" onclick="deleteContact(<?php echo $contact['id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach;
                else: ?>
                    <tr>
                        <td colspan="5">No contacts found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <button class="btn btn-success" onclick="addNewContact()">Add New Contact</button>
    </div>
    
    <!-- Footer -->
    <footer>
        <center>
            <p>This project is created by A. Alan Steve<br>April 2024</p>
        </center>
    </footer>
</body>
</html>
