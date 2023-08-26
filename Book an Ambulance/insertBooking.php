<?php
// Start the session
session_start();

// Include the database connection
include '../connection.php';

// Fetch user details
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM user WHERE id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch booking details
$stmt = $conn->prepare("SELECT * FROM bookings WHERE user_id = :user_id ORDER BY booking_id DESC LIMIT 1");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$booking = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview</title>
    <style>
        /* Your existing CSS here */
    </style>
</head>
<body>
    <div class="backpage">
        <!-- Display the word "Preview" at the top-middle of the page -->
        <span style="text-align: center; display: block; font-size: 24px;">Preview</span>

        <!-- Display User Details -->
        <p>Name: <?php echo $user['username']; ?></p>
        <p>Email: <?php echo $user['email']; ?></p>
        <p>Gender: <?php echo $user['gender']; ?></p>
        <p>Blood Type: <?php echo $user['bloodType']; ?></p>
        <p>Height: <?php echo $user['height']; ?></p>
        <p>Weight: <?php echo $user['weight']; ?></p>

        <!-- Line Separator -->
        <hr>

        <!-- Display Emergency Contact Information -->
        <span>Emergency Contact Information</span>
        <p>Name on: <?php echo $booking ? $booking['name'] : 'N/A'; ?></p>
        <p>Contact Number: <?php echo $booking ? $booking['contact'] : 'N/A'; ?></p>


        <!-- Line Separator -->
        <hr>

        <!-- Display Rental Details -->
        <span>Rental Details</span>
        <p>Rental Date: <?php echo $booking ? $booking['booking_date'] : 'N/A'; ?></p>
        <p>Rental Time: <?php echo $booking ? $booking['booking_time'] : 'N/A'; ?></p>


        <!-- Print Copy Button -->
        <button onclick="window.print()">Print Copy</button>
    </div>
</body>
</html>
