<?php

require_once 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        echo "Subject ID is missing.";
        exit;
    }

    // Check if required fields are present and not empty
    if (!empty($_POST['subject_id']) && !empty($_POST['name']) && !empty($_POST['code']) && !empty($_POST['type'])) {
        
        // Assign variables after basic sanitization
        $subject_id = htmlspecialchars(trim($_POST['subject_id']));
        $name = htmlspecialchars(trim($_POST['name']));
        $code = htmlspecialchars(trim($_POST['code']));
        $type = htmlspecialchars(trim($_POST['type']));
        
        // Set status as 'Active' if the switch is on, otherwise 'Inactive'
        $status = !empty($_POST['status']) ? htmlspecialchars(trim($_POST['status'])) : 'Inactive';

        // Validate subject ID and subject Name (only letters, numbers, spaces allowed)
        if (
            !preg_match("/^[\p{Devanagari}a-zA-Z0-9\s\(\)]+$/u", $subject_id) ||
            !preg_match("/^[\p{Devanagari}a-zA-Z0-9\s\(\)\-]+$/u", $name)
        ) {
            echo "Subject ID and Name can only contain letters (including Nepali), numbers, spaces, and brackets ().";
            exit;
        }

        // Database connection
        $mysqli = db_connect();
        if (!$mysqli) {
            echo "Database connection failed: " . $mysqli->connect_error;
            exit;
        }

        // Prepare the SQL statement for updating
        $stmt = $mysqli->prepare("UPDATE `addsubject` SET `subject_id`=?,`name`=?,`code`=?,`type`=?,`status`=? WHERE ID = ?");
        $stmt->bind_param("sssssi", $subject_id, $name, $code, $type, $status, $id);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: ../class-subject.php");
        } else {
            echo "Error updating subject: " . $stmt->error;
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
