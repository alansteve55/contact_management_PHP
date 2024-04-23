<?php
include 'config.php';
include 'functions.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    // Update the contact in the database
    if (updateContact($conn, $id, $name, $email, $phone, $address)) {
        // Redirect to the index page after successful update
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating contact";
    }
} else {
    // If the request method is not POST, retrieve contact details for editing
    $id = $_GET['id'];
    $sql = "SELECT * FROM contacts WHERE id=$id";
    $result = $conn->query($sql);
    $contact = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Edit Contact</h1>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateEditContactForm()">
            <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">
            
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $contact['name']; ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $contact['email']; ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $contact['phone']; ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $contact['address']; ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
