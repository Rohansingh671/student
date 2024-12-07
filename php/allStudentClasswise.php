<?php

$mysqli = db_connect();

if ($mysqli) {
    if (isset($_GET['class'])) {
        $stmt = $mysqli->prepare("SELECT admissionNumber, rollNumber, fnameOfStudent, lnameOfStudent, class, section, gender, studentStatus, dateOfBirth FROM addstudent WHERE class = ?");
        $stmt->bind_param("s", $_GET['class']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['admissionNumber']}</td>
                        <td>{$row['rollNumber']}</td>
                        <td>{$row['fnameOfStudent']} {$row['lnameOfStudent']}</td>
                        <td>{$row['class']}</td>
                        <td>{$row['section']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['studentStatus']}</td>
                        <td>{$row['dateOfBirth']}</td>
                        </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No records found</td></tr>";
        }
        
        $stmt->close();
    } else {
        echo "<tr><td colspan='9'>Invalid request</td></tr>";
    }

    $mysqli->close();
} else {
    echo "<tr><td colspan='9'>Database connection error</td></tr>";
}
    