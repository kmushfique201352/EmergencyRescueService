<?php
include '../connection.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['temp'])) {
    
    $username = $_SESSION['temp']['username'];
    $email = $_SESSION['temp']['email'];
    $phone = $_SESSION['temp']['phone'];
    $hashed_password = $_SESSION['temp']['hashed_password'];

    $bloodType = $_POST["bloodType"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $location = $_POST["location"];
    
    $photoPath = "";
    $gender = $_POST["gender"];
    $phn1 = $_POST["phn1"];
    $phn2 = $_POST["phn2"];
    $phn3 = $_POST["phn3"];

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../images/';
        $uploadFile = $uploadDir . basename($_FILES['photo']['name']);
        
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
            $photoPath = $uploadFile;
        } else {
            echo "File could not be uploaded.";
            exit;
        }
    }
    
    try {
        $stmt = $conn->prepare("INSERT INTO user (username, email, phoneNumber, password_hash, bloodType, height, weight, location, photo, gender, phn1, phn2, phn3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$username, $email, $phone, $hashed_password, $bloodType, $height, $weight, $location, $photo, $gender, $phn1, $phn2, $phn3]);
        
        unset($_SESSION['temp']);  
        header('Location: ../SOS/sos.html');
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid form submission or session data missing.";
}
?>
