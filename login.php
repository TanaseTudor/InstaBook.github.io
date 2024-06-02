<?php
// Establish connection to the MySQL database (assuming you've set up the connection already)

session_start(); // Start session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the login form
    $username = $_POST['username'];
    $password = $_POST['password']; // Note: You should hash the password before comparing it with the one stored in the database

    // Query the database to check if the username and password match
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful, set session variables
        $_SESSION['username'] = $username;
        // Redirect to a dashboard or home page
        header("Location: dashboard.php");
        exit();
    } else {
        // Login failed, redirect back to login page with error message
        header("Location: login.html?error=1");
        exit();
    }
}

// Close the database connection
$conn->close();
?>
