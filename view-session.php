<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Session - Freediving Training Log</title>
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
            <h2 class="text-3xl font-semibold mb-4">View Session</h2>

            <!-- Session Details -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Session Details</h3>
                <div class="grid grid-cols-2 gap-4">
                    <!-- Date -->
                    <div class="font-semibold">Date:</div>
                    <div>Session Date</div>
                    <!-- Location -->
                    <div class="font-semibold">Location:</div>
                    <div>Session Location</div>
                    <!-- Amount of Dives -->
                    <div class="font-semibold">Amount of Dives:</div>
                    <div>Session Dive Count</div>
                    <!-- Deepest Dive -->
                    <div class="font-semibold">Deepest Dive (in meters):</div>
                    <div>Session Deepest Dive</div>
                    <!-- Longest Dive -->
                    <div class="font-semibold">Longest Dive (in minutes):</div>
                    <div>Session Longest Dive</div>
                    <!-- Dive Buddy -->
                    <div class="font-semibold">Dive Buddy:</div>
                    <div>Session Dive Buddy</div>
                    <!-- Water Temperature -->
                    <div class="font-semibold">Water Temperature (in °C):</div>
                    <div>Session Water Temperature</div>
                    <!-- Notes -->
                    <div class="font-semibold">Notes:</div>
                    <div>Session Notes</div>
                    <!-- Overall Score -->
                    <div class="font-semibold">Overall Score:</div>
                    <div>Session Overall Score</div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

