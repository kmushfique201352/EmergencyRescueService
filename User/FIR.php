<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Create a database connection
    $conn = new mysqli('localhost', 'sadik', 'test123', 'online_emergency');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and escape user inputs
    $incident_date = $_POST["incident_date"];
    $incident_location = $conn->real_escape_string($_POST["incident_location"]);
    $complainant_name = $conn->real_escape_string($_POST["complainant_name"]);
    $complainant_contact = $conn->real_escape_string($_POST["complainant_contact"]);
    $description = $conn->real_escape_string($_POST["description"]);
    $suspect_name = $conn->real_escape_string($_POST["suspect_name"]);
    $witnesses = $conn->real_escape_string($_POST["witnesses"]);
    $officer_name = $conn->real_escape_string($_POST["officer_name"]);
    $badge_number = $conn->real_escape_string($_POST["badge_number"]);

    // Check if incident date is not in the future
    $currentDate = date("Y-m-d H:i:s");
    if ($incident_date > $currentDate) {
        echo "Error: Incident date cannot be in the future.";
        exit;
    }

    // Insert data into the database
    $sql = "INSERT INTO fir_records (incident_date, incident_location, complainant_name, complainant_contact, description, suspect_name, witnesses, officer_name, badge_number)
            VALUES ('$incident_date', '$incident_location', '$complainant_name', '$complainant_contact', '$description', '$suspect_name', '$witnesses', '$officer_name', '$badge_number')";

    if ($conn->query($sql) === TRUE) {
        echo "FIR recorded successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>FIR Form</title>
    <link rel="stylesheet" href="FirStyle.css">
</head>
<body>
    <h1>First Information Report (FIR)</h1>
    <form action="FIR.php" method="post">
        <label for="incident_date">Incident Date and Time:</label>
        <input type="datetime-local" id="incident_date" name="incident_date" required><br><br>
        
        <label for="incident_location">Incident Location:</label>
        <input type="text" id="incident_location" name="incident_location" required><br><br>
        
        <label for="complainant_name">Complainant Name:</label>
        <input type="text" id="complainant_name" name="complainant_name" required><br><br>
        
        <label for="complainant_contact">Complainant Contact Number:</label>
        <input type="tel" id="complainant_contact" name="complainant_contact" required><br><br>
        
        <label for="description">Description of the Incident:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
        
        <label for="suspect_name">Suspect Name (if known):</label>
        <input type="text" id="suspect_name" name="suspect_name"><br><br>
        
        <label for="witnesses">Witnesses (if any):</label>
        <input type="text" id="witnesses" name="witnesses"><br><br>
        
        <label for="officer_name">Reporting Officer Name:</label>
        <input type="text" id="officer_name" name="officer_name" required><br><br>
        
        <label for="badge_number">Badge Number:</label>
        <input type="text" id="badge_number" name="badge_number" required><br><br>
        
        <input type="submit" value="Submit FIR">
    </form>
</body>
</html>
