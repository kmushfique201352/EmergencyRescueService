<?php
include '../../connection.php';  

session_start();

if(!isset($_SESSION['user_id'])) {
    header('Location: login.php'); 
    exit;
}

$userId = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username, location, photo,phn1,phn2,phn3 FROM USER WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../SOS2/sos2Style.css" />
    <title>SOS Mode</title>
    <script>
        
        
    </script>
</head>

<body>
    
    <div class="navi-cont">
        <div class="round">
            <div class="info">
                <span class="name"><?= $user['username'] ?></span>
                <span class="address"><?= $user['location'] ?></span>
            </div>
            <img src="../<?= $user['photo'] ?>" alt="User Photo">
        </div>
    </div>
    <style>
        .navi-cont{
        position: relative;
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

    <div class="navi-cont2">
        <div class="round2">
            <img src="../../images/gps.png" alt="">
            <span><a href="#">GPS ON</a></span>
        </div>
    </div>

    <div class="bg-container">
        <div class="circle-button5">
            <div class="circle-button4">
                <div class="circle-button3">
                    <div class="circle-button2">
                        <button class="circle-button" onclick="startCountdown()">
                            <h3>5s</h3>
                            <h2>Press to call</h2>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <audio id="buzzerAudio" src="../../SOS/SOS2/military-alarm-129017.mp3" preload="auto"></audio>
    

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            window.startCountdown = function() {
                let h3Element = document.querySelector('.circle-button h3');
                let h2Element = document.querySelector('.circle-button h2');
                let buzzerSound = document.getElementById('buzzerAudio');
                
                let countdownValue = 5;
                let callingStates = ["Calling.", "Calling..", "Calling..."];
                let callingIndex = 0;
            
                let interval = setInterval(function() {
                    countdownValue--;
                    h3Element.innerText = countdownValue + "s";
            
                    callingIndex = (callingIndex + 1) % callingStates.length;
                    h2Element.innerText = callingStates[callingIndex];
                    
                    if (countdownValue <= 0) {
                        clearInterval(interval);
                        buzzerSound.play();
                    }
                }, 1000);
            }
        
        });
        
        
    </script>

    <div class="navi-cont3">
        <span><?= $user['phn1'] ?></span>
        <div class="round3">
            <img src="../../images/gps.png" alt="">
            <!-- <span><a href="#">...</a></span> -->
        </div>
    </div>
    <div class="navi-cont4">
        <span><?= $user['phn2'] ?></span>
        <div class="round4">
            <img src="../../images/gps.png" alt="">
            <!-- <span><a href="#">...</a></span> -->
        </div>
    </div>
    <div class="navi-cont5">
        <span><?= $user['phn3'] ?></span>
        <div class="round5">
            <img src="../../images/gps.png" alt="">
            <!-- <span><a href="#">...</a></span> -->
        </div>
    </div>
</body>

</html>