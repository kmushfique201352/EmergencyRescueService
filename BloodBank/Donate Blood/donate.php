<?php
// Start the session (if it's not already started)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


include '../../connection.php';

$isDonor = false;


if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];


    $sqlCheck = "SELECT donor_id FROM donors WHERE donor_id = :donor_id";
    $stmtCheck = $conn->prepare($sqlCheck);
    $stmtCheck->bindParam(':donor_id', $user_id, PDO::PARAM_INT);
    $stmtCheck->execute();
    
    if ($stmtCheck->rowCount() > 0) {
        $isDonor = true;
    }


    if (isset($_POST['donateBlood'])) {
        $sql = "INSERT INTO donors (donor_id) VALUES (:donor_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':donor_id', $user_id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $isDonor = true;
        } else {
            echo "Error: " . print_r($stmt->errorInfo(), true);
        }
    }
} else {
    echo "Please login to donate.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOS Mode</title>
    
</head>
<body>
    <div class="image">
        <img src="..\..\images\donation.png" alt="Donation Image">
    </div>
    <span class="text">Your Small Contribution Can Save 1 Life</span>

    <form method="post" action="donate.php">
        <input type="hidden" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
        <?php if ($isDonor): ?>
            <a href="../Request.php" class="bloodbutton">Watch Requests</a>
        <?php else: ?>
            <button type="submit" name="donateBlood" class="bloodbutton">Donate Blood</button>
        <?php endif; ?>
    </form>

    <style>
        body, h1, p {
    margin: 0;
    padding: 0;
    background-color: aqua;
    height: 100%;
    width: 100%;
    background-image: linear-gradient(90deg,#293145,#454955,#293145);
    background-size: 600% 600%;
    animation: bgAnimatedGradient 2s infinite linear;
  }
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  @keyframes bgAnimatedGradient{
    0%{
        background-position: 0 0%;
    }
    100%{
        background-position: 100% 0;
    }
  }
  .image{
    position: absolute;
    width: auto;
    overflow: hidden; 
    border-radius: 90px;
  }
.image img{
    display: block;
    flex-direction: column;
    align-items: center;
    width: auto;
    height: 180px;
    margin-bottom: 300px;
}
.text{
    margin-top: 20px;
    font-size: 35px;
    color: #f0f0f0;
    text-align: center;
}
/* styles.css */
.bloodbutton {
    margin-top: 450px;
    margin-left: 130px;
    width: 70px;
    height: 100px;
    color: aliceblue;
    position: absolute;
    left: 0;
    top: 0;
    background-color: #a22e2e;
    background-image: linear-gradient(90deg,#a22e2e,#a86c6c,#a22e2e);
    background-size: 600% 600%;
    animation: bgAnimatedGradient 2s infinite linear;
    border-radius: 50%;
}
form a{
    position: absolute;
    display: flex;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    padding: 10px;
    text-decoration: none;
    font-size: 15px;
}




    </style>
</body>
</html>
