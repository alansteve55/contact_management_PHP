<?php
include 'config.php';
include 'functions.php';

$name = $email = $phone = $address = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    // Validate and add contact
    $result = addContact($conn, $name, $email, $phone, $address);
    if ($result === true) {
        header("Location: index.php");
        exit();
    } else {
        $error = $result;
    }
}
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
    <script src="script.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Add New Contact</h1>
        
        <form action="add_contact.php" method="post" onsubmit="return validateAddContactForm()">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <button type="submit" class="btn btn-primary me-2">Add Contact</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
