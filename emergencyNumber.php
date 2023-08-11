<?php

include('db_config.php');

if (isset($_GET['submit'])) {
    $thanaName = $_GET['location'];
    $sql = "SELECT PhoneNumber,FireService,Ambulance FROM thana_number 
            WHERE LoacationName = '" . $thanaName . "'";
    $result = mysqli_query($conn, $sql);
    $number = "";
    $fireService = "";
    $ambulance = "";

    if ($result) {
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            $number = $row[0];
            $fireService = $row[1];
            $ambulance = $row[2];
        }
           

    }//if condition end
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="GET" class="area">
        <input type="text" name="location" class="text-field">
        <input type="submit" value="Number" name="submit" class="submit-button">
    </form>

    <br>
    <div class="numberArea">
        <label class="thanaNumberLabel">Police Station:</label>
        <?php
         if ($number == "")
            echo "<p class=pera>No Number Found!</p>";
         else
            echo "<button class=numberButton>
            <a class=tel-link href=tel:>" . $number . "</a> 
            </button>";
        ?>
    </div>

    <br>
    <div class="numberArea">
        <label class="fireserviceLabel">Fire Service:</label>
        <?php
         if ($fireService == "")
            echo "<p class=pera>No Number Found!</p>";
         else
            echo "<button class=numberButton>
            <a class=tel-link href=tel:>" . $fireService . "</a> 
            </button>";
        ?>
    </div>

    <br>
    <div class="numberArea">
        <label class="ambulanceLabel">Ambulance:</label>
        <?php
         if ($ambulance == "")
            echo "<p class=pera>No Number Found!</p>";
         else
            echo "<button class=numberButton>
            <a class=tel-link href=tel:>" . $ambulance . "</a> 
            </button>";
        ?>
    </div>



</body>

</html>