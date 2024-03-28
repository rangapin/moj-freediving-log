<?php
// Include the db.php file to establish a database connection
include "inc/db.php";

// Check if the dive ID is provided in the URL parameters
if(isset($_GET['id'])) {
    // Retrieve the dive ID from the URL parameters
    $dive_id = $_GET['id'];

    // Check if the form is submitted
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

        // Prepare and execute SQL query to update the dive record in the database
        $sql = "UPDATE dives SET 
                date = :date, 
                location = :location, 
                dive_time = :dive_time, 
                depth = :depth, 
                discipline = :discipline, 
                dive_type = :dive_type, 
                dive_buddy = :dive_buddy, 
                water_temperature = :water_temperature, 
                notes = :notes, 
                overall_score = :overall_score 
                WHERE id = :id";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':date' => $dive_date,
            ':location' => $location,
            ':dive_time' => $dive_time,
            ':depth' => $depth,
            ':discipline' => $discipline,
            ':dive_type' => $dive_type,
            ':dive_buddy' => $dive_buddy,
            ':water_temperature' => $water_temperature,
            ':notes' => $notes,
            ':overall_score' => $overall_score,
            ':id' => $dive_id
        ));

        // Redirect the user back to the view dives page after editing
        header("Location: view-dive.php");
        exit();
    } else {
        // Fetch the dive record from the database based on the provided ID
        $sql = "SELECT * FROM dives WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $dive_id]);
        $dive = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the dive record exists
        if (!$dive) {
            // Redirect the user to the view dives page if the dive record does not exist
            header("Location: view-dive.php");
            exit();
        }
    }
} else {
    // If no dive ID is provided, redirect the user to the view dives page
    header("Location: view-dive.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dive - Freediving Training Log</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <div class="flex h-screen">

        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 flex-shrink-0">
            <div class="p-4">
                <h1 class="text-2xl font-semibold">Freediving Log</h1>
                <!-- Tabs -->
                <ul class="mt-6">
                    <li><a href="add-dive.php" class="block py-2 px-4 text-sm hover:bg-gray-700">Add a Dive</a></li>
                    <li><a href="view-dive.php" class="block py-2 px-4 text-sm hover:bg-gray-700">My Dives</a></li>
                    <li><a href="view-session.php" class="block py-2 px-4 text-sm hover:bg-gray-700">My Sessions</a></li>
                    <li><a href="#" class="block py-2 px-4 text-sm hover:bg-gray-700">My Profile</a></li>
                    <li><a href="#" class="block py-2 px-4 text-sm hover:bg-gray-700">Log Out</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h2 class="text-3xl font-semibold mb-4">Edit Dive</h2>

            <!-- Edit Dive Form -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <form action="edit-dive.php?id=<?php echo $dive['id']; ?>" method="POST" class="space-y-4">
                    <!-- Dive Chart -->
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Date -->
                        <div>Date:</div>
                        <div><input type="date" name="dive_date" value="<?php echo $dive['date']; ?>" class="border border-gray-300 rounded-md p-2 w-full"></div>
                        <!-- Location -->
                        <div>Location:</div>
                        <div><input type="text" name="location" value="<?php echo $dive['location']; ?>" class="border border-gray-300 rounded-md p-2 w-full"></div>
                        <!-- Dive Time -->
                        <div>Dive Time (in minutes):</div>
                        <div><input type="number" name="dive_time" value="<?php echo $dive['dive_time']; ?>" class="border border-gray-300 rounded-md p-2 w-full"></div>
                        <!-- Depth -->
                        <div>Depth (in meters):</div>
                        <div><input type="number" name="depth" value="<?php echo $dive['depth']; ?>" class="border border-gray-300 rounded-md p-2 w-full"></div>
                        <!-- Discipline -->
                        <div>Discipline:</div>
                        <div><input type="text" name="discipline" value="<?php echo $dive['discipline']; ?>" class="border border-gray-300 rounded-md p-2 w-full"></div>
                        <!-- Dive Type -->
                        <div>Dive Type:</div>
                        <div><input type="text" name="dive_type" value="<?php echo $dive['dive_type']; ?>" class="border border-gray-300 rounded-md p-2 w-full"></div>
                        <!-- Dive Buddy -->
                        <div>Dive Buddy:</div>
                        <div><input type="text" name="dive_buddy" value="<?php echo $dive['dive_buddy']; ?>" class="border border-gray-300 rounded-md p-2 w-full"></div>
                        <!-- Water Temperature -->
                        <div>Water Temperature (in °C):</div>
                        <div><input type="number" name="water_temperature" value="<?php echo $dive['water_temperature']; ?>" class="border border-gray-300 rounded-md p-2 w-full"></div>
                        <!-- Notes -->
                        <div>Notes:</div>
                        <div><textarea name="notes" rows="3" class="border border-gray-300 rounded-md p-2 w-full"><?php echo $dive['notes']; ?></textarea></div>
                        <!-- Overall Score -->
                        <div>Overall Score:</div>
                        <div><input type="number" name="overall_score" value="<?php echo $dive['overall_score']; ?>" class="border border-gray-300 rounded-md p-2 w-full"></div>
                    </div>
                    <!-- Submit Button -->
                    <div class="text-right">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update Dive</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

