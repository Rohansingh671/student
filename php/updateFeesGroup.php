<?php

require_once 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        echo "Fees Group ID is missing.";
        exit;
    }

    // Check if required fields are present and not empty
    if (!empty($_POST['feesGroupID']) && !empty($_POST['feesGroup']) && !empty($_POST['feesGroupAmount']) && !empty($_POST['remark'])) {
        
        // Assign variables after basic sanitization
        $feesGroupID = htmlspecialchars(trim($_POST['feesGroupID']));
        $feesGroup = htmlspecialchars(trim($_POST['feesGroup']));
        $feesGroupAmount = htmlspecialchars(trim($_POST['feesGroupAmount']));
        $remark = htmlspecialchars(trim($_POST['remark']));
        
        // Set classStatus as 'Active' if the switch is on, otherwise 'Inactive'
        $feesGroupStatus = !empty($_POST['feesGroupStatus']) ? htmlspecialchars(trim($_POST['feesGroupStatus'])) : 'Inactive';

        // Validate Class ID and Class Name (only letters, numbers, spaces allowed)
        if (!preg_match("/^[a-zA-Z0-9\s]+$/", $feesGroupID) || !preg_match("/^[a-zA-Z0-9\s]+$/", $feesGroup)) {
            echo "feesGroup ID and feesGroup Name can only contain letters, numbers, and spaces.";
            exit;
        }


        // Database connection
        $mysqli = db_connect();
        if (!$mysqli) {
            echo "Database connection failed: " . $mysqli->connect_error;
            exit;
        }

        // Prepare the SQL statement for updating
        $stmt = $mysqli->prepare("UPDATE `addfeesgroup` SET `feesGroupID`=?,`feesGroup`=?,`feesGroupAmount`=?,`remark`=?, `feesGroupStatus`=? WHERE ID = ?");
        $stmt->bind_param("sssssi", $feesGroupID, $feesGroup, $feesGroupAmount, $remark, $feesGroupStatus, $id);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: ../fees-group.php");
        } else {
            echo "Error updating feesGroup: " . $stmt->error;
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
