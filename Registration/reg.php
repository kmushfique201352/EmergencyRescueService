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

    session_start();
    $_SESSION['temp'] = array(
        'username' => $username,
        'email' => $email,
        'phone' => $phone,
        'hashed_password' => password_hash($password, PASSWORD_DEFAULT)
    );
    
    header('Location: ../Profile/profile.html');
    exit;

} else {
    echo "Invalid form submission.";
}
?>
