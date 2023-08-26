<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['bloodType']) && isset($_POST['gender']) && isset($_POST['relation']) && isset($_POST['age']) && isset($_SESSION['user_id'])) {
        include '../../connection.php';

        $user_id = $_SESSION['user_id'];
        $bloodType = $_POST['bloodType']; 
        $gender = $_POST['gender'];
        $relation = $_POST['relation'];
        $age = $_POST['age'];

        $sql = "INSERT INTO findDonar (User_id, bloodType, Gender, Relation, age) VALUES (:User_id, :bloodType, :Gender, :Relation, :age)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':User_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':bloodType', $bloodType, PDO::PARAM_STR);
        $stmt->bindParam(':Gender', $gender, PDO::PARAM_STR);
        $stmt->bindParam(':Relation', $relation, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // echo "Successfully added to the findDonar table.";
            header("Location: ../Looking for Blood/find.php");
        } else {
            echo "Error: " . print_r($stmt->errorInfo(), true);
        }
    } else {
        // echo "All form fields must be filled out";
    }
} 
// else {
//     echo "Please login to find a donor.";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="findStyle.css" />
    <title>SOS Mode</title>
    <style>
body {
  font-family: Arial, sans-serif;
  background-image: linear-gradient(90deg,#293145,#454955,#293145);
  background-size: 600% 600%;
  animation: bgAnimatedGradient 2s infinite linear;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}


.backpage{
  background-color: #f0f0f030;
  width: 300px;
  height: 420px;
  margin-bottom: 20px;
  border-radius: 20px;
}
.back{
    width: 12px;
    background-color: #454955;
    height: 12px;
    margin: 10px;
    padding: 4px;
    border-radius: 50%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
    border: 1px solid #3c3f4a;
}
.grop1 input{
    display: flex;
    margin: 5px;
    padding: 2px;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    width: 20px;
    height: 20px;
    font-size: 20px;
    background-color: #ffffff;
}
.grop1 input:hover{
    background-color: #3c3f4a;
    color: #f0f0f0;
}
    </style>

</head>

<body>
    <form action="find.php" method="POST">
        <div class="backpage">
            <div class="top">

                <div class="navi-cont2">
                    <div class="back">
                        <span>
                            <a href="../../BloodBank/blood.html"><img src="../../images/back.png" alt=""></a>
                        </span>
                    </div>
                </div>

                <span class="next1">Find Donars</span>
                <span class="next2">Patient Blood Type</span>
                <div class="grop1">
                    <input type="radio" name="bloodType" value="A+"> A+
                    <input type="radio" name="bloodType" value="A-"> A-
                    <input type="radio" name="bloodType" value="B+"> B+
                    <input type="radio" name="bloodType" value="B-"> B-
                    <input type="radio" name="bloodType" value="AB+"> AB+
                    <input type="radio" name="bloodType" value="AB-"> AB-
                    <input type="radio" name="bloodType" value="O+"> O+
                    <input type="radio" name="bloodType" value="O-"> O-
                </div>

                <span class="next3">Patient Gender</span>
                <div class="grop2">
                    <input type="radio" name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female"> Female
                </div>

                <span class="next4">Patient Relation</span>
                <div class="grop3">
                    <input type="radio" name="relation" value="Family"> Family
                    <input type="radio" name="relation" value="Friends"> Friends
                    <input type="radio" name="relation" value="Others"> Others
                </div>

                <label for="Age" class="Age">Patient Age:</label>
                <select id="Age" name="age" class="grop4">
                    <option value="under18">Under 18</option>
                    <option value="18to30">18 - 30</option>
                    <option value="31to45">31 - 45</option>
                    <option value="46to60">46 - 60</option>
                    <option value="above60">Above 60</option>
                </select>

                <!-- <div class="submit">
                <button><a href="C:\Users\mdkha\Documents\GitHub\EmergencyRescueService\BloodBank\Looking for Blood\Request\request.html">Send Request</a></button>
            </div> -->
                <div class="submit">
                    <button type="submit">Send Request</button>
                </div>
    </form>



    </div>
    </div>

</body>

</html>