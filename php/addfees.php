<?php
require_once 'databaseConnection.php';

$mysqli = db_connect();

if ($mysqli) {
    if (isset($_POST['studentID']) && isset($_POST['courseFee']) && isset($_POST['nowPaying']) && isset($_POST['pendingAmount']) && isset($_POST['finalPendingAmount']) && isset($_POST['discount']) && isset($_POST['remarks'])) {
        $studentID = $_POST['studentID'];
        $courseFee = ($_POST['courseFee']); 
        $nowPaying = $_POST['nowPaying'];
        $pendingAmount = $_POST['pendingAmount'];
        $finalPendingAmount = $_POST['finalPendingAmount'];
        $discount = $_POST['discount'];
        $remarks = $_POST['remarks'];


        $stmt = $mysqli->prepare("INSERT INTO `feescollection`(`ID`, `StudentID`, `courseFee`, `AmountPaid`, `pendingAmount`, `finalPendingAmount`, `discount`, `remarks` ,`PaidDateTime`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("issssss", $studentID, $courseFee, $nowPaying, $pendingAmount, $finalPendingAmount, $discount, $remarks);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            header("Location: ../fees-master.php");
        } else {
            echo "Failed to add fees.";
        }

        $stmt->close();
    } else {
        echo "Invalid parameters.";
    }
} else {
    echo "Connection failed.";
}
