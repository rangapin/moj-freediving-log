<?php
// Include the db.php file to establish a database connection
include "inc/db.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Dives - Freediving Training Log</title>
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
            <h2 class="text-3xl font-semibold mb-4">My Dives</h2>

            <!-- Dives Table -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Dive Number</th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Location</th>
                            <th class="px-4 py-2">Dive Time (min)</th>
                            <th class="px-4 py-2">Depth (m)</th>
                            <th class="px-4 py-2">Discipline</th>
                            <th class="px-4 py-2">Dive Type</th>
                            <th class="px-4 py-2">Dive Buddy</th>
                            <th class="px-4 py-2">Water Temp (°C)</th>
                            <th class="px-4 py-2">Notes</th>
                            <th class="px-4 py-2">Overall Score</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dives as $dive): ?>
                        <tr>
                            <td class="px-4 py-2"><?php echo $dive['dive_number']; ?></td>
                            <td class="px-4 py-2"><?php echo $dive['date']; ?></td>
                            <td class="px-4 py-2"><?php echo $dive['location']; ?></td>
                            <td class="px-4 py-2"><?php echo $dive['dive_time']; ?></td>
                            <td class="px-4 py-2"><?php echo $dive['depth']; ?></td>
                            <td class="px-4 py-2"><?php echo $dive['discipline']; ?></td>
                            <td class="px-4 py-2"><?php echo $dive['dive_type']; ?></td>
                            <td class="px-4 py-2"><?php echo $dive['dive_buddy']; ?></td>
                            <td class="px-4 py-2"><?php echo $dive['water_temperature']; ?></td>
                            <td class="px-4 py-2"><?php echo $dive['notes']; ?></td>
                            <td class="px-4 py-2"><?php echo $dive['overall_score']; ?></td>
                            <td class="px-4 py-2">
                                <a href="edit_dive.php?id=<?php echo $dive['id']; ?>" class="text-blue-500">Edit</a>
                                <a href="delete_dive.php?id=<?php echo $dive['id']; ?>" class="text-red-500 ml-2">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
