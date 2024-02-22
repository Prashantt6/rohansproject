<?php
// Establish a connection to the MySQL database
$servername = "localhost"; // Replace with your database host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "customerdata";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $expiryMonth = $_POST["expiryMonth"];
    $expiryYear = $_POST["expiryYear"];

    // SQL query to insert data into the "payments" table
    $sql = "INSERT INTO payments (name, email, expiryMonth, expiryYear) VALUES ('$name', '$email', '$expiryMonth', '$expiryYear')";

    if ($conn->query($sql) === TRUE) {
        echo "Payment data stored successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>