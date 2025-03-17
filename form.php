<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// RDS MySQL connection details
$servername = "my-database.cq988i4is2bf.us-east-1.rds.amazonaws.com";  // Replace with your RDS endpoint (e.g., mydb.abcdefg.us-west-1.rds.amazonaws.com)
$username = "root";     // Replace with your RDS database username
$password = "password1234";     // Replace with your RDS database password
$dbname = "my-database";           // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Prepare and bind SQL query
    $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute query and check success
    if ($stmt->execute()) {
        echo "Thank you, $name! Your message has been received.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
