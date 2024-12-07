<?php

require_once 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        echo "Section ID is missing.";
        exit;
    }

    // Check if required fields are present and not empty
    if (!empty($_POST['sectionID']) && !empty($_POST['sectionName'])) {
        
        // Assign variables after basic sanitization
        $sectionID = htmlspecialchars(trim($_POST['sectionID']));
        $sectionName = htmlspecialchars(trim($_POST['sectionName']));
        
        // Set classStatus as 'Active' if the switch is on, otherwise 'Inactive'
        $sectionStatus = !empty($_POST['sectionStatus']) ? htmlspecialchars(trim($_POST['sectionStatus'])) : 'Inactive';

        // Validate Class ID and Class Name (only letters, numbers, spaces allowed)
        if (!preg_match("/^[a-zA-Z0-9\s]+$/", $classID) || !preg_match("/^[a-zA-Z0-9\s]+$/", $className)) {
            echo "Section ID and section Name can only contain letters, numbers, and spaces.";
            exit;
        }


        // Database connection
        $mysqli = db_connect();
        if (!$mysqli) {
            echo "Database connection failed: " . $mysqli->connect_error;
            exit;
        }

        // Prepare the SQL statement for updating
        $stmt = $mysqli->prepare("UPDATE `sectiondata` SET `sectionID`=?,`sectionName`=?,`sectionStatus`=? WHERE ID = ?");
        $stmt->bind_param("ssssi", $classID, $className, $classSection, $classStatus, $id);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: ../classes.php");
        } else {
            echo "Error updating class: " . $stmt->error;
        }

        // Close the statement and the connection
        $stmt->close();

        db_close($mysqli);
    } else {
        echo "Required fields are missing.";
    }
} else {
    echo "Invalid request method.";
}
?>
