

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <link rel="stylesheet" href="../SOS/sosStyle.css" />
    <title>SOS Mode</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector(".circle-button").addEventListener("click", function() {
                this.classList.add('button-pressed1');

                let h3Element = this.querySelector('h3');
                let originalH3Text = h3Element.innerText;
                h3Element.innerText = "Alert stating ...";

                let h2Element = this.querySelector('h2');

                let countdownValue = 5;
                let interval = setInterval(function() {
                    countdownValue--;
                    h2Element.innerText = countdownValue + "s";
                    if (countdownValue <= 0) {
                        clearInterval(interval);
                        h2Element.innerText = "5s";
                        h3Element.innerText = originalH3Text;
                        h2Element.parentElement.classList.remove('button-pressed1');

                        window.location.href = "SOS2/sos2.php";
                    }
                }, 1000); 
            });
            document.querySelector(".circle-button2").addEventListener("click", function() {
                var button = this;
                button.classList.add("button-pressed2");
        
                setTimeout(function() {
                    button.classList.remove("button-pressed2");
                }, 5000);
            });
            document.querySelector(".circle-button3").addEventListener("click", function() {
                var button = this;
                button.classList.add("button-pressed3");
        
                setTimeout(function() {
                    button.classList.remove("button-pressed3");
                }, 5000);
            });
            document.querySelector(".circle-button4").addEventListener("click", function() {
                var button = this;
                button.classList.add("button-pressed4");
        
                setTimeout(function() {
                    button.classList.remove("button-pressed4");
                }, 5000);
            });
            document.querySelector(".circle-button5").addEventListener("click", function() {
                var button = this;
                button.classList.add("button-pressed5");
        
                setTimeout(function() {
                    button.classList.remove("button-pressed5");
                }, 5000);
            });


            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    
                }, function(error) {
                    
                    if (error.code == error.PERMISSION_DENIED) {
                        document.querySelector(".geo .span2").style.color = "red";
                        document.querySelector(".geo .span2").innerText = "OFF";
                    }
                });
            } else {
                
                document.querySelector(".geo .span2").style.color = "red";
                document.querySelector(".geo .span2").innerText = "OFF";
            }
        
           
            if (!navigator.onLine) {
                document.querySelector(".wifi .span2").style.color = "red";
                document.querySelector(".wifi .span2").innerText = "Inactive";
            }
        
            
            window.addEventListener("offline", function() {
                document.querySelector(".wifi .span2").style.color = "red";
                document.querySelector(".wifi .span2").innerText = "Inactive";
            });
        
            window.addEventListener("online", function() {
                document.querySelector(".wifi .span2").style.color = "green";
                document.querySelector(".wifi .span2").innerText = "Active";
            });
            
        });
        
    </script>
</head>

<body>
    <div class="logoutbtn-cont">
        <div class="logoutbtn">
            <a href="../SOS/logout.php"><span>Logout</span></a>
            
        </div>
    </div>
    <style>
        .logoutbtn-cont{
            top: 0;
            left: 0;
            border: black 2px;
            margin: 10px;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #454955;
            border-radius: 20px;
            width: 50px;
            height: 15px;
          }
          .navi-cont{
            position: absolute;
            margin-bottom: 510px;
            }
    </style>

    <div class="navi-cont">
        <div class="round"></div>
        <div class="geo">
            <img src="..\images\gps.png" alt="sample.png">
            <div class="text">
                <span class="span1">Geolocation</span>
                <span class="span2">ON</span>
            </div>
        </div>
        <div class="wifi">
            <img src="..\\images\wifi.png" alt="sample.png">
            <div class="text">
                <span class="span1">Network</span>
                <span class="span2">Active</span>
            </div>
        </div>
    </div>

    <div class="navi-cont2">
        <div class="round2">
            <span><a href="..\Features\features.php">Features</a></span>
        </div>
        <div class="round3">
            <a href="../SOS/Danger.php"><span>Danger Zone</span></a>
        </div>
    </div>

    <div class="bg-container">
        <div class="circle-button5">
            <div class="circle-button4">
                <div class="circle-button3">
                    <div class="circle-button2">
                        <button class="circle-button">
                            <img src="..\images\alarm.png"
                                alt="Sample Image" style="width: 30px; height: 30px; margin-top: 20px;">
                            <h3>Press to notify alert</h3>
                            <h2>5s</h2>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>