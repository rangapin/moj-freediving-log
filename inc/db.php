<?php

$hostname = "localhost"; // Change this to your database hostname
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "moj-freediving-log"; // Change this to your database name

try {
    // Create connection
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // echo "Connected successfully"; // Output message if connection successful
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); // Output error message if connection fails
}



