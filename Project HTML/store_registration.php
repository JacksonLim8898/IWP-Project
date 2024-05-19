<?php
// Connect to your database (replace with your database credentials)
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

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO customers (fullname, email, password, phone, address) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $fullname, $email, $password, $phone, $address);

// Set parameters and execute
$fullname = $_POST["fullname"];
$email = $_POST["email"];
$password = $_POST["password"]; // NOTE: You should hash the password for security
$phone = $_POST["phone"];
$address = $_POST["address"];

$stmt->execute();

echo "Registration successful!";

$stmt->close();
$conn->close();
?>
