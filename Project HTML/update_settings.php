<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Retrieve user details from session
$user = $_SESSION['user'];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Update user details in the database (This is just a basic example)
    // You should perform proper validation and sanitization of user inputs
    // and use prepared statements to prevent SQL injection attacks

    // Assuming you have a MySQL database connection
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "your_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=" . $user['id'];

    if ($conn->query($sql) === TRUE) {
        // Update successful
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['phone'] = $phone;
        echo "Settings updated successfully!";
    } else {
        // Error updating user details
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
