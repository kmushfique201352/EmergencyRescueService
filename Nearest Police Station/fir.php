<?php
include '../connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["complainant_name"]) && isset($_POST["address"]) && isset($_POST["incident_description"]) && isset($_POST["incident_date"])) {
    
    $complainant_name = $_POST["complainant_name"];
    $address = $_POST["address"];
    $incident_description = $_POST["incident_description"];
    $incident_date = date('Y-m-d', strtotime($_POST["incident_date"])); 
    
    $sql = "INSERT INTO fir (complainant_name, address, incident_description, incident_date) 
            VALUES (:complainant_name, :address, :incident_description, :incident_date)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':complainant_name', $complainant_name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':incident_description', $incident_description);
    $stmt->bindParam(':incident_date', $incident_date);

    try {
        $stmt->execute();
        echo "FIR submitted successfully!";
    } catch (PDOException $e) {
        echo "Error occurred while submitting FIR. Please try again.";
        
    }
} else {
    echo "Invalid form submission.";
}
?>
