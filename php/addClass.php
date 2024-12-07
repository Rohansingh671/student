<?php

require_once 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if required fields are present and not empty
    if (!empty($_POST['classID']) && !empty($_POST['className'])) {
        
        // Assign variables after basic sanitization
        $classID = htmlspecialchars(trim($_POST['classID']));
        $className = htmlspecialchars(trim($_POST['className']));
        
        // Set classStatus as 'Active' if the switch is on, otherwise 'Inactive'
        $classStatus = !empty($_POST['classStatus']) ? htmlspecialchars(trim($_POST['classStatus'])) : 'Inactive';

        // Validate Class ID and Class Name (only letters, numbers, spaces allowed)
        if (!preg_match("/^[a-zA-Z0-9\s]+$/", $classID) || !preg_match("/^[a-zA-Z0-9\s]+$/", $className)) {
            echo "Class ID and Class Name can only contain letters, numbers, and spaces.";
            exit;
        }

        
        // Database connection
        $mysqli = db_connect();
        if (!$mysqli) {
            echo "Database connection failed: " . $mysqli->connect_error;
            exit;
        }

        // Prepare the SQL statement with new fields
        $stmt = $mysqli->prepare("INSERT INTO `classdata` (`ID`,`classID`, `className`,`classStatus`) VALUES (NULL, ?, ?, ?)");
        if ($stmt === false) {
            echo "Error preparing statement: " . $mysqli->error;
            exit;
        }

        // Bind parameters and execute statement
        $stmt->bind_param("sss", $classID, $className, $classStatus);
        if ($stmt->execute()) {
            header("Location: ../classes.php");
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
