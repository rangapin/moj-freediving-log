<?php
// Include the db.php file to establish a database connection
include "inc/db.php";

// Check if the dive ID is provided in the URL parameters
if(isset($_GET['id'])) {
    // Retrieve the dive ID from the URL parameters
    $dive_id = $_GET['id'];

    // Prepare and execute SQL query to delete the dive record from the database
    $sql = "DELETE FROM dives WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $dive_id]);

    // Redirect the user back to the view dives page after deletion
    header("Location: view-dive.php");
    exit();
} else {
    // If no dive ID is provided, redirect the user to the view dives page
    header("Location: view-dive.php");
    exit();
}
?>
