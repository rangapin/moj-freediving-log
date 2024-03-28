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
                VALUES (:date, :location, :dive_time, :depth, :discipline, :dive_type, :dive_buddy, :water_temperature, :notes, :overall_score)";
        
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
            ':overall_score' => $overall_score
        ));

        echo "New dive record created successfully";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage(); // Output error message if an exception occurs
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Dive - Freediving Training Log</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 flex-shrink-0">
            <div class="p-4">
                <h1 class="text-2xl font-semibold">Freediving Log</h1>
                <!-- Tabs -->
                <ul class="mt-6">
                    <li><a href="add-dive.php" class="block py-2 px-4 text-sm hover:bg-gray-700">Add a Dive</a></li>
                    <!-- Add other tabs here -->
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h2 class="text-3xl font-semibold mb-4">Add a Dive</h2>

            <!-- Dive Form -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <form action="add-dive.php" method="POST" class="space-y-4">
                    <!-- Dive Date -->
                    <div>
                        <label for="dive_date">Date:</label>
                        <input type="date" id="dive_date" name="dive_date" class="border border-gray-300 rounded-md p-2 w-full">
                    </div>

                    <!-- Location -->
                    <div>
                        <label for="location">Location:</label>
                        <input type="text" id="location" name="location" class="border border-gray-300 rounded-md p-2 w-full">
                    </div>

                    <!-- Dive Time -->
                    <div>
                        <label for="dive_time">Dive Time (in minutes):</label>
                        <input type="number" id="dive_time" name="dive_time" class="border border-gray-300 rounded-md p-2 w-full">
                    </div>

                    <!-- Depth -->
                    <div>
                        <label for="depth">Depth (in meters):</label>
                        <input type="number" id="depth" name="depth" class="border border-gray-300 rounded-md p-2 w-full">
                    </div>

                    <!-- Discipline -->
                    <div>
                        <label for="discipline">Discipline:</label>
                        <select id="discipline" name="discipline" class="border border-gray-300 rounded-md p-2 w-full">
                            <option value="FIM">FIM (Free Immersion)</option>
                            <option value="CWT">CWT (Constant Weight)</option>
                            <option value="CWTB">CWTB (Constant Weight with Bi-Fins)</option>
                            <option value="DNF">DNF (Dynamic No Fins)</option>
                        </select>
                    </div>

                    <!-- Dive Type -->
                    <div>
                        <label for="dive_type">Dive Type:</label>
                        <select id="dive_type" name="dive_type" class="border border-gray-300 rounded-md p-2 w-full">
                            <option value="fun">Fun</option>
                            <option value="training">Training</option>
                            <option value="competition">Competition</option>
                        </select>
                    </div>

                    <!-- Dive Buddy -->
                    <div>
                        <label for="dive_buddy">Dive Buddy:</label>
                        <input type="text" id="dive_buddy" name="dive_buddy" class="border border-gray-300 rounded-md p-2 w-full">
                    </div>

                    <!-- Water Temperature -->
                    <div>
                        <label for="water_temperature">Water Temperature (in °C):</label>
                        <input type="number" id="water_temperature" name="water_temperature" class="border border-gray-300 rounded-md p-2 w-full">
                    </div>

                    <!-- Notes -->
                    <div>
                        <label for="notes">Notes:</label>
                        <textarea id="notes" name="notes" rows="3" class="border border-gray-300 rounded-md p-2 w-full"></textarea>
                    </div>

                    <!-- Overall Score -->
                    <div>
                        <label for="overall_score">Overall Score:</label>
                        <input type="number" id="overall_score" name="overall_score" class="border border-gray-300 rounded-md p-2 w-full">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
                </form>
            </div>

            <!-- Dive Chart -->
            <div class="mt-8 bg-white p-4 rounded-lg shadow-md">
                <!-- Include your dive chart here -->
            </div>
        </div>
    </div>

</body>
</html>
