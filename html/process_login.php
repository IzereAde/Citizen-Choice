<?php
session_start();

// Database connection
$host = 'localhost';
$dbname = 'mvp';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $conn->real_escape_string($_POST['email']);
$password_input = $_POST['password'];

// Fetch admin by email
$sql = "SELECT * FROM admins WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $admin = $result->fetch_assoc();

    // Verify password
    if (password_verify($password_input, $admin['password'])) {
        // Password matches — create session
        $_SESSION['admin_id'] = $admin['admin_id'];
        $_SESSION['admin_name'] = $admin['admin_name'];

        
        header("Location: admin_dashboard.php"); // Redirect to admin dashboard if exists
        exit();
    } else {
        echo "Invalid email or password.";
    }
} else {
    echo "Invalid email or password.";
}

$conn->close();
?>
