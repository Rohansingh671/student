<?php
require_once 'databaseConnection.php';

if (isset($_GET['classID'])) {
    $classID = $_GET['classID'];

    $mysqli = db_connect();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT * FROM `classdata` WHERE `classID` = ?");
        $stmt->bind_param("s", $classID);
        $stmt->execute();
        $result = $stmt->get_result();
        $classData = $result->fetch_assoc();

        echo json_encode($classData); // Send data as JSON
        $stmt->close();
        $mysqli->close();
    }
}
?>
