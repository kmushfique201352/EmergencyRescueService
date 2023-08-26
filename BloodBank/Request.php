<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reqStyle.css" />
    <title>Request</title>
    <style>

        .request-header {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
        }

        .donor-info {
            padding: 5px;
            text-align: left;
        }
        .donor-info hr {
    border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
}

        .accept, .decline {
            float: right;
            margin-left: 5px;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        .accept {
            float: right;
    margin-left: 5px;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    background-color: #007bff;
    color: white;
    border-radius: 5px;
    font-size: 16px;
        }
        .accept:hover {
    background-color: #0056b3;
}

        .decline {
            background-color: #dc3545;
            color: white;
        }
    </style>

</head>

<body>
    
    <div class="backpage">
        
        <div class="request-header">Requested</div>
        
        <div class="top">
            <div class="navi-cont2">
                <div class="back">
                    <span>
                        <a href="../BloodBank/blood.html"><img src="../images/back.png" alt=""></a>
                    </span>
                </div>
            </div>
        </div>

        <?php
include '../connection.php'; 

try {
    $sql = "SELECT finddonar.user_id, finddonar.bloodType, finddonar.age, user.phoneNumber 
        FROM finddonar 
        JOIN user ON finddonar.user_id = user.id";  

    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='donor-info'>";
            echo "Requester: " . $row['user_id'] . " | ";
            echo "Blood Type: " . $row['bloodType'] . " | ";
            echo "Age: " . $row['age'];
            echo "<a href='tel:" . $row['phoneNumber'] . "' class='accept'>Contact</a>"; 
            echo "<hr>";
            echo "</div>";
        }
        
    } else {
        echo "<div class='no-results'>0 results</div>";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>

    </div>
</body>

</html>
