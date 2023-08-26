<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection
include '../connection.php'; 

$complainant_name = '';
$address = '';
$incident_description = '';
$incident_date = '';

// Fetch the last FIR record
$sql = "SELECT * FROM fir ORDER BY fir_id DESC LIMIT 1";
$stmt = $conn->prepare($sql);

try {
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        $complainant_name = $result['complainant_name'];
        $address = $result['address'];
        $incident_description = $result['incident_description'];
        $incident_date = date('Y-m-d', strtotime($result['incident_date']));
    }

} catch (PDOException $e) {
    echo "Error occurred while fetching FIR: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .print-container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }
        label {
            font-weight: bold;
        }
    </style>
    <title>FIR Print Copy</title>
</head>
<body>
    <div class="print-container">
        <h2>First Information Report (FIR) - Print Copy</h2>
        <label>Complainant Name: </label><span><?php echo $complainant_name; ?></span><br>
        <label>Address: </label><span><?php echo $address; ?></span><br>
        <label>Description of Incident: </label><span><?php echo $incident_description; ?></span><br>
        <label>Date of Incident: </label><span><?php echo $incident_date; ?></span><br>

        <button onclick="window.print()">Print this page</button>
    </div>
</body>
</html>
