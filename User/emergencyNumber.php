<?php

include('db_config.php');

$sql1 = "SELECT LoacationName FROM thana_number";
$result1 = mysqli_query($conn, $sql1);
$options = "";
while ($row1 = mysqli_fetch_array($result1, MYSQLI_NUM)) {
    $options .= "<option value='{$row1[0]}'>{$row1[0]}</option>";
}


$number = "";
$fireService = "";
$ambulance = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["selected_location"])) {
        $thanaName = $_POST["selected_location"];

        $sql = "SELECT PhoneNumber,FireService,Ambulance FROM thana_number 
        WHERE LoacationName = '" . $thanaName . "'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                $number = $row[0];
                $fireService = $row[1];
                $ambulance = $row[2];
            }
        } //if condition end

    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="EmegencyNumberStyle.css">
</head>

<body>
    <form action="" method="post" class="area">
        <label for="locationSelect" class="ChooseLabel">Choose a Location:</label>
        <select class="location" name="selected_location">
            <option value="" disabled selected>Select a location</option>
            <?php echo $options; ?>
        </select>

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