<?php
require_once 'databaseConnection.php';

$sid = $_GET['id'];

// Database connection
$mysqli = db_connect();
if (!$mysqli) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement to delete a fees group by ID
$stmt = $mysqli->prepare("DELETE FROM `addfeesgroup` WHERE `ID` = ?");
if (!$stmt) {
    die("Error preparing statement: " . $mysqli->error);
}

// Bind the parameter and execute the statement
$stmt->bind_param("i", $sid);
if ($stmt->execute()) {
    // Redirect to the fees group page
    header("Location: /student/fees-group.php");
    exit;
} else {
    echo "Failed to Delete Record";
}

// Close the statement and database connection
$stmt->close();
db_close($mysqli);
?>
