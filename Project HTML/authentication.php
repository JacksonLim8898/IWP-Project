<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform authentication (This is just a basic example)
    // You should implement more secure authentication methods like hashing the password
    if ($email === 'example@example.com' && $password === 'password') {
        // Authentication successful
        echo "Welcome, $email!";
    } else {
        // Authentication failed
        echo "Invalid email or password.";
    }
}
?>
