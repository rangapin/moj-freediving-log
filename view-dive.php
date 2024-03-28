<?php
// Include the db.php file to establish a database connection
include "inc/db.php";
include "inc/header.php";
include "inc/nav.php";


// Initialize the $dives array
$dives = [];

// Perform a SQL query to fetch dive records
$sql = "SELECT * FROM dives";
$stmt = $conn->query($sql);

// Check if dive records were found
if ($stmt && $stmt->rowCount() > 0) {
    // Fetch dive records and store them in the $dives array
    $dives = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Close the statement and database connection
$stmt = null;
$conn = null;
?>
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
                        <?php if (!empty($dives)) : ?>
                            <?php foreach ($dives as $dive) : ?>
                                <tr>
                                    <td class="px-4 py-2"><?php echo $dive['id']; ?></td>
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
                                        <a href="edit-dive.php?id=<?php echo $dive['id']; ?>" class="text-blue-500 bg-blue-200 px-3 py-1 rounded-md hover:bg-blue-300">Edit</a>
                                        <a href="delete-dive.php?id=<?php echo $dive['id']; ?>" class="text-red-500 bg-red-200 px-3 py-1 rounded-md hover:bg-red-300 ml-2">Delete</a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="12" class="text-center">No dive records found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include "inc/footer.php"; ?>