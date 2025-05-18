<?php
// Database connection
$host = 'localhost';
$dbname = 'mvp';
$username = 'root';
$password = '';

// Connect to DB
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and fetch form inputs
$full_name = $conn->real_escape_string($_POST['full_name']);
$email = $conn->real_escape_string($_POST['email']);
$password_plain = $_POST['password'];
$agency_id = (int)$_POST['agency_id'];

// Hash the password
$password_hash = password_hash($password_plain, PASSWORD_DEFAULT);

// Insert into database
$sql = "INSERT INTO admins (`agencie_id`, `admin_name`, `email`, `password`, `created_at`) 
        VALUES ('$agency_id', '$full_name', '$email', '$password_hash', now())";

if ($conn->query($sql) === TRUE) {
    header("location:authentication-login.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
