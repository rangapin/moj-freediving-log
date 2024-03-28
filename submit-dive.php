<?php
// Include the db.php file to establish a database connection
include "inc/db.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $dive_date = $_POST["dive_date"];
    $location = $_POST["location"];
    $dive_time = $_POST["dive_time"];
    $depth = $_POST["depth"];
    $discipline = $_POST["discipline"];
    $dive_type = $_POST["dive_type"];
    $dive_buddy = $_POST["dive_buddy"];
    $water_temperature = $_POST["water_temperature"];
    $notes = $_POST["notes"];
    $overall_score = $_POST["overall_score"];

    // Prepare and execute SQL query to insert dive data into the database
    $sql = "INSERT INTO dives (date, location, dive_time, depth, discipline, dive_type, dive_buddy, water_temperature, notes, overall_score) 
            VALUES ('$dive_date', '$location', '$dive_time', '$depth', '$discipline', '$dive_type', '$dive_buddy', '$water_temperature', '$notes', '$overall_score')";

    if ($conn->query($sql) === TRUE) {
        echo "New dive record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Form submission failed. Please try again.";
}

// Close the database connection
?>
