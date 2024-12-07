<?php

require_once 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        echo "Class ID is missing.";
        exit;
    }

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

        // Prepare the SQL statement for updating
        $stmt = $mysqli->prepare("UPDATE `classdata` SET `classID`=?,`className`=?,`classStatus`=? WHERE ID = ?");
        $stmt->bind_param("sssi", $classID, $className, $classStatus, $id);

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
