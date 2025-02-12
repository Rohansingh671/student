<?php
require_once 'databaseConnection.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form inputs
    $email = $_POST['smsEmail'];
    $username = $_POST['smsUsername'];
    $password = $_POST['smsPassword'];
    $confirmPassword = $_POST['smsConfirmPassword'];
    $role = "3";

    // Validation patterns
    $usernamePattern = "/^[a-zA-Z0-9]{5,15}$/";

    // Input validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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

    // Connect to the database
    $mysqli = db_connect();
    if (!$mysqli) {
        echo "Database connection failed.";
        exit;
    }

    // Check if email or username already exists
    $stmt = $mysqli->prepare("SELECT userEmail, userUsername FROM smslogindata WHERE userEmail = ? OR userUsername = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $email, $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($existingEmail, $existingUsername);
            while ($stmt->fetch()) {
                if ($existingEmail === $email) {
                    echo "Email already exists.";
                    exit;
                }
                if ($existingUsername === $username) {
                    echo "Username already exists.";
                    exit;
                }
            }
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $mysqli->error;
        db_close($mysqli);
        exit;
    }

    // Insert new user
    $stmt = $mysqli->prepare("INSERT INTO smslogindata (userEmail, userUsername, userPassword, userType, userLastLogin) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)");
    if ($stmt) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ssss", $email, $username, $hashed_password, $role);

        if ($stmt->execute()) {
            header("Location: ../login-2.php");
            exit;
        } else {
            echo "Error inserting data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $mysqli->error;
    }

    // Close database connection
    db_close($mysqli);
}
?>
