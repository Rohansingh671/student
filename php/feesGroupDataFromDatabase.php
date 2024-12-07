<?php
require_once 'databaseConnection.php';
$mysqli = db_connect();

if ($mysqli) {
    // Initialize default values
    $currentFeesGroupName = '';
    $groups = array(); // Array to store all fees groups

    if (isset($_GET['id'])) {
        // Fetch the current fees group ID for the specific entry
        $id = $_GET['id'];
        $stmt = $mysqli->prepare("SELECT ID, feesGroupID, feesGroup, feesGroupAmount, remark, feesGroupStatus FROM `addfeesgroup` WHERE `ID` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($ID, $feesGroupID, $feesGroup, $feesGroupAmount, $remark, $feesGroupStatus);
        if ($stmt->fetch()) {
            $currentFeesGroupName = $feesGroup;
        }
        $stmt->close();
    } else {
        // Fetch all fees groups for dropdown options
        $stmt = $mysqli->prepare("SELECT `ID`, `feesGroupID`, `feesGroup`, `feesGroupAmount`, `remark`, `feesGroupStatus` FROM `addfeesgroup`");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($ID, $feesGroupID, $feesGroup, $feesGroupAmount, $remark, $feesGroupStatus);

        // Populate the `$groups` array
        while ($stmt->fetch()) {
            $groups[] = array(
                'ID' => $ID,
                'feesGroupID' => $feesGroupID,
                'feesGroup' => $feesGroup,
                'feesGroupAmount' => $feesGroupAmount,
                'remark' => $remark,
                'feesGroupStatus' => $feesGroupStatus
            );
        }
        $stmt->close(); // Close the statement after populating the array
    }
} else {
    echo "Database connection failed: " . $mysqli->connect_error;
    exit;
}

db_close($mysqli);
