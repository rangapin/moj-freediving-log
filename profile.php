<?php
include "inc/db.php";
include "inc/header.php";
include "inc/nav.php";

// Initialize variables
$first_name = '';
$last_name = '';
$email = '';
$experience_level = '';
$training_goal = '';

// Retrieve user details from the database
$user_id = 1; // Assuming user ID 1 for demonstration
$sql = "SELECT * FROM users WHERE id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user data is fetched successfully
if ($user !== false && is_array($user)) {
    $first_name = isset($user['first_name']) ? $user['first_name'] : '';
    $last_name = isset($user['last_name']) ? $user['last_name'] : '';
    $email = isset($user['email']) ? $user['email'] : '';
    $experience_level = isset($user['experience_level']) ? $user['experience_level'] : '';
    $training_goal = isset($user['training_goal']) ? $user['training_goal'] : '';
} else {
    // Handle the case where the user data is empty
    // For example, display an error message or redirect the user
}

?>

<!-- Main Content -->
<div class="flex-1 p-8">
    <h2 class="text-3xl font-semibold mb-4">Profile</h2>

    <!-- Profile Details -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-8">
        <!-- Profile Picture (Placeholder) -->
        <div class="flex justify-center mb-4">
            <img src="assets/images/color-rich.png" alt="Profile Picture" class="w-32 h-32 rounded-full">
        </div>

        <!-- User Details -->
        <div class="grid grid-cols-2 gap-x-8">
            <!-- Left Column: User Information -->
            <div>
                <div class="mb-4">
                    <label for="first_name" class="font-semibold">First Name:</label>
                    <p><?php echo $first_name; ?></p>
                </div>
                <div class="mb-4">
                    <label for="last_name" class="font-semibold">Last Name:</label>
                    <p><?php echo $last_name; ?></p>
                </div>
                <div class="mb-4">
                    <label for="email" class="font-semibold">Email:</label>
                    <p><?php echo $email; ?></p>
                </div>
                <div class="mb-4">
                    <label for="experience_level" class="font-semibold">Experience Level:</label>
                    <p><?php echo $experience_level; ?></p>
                </div>
                <div class="mb-4">
                    <label for="training_goal" class="font-semibold">Training Goal:</label>
                    <p><?php echo $training_goal; ?></p>
                </div>
            </div>

            <!-- Right Column: Empty Placeholder -->
            <div></div>
        </div>
    </div>

    <!-- Buttons at the Bottom -->
    <div class="flex justify-center">
        <a href="delete-account.php" class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 m-2">Delete Account</a>
        <a href="edit-profile.php" class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 m-2">Edit Details</a>
    </div>
</div>

<?php include "inc/footer.php"; ?>






