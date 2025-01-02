<?php
session_start();

// Check if the user is already logged in
if(isset($_SESSION['user_id'])) {
    // If logged in, redirect to a different page (e.g., dashboard)
    header("Location: AboutUs.html");
    exit();
}

// Function to sanitize input to prevent SQL injection
function sanitize_input($connection, $input) {
    return mysqli_real_escape_string($connection, htmlspecialchars($input));
}

// Database connection parameters
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your database username
$password = "avamina1"; // Replace with your database password
$dbname = "Web_Database"; // Replace with your database name

// Create database connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $username = sanitize_input($connection, $_POST['username']);
    $password = sanitize_input($connection, $_POST['password']);

    // Query the database to check the user credentials and role
    // You may need to replace 'users' with your actual table name
    $query = "SELECT * FROM users WHERE username='$username' AND pin='$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        // User found, set session variables
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['username'];
        $_SESSION['role'] = $user['job_type']; // Assuming role is stored in the database
        // var_dump($_SESSION['user_id']);
        header("Location: homepage.html"); // Redirect to dashboard or any other page
        exit();
    } else {
        // Invalid credentials
        // Handle error (e.g., display an error message)
        echo "Invalid username or password";
    }
}

// Close database connection
mysqli_close($connection);
?>
