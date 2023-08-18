<?php
include '../connection.php'; 

session_start();

if(!isset($_SESSION['user_id'])) {
    header('Location: login.php'); 
    exit;
}

$userId = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username, location, photo FROM USER WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="featureStyle.css" />
    <title>Features</title>

</head>

<body>
    <div class="navi-cont2">
        <div class="back">
            <span>
                <a href="..\SOS\sos.html"><img src="..\images\back.png" alt=""></a>
            </span>
        </div>
        <div class="editProfile">
            <a href="../Features/editProfile.php"><img src="..\images\settings.png" alt=""></a>
            <span>Edit Profile</span>
        </div>
    </div>

    <div class="navi-cont">
        <div class="round">
            <div class="info">
                <span class="name"><?= $user['username'] ?></span>
                <span class="address"><?= $user['location'] ?></span>
            </div>
            <img src="<?= $user['photo'] ?>" alt="User Photo">
        </div>
    </div>
    <style>
        .navi-cont{
        position: absolute;
        margin-bottom: 500px;
        }
        .round{
            width: 300px;
            background-color: #454955;
            height: 55px;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
            border: 1px solid #3c3f4a;
        }
        .round img{
            position: absolute;
            right: 0;
        }
    </style>

    <div class="navi-cont3">
        <div class="round2">
            <img src="..\images\camera.png" alt="sample.jpg">
            <span>Add crime images</span>
        </div>
    </div>   

    <div class="navi-cont4">
        <div class="round3">
            <span>Tracker</span>
            <div class="round4">
                <div class="round5"></div>
                <span>Slide to turn off tracker</span>
            </div>
        </div>
    </div>

    <div class="navi-cont5">
        <div class="item item-1"><a href="..\Book an Ambulance\ambu.php"><span>Book an Ambulance</span></a></div>
        <div class="item item-2"><a href="..\FireService\fire.html"><span>Fire Service</span></a></div>
        <div class="navi-cont6">
            <div class="item item-3"><a href="..\BloodBank\blood.html"><span>Blood Bank</span></a></div>
            <div class="item item-4"><a href="../Nearest Police Station/nps.php"><span>Nearest police station</span></a></div>
            <div class="item item-5"><a href="..\Emergency Ambulance\e.html"><span>Emergency Ambulance</span></a></div>
        </div>
    </div>

</body>

</html>
