<?php
require_once 'databaseConnection.php';
$mysqli = db_connect();

if ($mysqli) {
    // Initialize default values
    $currentSubjectName = '';
    $subjects = array(); // Array to store all subjects

    if (isset($_GET['id'])) {
        // Fetch the current subject name for the specific entry by ID
        $id = $_GET['id'];
        $stmt = $mysqli->prepare("SELECT  `ID`, `subject_id`, `name`, `code`, `type`, `status` FROM `addsubject` WHERE `ID` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($ID, $subject_id, $name, $code, $type, $status);
        if ($stmt->fetch()) {
            $currentSubjectName = $name;
        }
        $stmt->close();
    } else {
        // Fetch all subjects for dropdown options
        $stmt = $mysqli->prepare("SELECT `ID`, `subject_id`, `name`, `code`, `type`, `status` FROM `addsubject`");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($ID, $subject_id, $name, $code, $type, $status);

        // Populate the `$subjects` array
        while ($stmt->fetch()) {
            $subjects[] = array(
                'ID' => $ID,
                'subject_id' => $subject_id,
                'name' => $name,
                'code' => $code,
                'type' => $type,
                'status' => $status
            );
        }
        $stmt->close(); // Close the statement after populating the array
    }
} else {
    echo "Database connection failed: " . $mysqli->connect_error;
    exit;
}

db_close($mysqli);
