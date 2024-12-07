<?php
require_once 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['smsEmail'];
    $username = $_POST['smsUsername'];
    $password = $_POST['smsPassword'];
    $confirmPassword = $_POST['smsConfirmPassword'];
    $role = "3";

    $emailPattern = "/^[\w\-\.]+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
    $usernamePattern = "/^[a-zA-Z0-9]{5,15}$/";

    $errors = [];

    if (!preg_match($emailPattern, $email)) {
        echo "Invalid email format.";
        exit;
    }
    if (!preg_match($usernamePattern, $username)) {
        echo "Username must be between 5 and 15 characters and contain only letters and numbers.";
        exit;
    }
    if (strlen($password) < 8 || strlen($password) > 20) {
        echo "Password must be between 8 and 20 characters.";
        exit;
    }
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit;
    }

    if (empty($errors)) {
        $mysqli = db_connect();
        if ($mysqli) {

            $stmt = $mysqli->prepare("SELECT userEmail, userUsername FROM smslogindata WHERE userEmail = ? OR userUsername = ?");
            if ($stmt) {
                $stmt->bind_param("ss", $email, $username);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($emailResult, $usernameResult);
                    $stmt->fetch();
                    if ($emailResult === $email) {
                        echo "Email already exists.";
                    }
                    if ($usernameResult === $username) {
                        echo "Username already exists.";
                    }
                } else {
                    $stmt = $mysqli->prepare("INSERT INTO smslogindata(userEmail, userUsername, userPassword, userType, userLastLogin) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)");
                    if ($stmt) {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $stmt->bind_param("ssss", $email, $username, $hashed_password, $role);
                        if ($stmt->execute()) {
                            echo "Data inserted successfully!";
                        } else {
                            echo "Error inserting data: " . $stmt->error;
                        }
                    } else {
                        echo "Error preparing statement: " . $mysqli->error;
                    }
                }
            } else {
                echo "Error preparing statement: " . $mysqli->error;
            }
        } else {
            echo "Database connection failed.";
        }
        db_close($mysqli);
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
