<?php

require_once 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if required fields are present and not empty
    if (!empty($_POST['subject_id']) && !empty($_POST['name']) && !empty($_POST['code']) && !empty($_POST['type'])) {
        
        // Assign variables after basic sanitization
        $subject_id = htmlspecialchars(trim($_POST['subject_id']));
        $name = htmlspecialchars(trim($_POST['name']));
        $code = htmlspecialchars(trim($_POST['code']));
        $type = htmlspecialchars(trim($_POST['type']));
        
        // Set status as 'Active' if the switch is on, otherwise 'Inactive'
        $status = !empty($_POST['status']) ? htmlspecialchars(trim($_POST['status'])) : 'Inactive';

        // Validate Subject ID and Name (only letters, numbers, spaces allowed)
        if (!preg_match("/^[a-zA-Z0-9\s]+$/", $subject_id) || !preg_match("/^[a-zA-Z0-9\s]+$/", $name)) {
            echo "Subject ID and Name can only contain letters, numbers, and spaces.";
            exit;
        }

        // Validate Code (only numbers allowed)
        if (!is_numeric($code)) {
            echo "Code must be a numeric value.";
            exit;
        }

        // Database connection
        $mysqli = db_connect();
        if (!$mysqli) {
            echo "Database connection failed: " . $mysqli->connect_error;
            exit;
        }

        // Prepare the SQL statement with new fields
        $stmt = $mysqli->prepare("INSERT INTO `addsubject` (`ID`, `subject_id`, `name`, `code`, `type`, `status`) VALUES (NULL, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            echo "Error preparing statement: " . $mysqli->error;
            exit;
        }

        // Bind parameters and execute statement
        $stmt->bind_param("sssss", $subject_id, $name, $code, $type, $status);
        if ($stmt->execute()) {
            header("Location: ../class-subject.php");
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
