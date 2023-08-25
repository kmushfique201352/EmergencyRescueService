<!DOCTYPE html>
<html>
<head>
    <title>FIR Records</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #3498db;
            color: #fff;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #dddddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>FIR Records</h1>

    <?php
    // Create a database connection
    $conn = new mysqli('localhost', 'sadik', 'test123', 'online_emergency');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve all data from the database
    $sql = "SELECT * FROM solved_records";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Incident Date</th>
                    <th>Incident Location</th>
                    <th>Complainant Name</th>
                    <th>Complainant Contact</th>
                    <th>Description</th>
                    <th>Suspect Name</th>
                    <th>Witnesses</th>
                    <th>Reporting Officer</th>
                    <th>Badge Number</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["incident_date"] . "</td>
                    <td>" . $row["incident_location"] . "</td>
                    <td>" . $row["complainant_name"] . "</td>
                    <td>" . $row["complainant_contact"] . "</td>
                    <td>" . $row["description"] . "</td>
                    <td>" . $row["suspect_name"] . "</td>
                    <td>" . $row["witnesses"] . "</td>
                    <td>" . $row["officer_name"] . "</td>
                    <td>" . $row["badge_number"] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No FIR records found.";
    }

    // Close the database connection
    $conn->close();
    ?>

</body>
</html>
