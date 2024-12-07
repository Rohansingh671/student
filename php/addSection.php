<?php

require_once 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if required fields are present and not empty
    if (!empty($_POST['sectionID']) && !empty($_POST['sectionName'])) {
        
        // Assign variables after basic sanitization
        $sectionID = htmlspecialchars(trim($_POST['sectionID']));
        $sectionName = htmlspecialchars(trim($_POST['sectionName']));
        
        // Set classStatus as 'Active' if the switch is on, otherwise 'Inactive'
        $sectionStatus = !empty($_POST['sectionStatus']) ? htmlspecialchars(trim($_POST['sectionStatus'])) : 'Inactive';

        // Validate Class ID and Class Name (only letters, numbers, spaces allowed)
        if (!preg_match("/^[a-zA-Z0-9\s]+$/", $classID) || !preg_match("/^[a-zA-Z0-9\s]+$/", $className)) {
            echo "Section ID and Section Name can only contain letters, numbers, and spaces.";
            exit;
        }

        
        // Database connection
        $mysqli = db_connect();
        if (!$mysqli) {
            echo "Database connection failed: " . $mysqli->connect_error;
            exit;
        }

        // Prepare the SQL statement with new fields
        $stmt = $mysqli->prepare("INSERT INTO `sectiondata` (`ID`,`sectionID`, `sectionName`, `sectionStatus`) VALUES (NULL, ?, ?, ?)");
        if ($stmt === false) {
            echo "Error preparing statement: " . $mysqli->error;
            exit;
        }

        // Bind parameters and execute statement
        $stmt->bind_param("sss", $sectionID, $sectionName, $sectionStatus);
        if ($stmt->execute()) {
            header("Location: ../class-section.php");
        } else {
            echo "Error inserting record: " . $stmt->error;
        }

        // Close statement and database connection
        $stmt->close();
        $mysqli->close();

    } else {
        echo "Required fields are missing.";
    }
} else {
    echo "Invalid request method.";
}
?>
