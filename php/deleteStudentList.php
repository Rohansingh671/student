<?php
require_once 'databaseConnection.php';

$sid = $_GET['id'];

// Database connection
$mysqli = db_connect();
if (!$mysqli) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Step 1: Delete records from feescollection for this student
$stmtFees = $mysqli->prepare("DELETE FROM `feescollection` WHERE `StudentID` = ?");
$stmtFees->bind_param("i", $sid);
$stmtFees->execute();
$stmtFees->close();

// Step 2: Delete the student record
$stmt = $mysqli->prepare("DELETE FROM `addstudent` WHERE `ID` = ?");
if (!$stmt) {
    die("Error preparing statement: " . $mysqli->error);
}

$stmt->bind_param("i", $sid);
if ($stmt->execute()) {
    echo '<meta http-equiv="refresh" content="0; url=/student/students.php" />';
} else {
    echo "Failed to Delete Record";
}

// Close the statement and database connection
$stmt->close();
db_close($mysqli);

?>
