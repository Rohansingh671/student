<?php

require_once 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if required fields are present and not empty
    if (!empty($_POST['feesGroupID']) && !empty($_POST['feesGroup']) && !empty($_POST['feesGroupAmount']) && isset($_POST['remark'])) {
        
        // Assign variables after basic sanitization
        $feesGroupID = htmlspecialchars(trim($_POST['feesGroupID']));
        $feesGroup = htmlspecialchars(trim($_POST['feesGroup']));
        $feesGroupAmount = htmlspecialchars(trim($_POST['feesGroupAmount']));
        $remark = htmlspecialchars(trim($_POST['remark']));
        
        // Set feesGroupStatus as 'Active' if the switch is on, otherwise 'Inactive'
        $feesGroupStatus = !empty($_POST['feesGroupStatus']) ? htmlspecialchars(trim($_POST['feesGroupStatus'])) : 'Inactive';

        // Validate feesGroup (only letters, numbers, spaces allowed)
        if (!preg_match("/^[a-zA-Z0-9\s]+$/", $feesGroup)) {
            echo "Fees Group can only contain letters, numbers, and spaces.";
            exit;
        }

        // Validate feesAmount (only numbers allowed)
        //  if (!is_numeric($feesGroupID)) {
        //      echo "Fees ID must be a numeric value.";
        //      exit;
        //  }

        // Database connection
        $mysqli = db_connect();
        if (!$mysqli) {
            echo "Database connection failed: " . $mysqli->connect_error;
            exit;
        }

        // Prepare the SQL statement with new fields
        $stmt = $mysqli->prepare("INSERT INTO `addfeesgroup` (`ID`, `feesGroupID`, `feesGroup`, `feesGroupAmount`, `remark`, `feesGroupStatus`) VALUES (NULL, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            echo "Error preparing statement: " . $mysqli->error;
            exit;
        }

        // Bind parameters and execute statement
        $stmt->bind_param("sssss", $feesGroupID, $feesGroup, $feesGroupAmount, $remark, $feesGroupStatus);
        if ($stmt->execute()) {
            header("Location: ../fees-group.php");
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
