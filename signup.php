<?php
// Establish connection to the MySQL database (assuming you've set up the connection already)

// Get username and password from the signup form
$username = $_POST['username'];
$password = $_POST['password']; // Note: You should hash this password before storing it in the database for security reasons

// Insert signup data into the database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Signup successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
