<?php
// Check if the ID is provided in the POST request
if(isset($_POST['id'])) {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "avamina1";
    $database = "Web_Database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the ID from the POST request
    $id = $_POST['id'];

    // Update the name in the database for the corresponding ID
    $sql = "UPDATE Ma5domen SET first_name = CONCAT(first_name, '🗹') WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Success message
        echo "Name updated successfully!";
    } else {
        // Error message
        echo "Error updating name: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    // If ID is not provided in the POST request
    echo "ID not provided!";
}
?>
