<?php
    require_once 'databaseConnection.php';

    session_start();
    session_destroy();
    
    if (isset($mysqli)) {
        $mysqli->close();
    }

    header("Location: ../login-2.php");

    exit;
?>