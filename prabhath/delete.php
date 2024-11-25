<?php
require 'config.php'; // Include the database connection file

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the ID and ensure it's an integer

    // Prepare the delete statement
    $delete_sql = "DELETE FROM feedbacks WHERE Id = ?";
    $stmt = $con->prepare($delete_sql);
    $stmt->bind_param("i", $id); // Bind the ID parameter

    if ($stmt->execute()) {
        // Redirect back to read.php after successful deletion
        header("Location: read.php");
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No ID provided.";
}

// Close the database connection
$con->close();
?>
