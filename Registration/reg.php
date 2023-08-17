<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["password"]) && isset($_POST["repeat_password"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $repeat_password = $_POST["repeat_password"];

    if ($password !== $repeat_password) {
        echo "Passwords do not match!";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user (username, email, phoneNumber, password_hash) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $phone, $hashed_password);

    if ($stmt->execute()) {
        header('Location: ../Profile/profile.html'); 
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
 