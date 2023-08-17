<?php
include '../connection.php';

if (isset($_POST['submit'])) {
    session_start();
    if(!isset($_SESSION['user_id'])) {
        echo "User not logged in or session expired!";
        exit;
    }

    $userID = $_SESSION['user_id']; 
    $bloodType = isset($_POST['bloodType']) ? $_POST['bloodType'] : null;
    $height = isset($_POST['height']) ? $_POST['height'] : null;
    $weight = isset($_POST['weight']) ? $_POST['weight'] : null;
    $location = isset($_POST['location']) ? $_POST['location'] : null;
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $phn1 = isset($_POST['phn1']) ? $_POST['phn1'] : null;
    $phn2 = isset($_POST['phn2']) ? $_POST['phn2'] : null;
    $phn3 = isset($_POST['phn3']) ? $_POST['phn3'] : null;
    $photoPath = isset($_POST['photo']) ? $_POST['photo'] : null;

    try {
        $sql = "INSERT INTO userinfo (id, bloodType, height, weight, location, photo, gender, phn1, phn2, phn3) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userID, $bloodType, $height, $weight, $location, $photoPath, $gender, $phn1, $phn2, $phn3]);

        echo "Data saved successfully!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
