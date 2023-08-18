<?php
include '../connection.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['temp'])) {
    
    $username = htmlspecialchars($_SESSION['temp']['username']);
    $email = htmlspecialchars($_SESSION['temp']['email']);
    $phone = htmlspecialchars($_SESSION['temp']['phone']);
    $hashed_password = $_SESSION['temp']['hashed_password'];

    $bloodType = htmlspecialchars($_POST["bloodType"]);
    $height = (int)$_POST["height"];
    $weight = (int)$_POST["weight"];
    $location = htmlspecialchars($_POST["location"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $phn1 = htmlspecialchars($_POST["phn1"]);
    $phn2 = htmlspecialchars($_POST["phn2"]);
    $phn3 = htmlspecialchars($_POST["phn3"]);

    $photoPath = "";

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../images/';
        $fileExtension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

        if (in_array($fileExtension, ['jpg', 'jpeg', 'png'])) {
            $uploadFile = $uploadDir . time() . '.' . $fileExtension; 
            
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
                $photoPath = $uploadFile;
            } else {
                echo "File could not be uploaded.";
                exit;
            }
        } else {
            echo "Invalid file type.";
            exit;
        }
    }

    try {
        $stmt = $conn->prepare("UPDATE user SET username=?, email=?, phoneNumber=?, password_hash=?, bloodType=?, height=?, weight=?, location=?, photo=?, gender=?, phn1=?, phn2=?, phn3=? WHERE user_id=?");
        $stmt->execute([$username, $email, $phone, $hashed_password, $bloodType, $height, $weight, $location, $photoPath, $gender, $phn1, $phn2, $phn3, $userId]);
        
        unset($_SESSION['temp']); 
        header('Location: ../Features/editProfile.php');
        exit;
    } catch(PDOException $e) {
        echo "There was an error updating your profile. Please try again later.";
        
    }
} else {
    echo "Invalid form submission or session data missing.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../Features/editProfile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="profile-heading">
            <p>Edit Profile</p>
        </div>
        <div class="input-form">
            <form action="profile.php" method="post" enctype="multipart/form-data" id="myform">
                <div class="blood-height-weight-container">
                    <div class="blood_type ">
                        <input type="text" class="input-field" id="blood_type" name="bloodType" placeholder="Enter Your Blood Type" />
                    </div>
                    <div class="height ">
                        <input type="text" class="input-field" id="height" name="height" placeholder="Enter Your Height in cm" />
                    </div>
                    <div class="weight ">
                        <input type="text" class="input-field" id="weight" name="weight" placeholder="Enter Your Weight in kg" />
                    </div>
                </div>
                <div class="Location-profile-picture-container">
                    <div class="addlocation-container">
                        <div class="location-heading">
                            <h4>Add Location</h4>
                            <input type="hidden" id="locationInput" name="location">
                        </div>
                        <div class="turn-on-off-btn">
                            <div class="turnon-btn">
                                <button type="button">Turn On</button>
                            </div>
                        </div>
                    </div>
                    <!-- <input type="file" id="profile-pic-input" style="display: none;"> -->
                    <div class="profile-picture-container">
                        <div class="camera-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                              </svg>   
                        </div>
                        <div class="picture-heading">
                            <h4>Add Profile picture</h4>
                            <input type="file" id="photoInput" name="photo" style="display: none;">
                        </div>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const picContainer = document.querySelector('.profile-picture-container');
                            const fileInput = document.getElementById('photoInput');  
                            
                            picContainer.addEventListener('click', function() {
                                fileInput.click();
                            });
                            
                            fileInput.addEventListener('change', function() {
                                if (this.files && this.files[0]) {
                                    const file = this.files[0];
                                    
                                    if (file.type.startsWith('image/')) {  
                                        const reader = new FileReader();
                        
                                        reader.onload = function(e) {
                                            picContainer.style.backgroundImage = `url(${e.target.result})`;
                                            picContainer.style.backgroundSize = 'cover';
                                            picContainer.style.backgroundPosition = 'center';
                                            picContainer.style.border = '1px solid #000'; 
                                        }
                                        
                                        reader.readAsDataURL(file);
                                    } else {
                                        alert('Please select a valid image.');
                                    }
                                }
                            });
                        });
                        
                        
                    </script>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const turnOnButton = document.querySelector('.turnon-btn button');
                        const locationHeading = document.querySelector('.location-heading h4');
                    
                        turnOnButton.addEventListener('click', function() {
                            if ("geolocation" in navigator) {
                                navigator.geolocation.getCurrentPosition(function(position) {
                                    let latitude = position.coords.latitude;
                                    let longitude = position.coords.longitude;
                                    let locationString = "Latitude: " + latitude + ", Longitude: " + longitude;
                    
                                    locationHeading.textContent = locationString;
                    
                                    turnOnButton.style.display = "none";
                    
                                    saveLocationToServer(locationString);
                    
                                }, function(error) {
                                    alert("Error occurred: " + error.message);
                                });
                            } else {
                                alert("Geolocation is not supported by your browser.");
                            }
                        });
                    });
                    function saveLocationToServer(locationString) {
                        const locationInput = document.getElementById('locationInput');
                        locationInput.value = locationString;
                    }
                    
                    
                </script>
                <div class="gender-container">
                    <div class="gender-heading">
                        <h3>Enter Gender</h3>
                    </div>
                    <div class="type-of-gender">
                        <ul>
                            <li>
                                <input type="radio" name="gender" value="male" id="male" class="gender-btn">
                                <label for="male">Male</label>
                            </li>
                            <li>
                                <input type="radio" name="gender" value="female" id="female" class="gender-btn">
                                <label for="female">Female</label>
                            </li>
                        </ul>
                    </div>
                    
                </div>
                <div class="emergency-container">
                    <div class="emergency-contacts-heading">
                        <h3>Enter 3 Emergency contacts</h3>
                    </div>
                    <div class="contact-field">
                        <div class="contacts ">
                            <input type="text" class="input-field" id="phn1" name="phn1" placeholder="Enter Phone Number" />
                        </div>
                        <div class="contacts ">
                            <input type="text" class="input-field" id="phn2" name="phn2" placeholder="Enter Phone Number" />
                        </div>
                        <div class="contacts ">
                            <input type="text" class="input-field" id="phn3" name="phn3" placeholder="Enter Phone Number" />
                        </div>
                    </div>
                </div>
                <div class="btn">
                    <button type="submit" name="submit">Update profile</button>
                </div>
            </form>
            <script>
                //document.addEventListener("DOMContentLoaded", function() {
                    //const form = document.getElementById('userInfoForm');
                    const locationElem = document.querySelector('.location-heading h4');
                    const picContainer = document.querySelector('.profile-picture-container');
                    const locationInput = document.getElementById('locationInput');
                    const photoInput = document.getElementById('photoInput');
                
                    form.addEventListener('submit', function(e) {
                        locationInput.value = locationElem.innerText;
                        let backgroundImage = picContainer.style.backgroundImage;
                        let photoURL = backgroundImage.slice(5, -2); 
                        photoInput.value = photoURL;
                    });
                //});
                
            </script>
        </div>
    </div>
</body>
</html>