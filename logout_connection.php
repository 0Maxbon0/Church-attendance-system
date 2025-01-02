<?php
session_start();

// Function to logout the user
function logout() {
    // Unset all session variables
    $_SESSION = array();
    // Destroy the session
    session_destroy();
    // Redirect to the login page or any other page
    header("Location: login.html");
    exit();
}

// Call the logout function
logout();
?>
