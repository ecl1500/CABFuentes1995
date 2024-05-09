<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // **Store password securely!** (e.g., using environment variables)
$dbname = "cabfuentes95";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user's ID and PIN from the login form
$id = $_POST['id'];
$pin = $_POST['pin'];

// Prepare a SQL statement to select the user from the `usuario` table
$stmt = $conn->prepare("SELECT * FROM usuario WHERE ID = ? AND pin = ?;");

// Bind the user's ID and PIN to the statement
$stmt->bind_param("is", $id, $pin);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows > 0) {
    // User exists, redirect to the dashboard
    header("Location: logueado.html");
} else {
    // User does not exist, show an error message
    echo "Invalid ID or PIN.";
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>