<?php
require_once 'databaseConnection.php';
$mysqli = db_connect();

if ($mysqli) {
    $groups = array();
    $groupselected = array();

    $feegroup = explode(",", $feesGroup_name);
    //print each of the $feegrsoup
    foreach ($feegroup as $value) {

        $value = trim($value);

        $stmt = $mysqli->prepare("SELECT `ID`, `feesGroupID`, `feesGroup`, `feesGroupAmount`, `remark`, `feesGroupStatus` FROM `addfeesgroup` WHERE `feesGroupID` = ?");
        $stmt->bind_param("s", $value);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($ID, $feesGroupID, $feesGroup, $feesGroupAmount, $remark, $feesGroupStatus);
        while ($stmt->fetch()) {
            $groupselected[] = array(
                'ID' => $ID,
                'feesGroupID' => $feesGroupID,
                'feesGroup' => $feesGroup,
                'feesGroupAmount' => $feesGroupAmount,
                'remark' => $remark,
                'feesGroupStatus' => $feesGroupStatus
            );
        }
        $stmt->close();
    }

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
} else {
    echo "Database connection failed: " . $mysqli->connect_error;
    exit;
}

db_close($mysqli);
