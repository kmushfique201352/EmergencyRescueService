<?php
include '../connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" 
    && isset($_POST["name"]) 
    && isset($_POST["address"]) 
    && isset($_POST["email"]) 
    && isset($_POST["contact"]) 
    && isset($_POST["booking_date"]) 
    && isset($_POST["booking_time"])) {
    
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    
    list($day, $month, $year) = explode('/', $_POST['booking_date']);
    $booking_date = "$year-$month-$day";
    $booking_time = $_POST['booking_time'];

    session_start();
    $_SESSION['booking_temp'] = array(
        'name' => $name,
        'address' => $address,
        'email' => $email,
        'contact' => $contact,
        'booking_date' => $booking_date,
        'booking_time' => $booking_time
    );
    
    header('Location: ../Book an Ambulance/insertBooking.php');
    exit;

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

    <?php if ($message): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <div class="book">
        <form action="insertBooking.php" method="post">
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
