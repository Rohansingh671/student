<?php
require_once 'databaseConnection.php';
$mysqli = db_connect();

if ($mysqli) {
    // Initialize default values
    $currentClassName = '';
    $classes = array(); // Array to store all classes

    if (isset($_GET['id'])) {
        // Fetch the current class for the specific student by ID
        $id = $_GET['id'];
        $stmt = $mysqli->prepare("SELECT ID, classID, className, classStatus FROM classdata WHERE ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($ID, $classID, $className, $classStatus);
        if ($stmt->fetch()) {
            $currentClassName = $className;
        }
        $stmt->close();
    } else {
        // Fetch all classes for dropdown options
        $stmt = $mysqli->prepare("SELECT ID, classID, className, classStatus FROM classdata");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($ID, $classID, $className, $classStatus);

        // Populate the $classes array
        while ($stmt->fetch()) {
            $classes[] = array(
                'ID' => $ID,
                'classID' => $classID,
                'className' => $className,
                'classStatus' => $classStatus
            );
        }
        $stmt->close(); // Close the statement after populating the array
    }
} else {
    echo "Database connection failed: " . $mysqli->connect_error;
    exit;
}

db_close($mysqli);