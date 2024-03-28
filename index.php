<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freediving Training Log - Dashboard</title>
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
            <h2 class="text-3xl font-semibold mb-4">Dashboard</h2>
            <div class="grid grid-cols-2 gap-8">
                <!-- Dive Chart -->
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Dive Chart</h3>
                    <!-- Placeholder for dive chart -->
                </div>
                <!-- Session Chart -->
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Session Chart</h3>
                    <!-- Placeholder for session chart -->
                </div>
            </div>
        </div>

    </div>

</body>
</html>

