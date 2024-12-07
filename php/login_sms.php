<?php
require_once 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['smsEmail'];
    $password = $_POST['smsPassword'];

    // Regular expression for email validation
    $emailPattern = "/^[\w\-\.]+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";

    $errors = [];

    // Validate email format
    if (!preg_match($emailPattern, $email)) {
        echo "Invalid email format.";
        exit;
    }


    // Database connection
    $mysqli = db_connect();
    if ($mysqli) {
        // Prepare SQL query to check if user exists
        $stmt = $mysqli->prepare("SELECT userPassword FROM smslogindata WHERE userEmail = ?");
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                // User exists, now fetch the hashed password
                $stmt->bind_result($hashed_password);
                $stmt->fetch();

                // Verify the password
                if (password_verify($password, $hashed_password)) {
                    echo "Login successful!";
                    session_start();
                    $_SESSION['userEmail'] = $email; // Set user email in session
                    // Redirect to dashboard or home page
                    header("Location: ../index.php"); // Change 'dashboard.php' to your target page
                    exit(); // Make sure to exit after header redirection
                } else {
                    echo "Invalid password.";
                }
            } else {
                echo "No user found with that email address.";
            }
        } else {
            echo "Error preparing statement: " . $mysqli->error;
        }
    } else {
        echo "Database connection failed.";
    }

    db_close($mysqli);
}
