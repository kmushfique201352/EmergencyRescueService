<?php
include '../connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" 
    && isset($_POST["name"]) 
    && isset($_POST["address"]) 
    && isset($_POST["email"]) 
    && isset($_POST["contact"]) 
    && isset($_POST["booking_date"]) 
    && isset($_POST["booking_time"])) {
    
    // Collect and sanitize user input
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    
    list($day, $month, $year) = explode('/', $_POST['booking_date']);
    $booking_date = "$year-$month-$day";
    $booking_time = $_POST['booking_time'];

    try {
        // Prepare the SQL query
        $sql = "INSERT INTO bookings (name, address, email, contact, booking_date, booking_time) VALUES (:name, :address, :email, :contact, :booking_date, :booking_time)";
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':contact', $contact, PDO::PARAM_STR);
        $stmt->bindParam(':booking_date', $booking_date, PDO::PARAM_STR);
        $stmt->bindParam(':booking_time', $booking_time, PDO::PARAM_STR);

        // Execute the query
        if($stmt->execute()) {
            echo "New booking created successfully.";
            header("Location: ../Book an Ambulance/insertBooking.php");
        } else {
            echo "Unable to create booking.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
} else {
    echo "Invalid form submission.";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Book an Ambulance/ambu.css" />
    <title>SOS Mode</title>
</head>

<body>
    <div class="part">
        <span>Rent an Ambulance</span>
    </div>

    

    <div class="book">
        <form action="../Book an Ambulance/ambu.php" method="POST">
            <input type="text" name="name" placeholder="Name on" >
            <input type="text" name="address" placeholder="Address">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="contact" placeholder="Contact">
            <input type="text" name="booking_date" placeholder="Date (dd/mm/yyyy)">
            <input type="text" name="booking_time" placeholder="Time (hh:mm)">
            <button type="submit">Proceed to Book</button>
        </form>
    </div>
</body>
</html>
