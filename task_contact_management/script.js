// Function to validate email format
function validateEmail(email) {
    // Regular expression for email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Function to validate phone number format (10 digits)
function validatePhone(phone) {
    // Regular expression for phone number validation (10 digits)
    const phoneRegex = /^\d{10}$/;
    return phoneRegex.test(phone);
}

// Function to validate the add contact form
function validateAddContactForm() {
    // Get form field values
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const address = document.getElementById("address").value;

    // Validate email format
    if (!validateEmail(email)) {
        alert("Invalid email format");
        return false;
    }

    // Validate phone number format (10 digits)
    if (!validatePhone(phone)) {
        alert("Phone number must contain 10 digits");
        return false;
    }

    // All validations passed
    return true;
}

// Function to validate the edit contact form
function validateEditContactForm() {
    // Get form field values
    var name = document.getElementById('name').value.trim();
    var email = document.getElementById('email').value.trim();
    var phone = document.getElementById('phone').value.trim();
    var address = document.getElementById('address').value.trim();
    var phonePattern = /^\d{10}$/;

    // Check if name is filled out
    if (name === "") {
        alert("Name must be filled out");
        return false;
    }

    // Check if email is filled out and in correct format
    if (email === "") {
        alert("Email must be filled out");
        return false;
    }

    if (!validateEmail(email)) {
        alert("Invalid email format");
        return false;
    }

    // Check if phone is filled out and contains 10 digits
    if (phone === "") {
        alert("Phone must be filled out");
        return false;
    }

    if (!phonePattern.test(phone)) {
        alert("Phone number must contain 10 digits");
        return false;
    }

    // Check if address is filled out
    if (address === "") {
        alert("Address must be filled out");
        return false;
    }

    // All validations passed
    return true;
}

// Function to redirect to edit_contact.php with contact ID
function editContact(id) {
    window.location.href = "edit_contact.php?id=" + id;
}

// Function to prompt confirmation before redirecting to delete_contact.php with contact ID
function deleteContact(id) {
    if (confirm('Are you sure you want to delete this contact?')) {
        window.location.href = "delete_contact.php?id=" + id;
    }
}

// Function to redirect to add_contact.php for adding new contact
function addNewContact() {
    window.location.href = "add_contact.php";
}
