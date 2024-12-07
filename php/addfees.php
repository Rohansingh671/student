<?php
    require_once 'databaseConnection.php';

    $mysqli = db_connect();

    if($mysqli){
        if(isset($_POST['studentID']) && isset($_POST['nowPaying'])){
            $studentID = $_POST['studentID'];
            $nowPaying = $_POST['nowPaying'];
            
            $stmt = $mysqli->prepare("INSERT INTO `feescollection`(`ID`, `StudentID`, `AmountPaid`, `PaidDateTime`) VALUES (NULL, ?, ?, NOW())");
            $stmt->bind_param("is", $studentID, $nowPaying);
            $stmt->execute();
            if($stmt->affected_rows == 1){
                header("Location: ../fees-master.php");
            }
            else{
                echo "Failed to add fees";
            }   

            $stmt->close();
        }
        else{
            echo "Invalid parameters";
        }
    }
    else{
        echo "Connection failed";
    }
?>