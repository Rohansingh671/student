<?php
require_once 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Required fields validation
    if (
        isset($_POST['teacher_id']) && isset($_FILES['teacher_image']) &&
        isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['gender']) &&
        isset($_POST['email_address']) && isset($_POST['primary_contact_number']) &&
        isset($_POST['qualification']) && isset($_POST['work_experience']) &&
        isset($_POST['address']) && isset($_POST['permanent_address']) &&
        isset($_POST['date_of_birth']) && isset($_POST['pan_number']) &&
        isset($_POST['class']) && isset($_POST['subject']) &&
        isset($_POST['date_of_joining']) && isset($_POST['language_known']) && isset($_POST['status_of_teacher']) &&
        isset($_POST['marital_status']) && isset($_POST['blood_group']) &&
        isset($_POST['father_name']) && isset($_POST['mother_name']) &&
        isset($_POST['epf_no']) && isset($_POST['basic_salary']) && isset($_POST['contract_type']) && isset($_POST['date_of_leaving']) &&
        isset($_POST['work_shift']) && isset($_POST['work_location']) &&
        isset($_POST['medical_leaves']) && isset($_POST['casual_leaves']) &&
        isset($_POST['maternity_leaves']) && isset($_POST['sick_leaves']) &&
        isset($_POST['account_name']) && isset($_POST['account_number']) &&
        isset($_POST['ifsc_code']) && isset($_POST['bank_name']) && isset($_POST['branch_name'])
    ) {
        // Basic validations for name fields
        if (
            !preg_match("/^[a-zA-Z\s'-]+$/", $_POST['first_name']) ||
            !preg_match("/^[a-zA-Z\s'-]+$/", $_POST['last_name'])
        ) {
            echo "Only letters, spaces, hyphens, and apostrophes are allowed in name fields.";
            exit;
        } else {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
        }


        // PAN Number validation
        if (!preg_match("/^[A-Za-z0-9]+$/", $_POST['pan_number'])) {
            echo "PAN Number must be alphanumeric.";
            exit;
        } else {
            $pan_number = $_POST['pan_number'];
        }

        // Contact number validation
        if (!preg_match("/^\d{10}$/", $_POST['primary_contact_number'])) {
            echo "Primary Contact number must be exactly 10 digits.";
            exit;
        } else {
            $primary_contact_number = $_POST['primary_contact_number'];
        }

        // Image upload validation and processing
        if ($_FILES['teacher_image']['error'] == 0) {
            $target_dir = "uploads/teacher_images/";

            // Create the directory if it doesn't exist
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }

            $teacher_image = basename($_FILES["teacher_image"]["name"]);
            $target_file = $target_dir . $teacher_image;

            // Validate file type (jpg, jpeg, png only)
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
                echo "Only JPG, JPEG, and PNG files are allowed.";
                exit;
            }

            // Upload the file
            if (!move_uploaded_file($_FILES["teacher_image"]["tmp_name"], $target_file)) {
                echo "Error uploading the image: " . error_get_last()['message'];
                exit;
            }
        } else {
            echo "Teacher image is required.";
            exit;
        }


        // Resume upload validation and processing
        if ($_FILES['resume']['error'] == 0) {
            $resume_dir = "uploads/documents/";

            // Create the directory if it doesn't exist
            if (!is_dir($resume_dir)) {
                mkdir($resume_dir, 0755, true); // Create the directory with appropriate permissions
            }

            $resume_file = basename($_FILES["resume"]["name"]);
            $resume_target_file = $resume_dir . $resume_file;

            // Validate file type (pdf only)
            $resumeFileType = strtolower(pathinfo($resume_target_file, PATHINFO_EXTENSION));
            if ($resumeFileType != 'pdf') {
                echo "Only PDF files are allowed for resume.";
                exit;
            }

            // Upload the file
            if (!move_uploaded_file($_FILES["resume"]["tmp_name"], $resume_target_file)) {
                echo "Error uploading the resume: " . error_get_last()['message']; // Provide detailed error
                exit;
            }
        } else {
            echo "Resume is required.";
            exit;
        }


        // Joining Letter upload validation and processing
        if ($_FILES['joining_letter']['error'] == 0) {
            $letter_dir = "uploads/documents/";

            // Create the directory if it doesn't exist
            if (!is_dir($letter_dir)) {
                mkdir($letter_dir, 0755, true); // Create the directory with appropriate permissions
            }

            $letter_file = basename($_FILES["joining_letter"]["name"]);
            $letter_target_file = $letter_dir . $letter_file;

            // Validate file type (pdf only)
            $letterFileType = strtolower(pathinfo($letter_target_file, PATHINFO_EXTENSION));
            if ($letterFileType != 'pdf') {
                echo "Only PDF files are allowed for the joining letter.";
                exit;
            }

            // Upload the file
            if (!move_uploaded_file($_FILES["joining_letter"]["tmp_name"], $letter_target_file)) {
                echo "Error uploading the joining letter: " . error_get_last()['message']; // Provide detailed error
                exit;
            }
        } else {
            echo "Joining letter is required.";
            exit;
        }


        // Assigning required form values to variables
        $teacher_id = $_POST['teacher_id'];
        $email_address = $_POST['email_address'];
        $gender = $_POST['gender'];
        $qualification = $_POST['qualification'];
        $work_experience = $_POST['work_experience'];
        $address = $_POST['address'];
        $permanent_address = $_POST['permanent_address'];
        $date_of_birth = $_POST['date_of_birth'];
        $class = $_POST['class'];
        $subject = $_POST['subject'];
        $date_of_joining = $_POST['date_of_joining'];
        $language_known = $_POST['language_known'];
        $status_of_teacher = $_POST['status_of_teacher'];
        $marital_status = $_POST['marital_status'];
        $blood_group = $_POST['blood_group'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];

        $epf_no = $_POST['epf_no'];
        $basic_salary = $_POST['basic_salary'];
        $date_of_leaving = $_POST['date_of_leaving'];
        $contract_type = $_POST['contract_type'];
        $work_shift = $_POST['work_shift'];
        $work_location = $_POST['work_location'];

        $medical_leaves = $_POST['medical_leaves'];
        $casual_leaves = $_POST['casual_leaves'];
        $maternity_leaves = $_POST['maternity_leaves'];
        $sick_leaves = $_POST['sick_leaves'];

        $account_name = $_POST['account_name'];
        $account_number = $_POST['account_number'];
        $ifsc_code = $_POST['ifsc_code'];
        $bank_name = $_POST['bank_name'];
        $branch_name = $_POST['branch_name'];

        // Optional Fields Handling
        $route = isset($_POST['route']) ? $_POST['route'] : null;
        $vehicle_number = isset($_POST['vehicle_number']) ? $_POST['vehicle_number'] : null;
        $pickup_point = isset($_POST['pickup_point']) ? $_POST['pickup_point'] : null;

        $hostel = isset($_POST['hostel']) ? $_POST['hostel'] : null;
        $room_number = isset($_POST['room_number']) ? $_POST['room_number'] : null;

        $facebook = isset($_POST['facebook']) ? $_POST['facebook'] : null;
        $instagram = isset($_POST['instagram']) ? $_POST['instagram'] : null;
        $linkedin = isset($_POST['linkedin']) ? $_POST['linkedin'] : null;
        $twitter_url = isset($_POST['twitter_url']) ? $_POST['twitter_url'] : null;
        $youtube = isset($_POST['youtube']) ? $_POST['youtube'] : null;

        $previous_school_name = $_POST['previous_school_name'];
        $previous_school_contact_number = $_POST['previous_school_contact_number'];
        $previous_school_address = $_POST['previous_school_address'];
        $other_info = $_POST['other_info'] ?? "";
    } else {
        echo "Some required fields are missing.";
        exit;
    }

    // Database connection
    $mysqli = db_connect();

    if (!$mysqli) {
        echo "Database connection failed: " . $mysqli->connect_error;
        exit;
    }

    // Prepared SQL statement for teacher details
    $stmt = $mysqli->prepare("INSERT INTO `addTeacher` (
        `ID`, 
        `teacher_id`, 
        `teacher_image`, 
        `first_name`, 
        `last_name`, 
        `gender`, 
        `email_address`, 
        `primary_contact_number`, 
        `qualification`, 
        `work_experience`, 
        `address`, 
        `permanent_address`, 
        `date_of_birth`, 
        `pan_number`, 
        `class`, 
        `subject`, 
        `date_of_joining`, 
        `language_known`, 
        `status_of_teacher`, 
        `marital_status`, 
        `blood_group`, 
        `father_name`, 
        `mother_name`, 
        `epf_no`, 
        `basic_salary`, 
        `contract_type`, 
        `date_of_leaving`, 
        `work_shift`, 
        `work_location`, 
        `medical_leaves`, 
        `casual_leaves`, 
        `maternity_leaves`, 
        `sick_leaves`, 
        `account_name`, 
        `account_number`, 
        `ifsc_code`, 
        `bank_name`, 
        `branch_name`, 
        `route`, 
        `vehicle_number`, 
        `pickup_point`, 
        `hostel`, 
        `room_number`, 
        `facebook`, 
        `instagram`, 
        `linkedin`, 
        `twitter_url`, 
        `youtube`, 
        `resume`, 
        `joining_letter`, 
        `previous_school_name`, 
        `previous_school_address`, 
        `previous_school_contact_number`, 
        `other_info`
    ) VALUES (
        NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )");


    // Adjust binding parameters according to the updated column count
    $stmt->bind_param(
        'sssssssssssssssssssssssssssssssssssssssssssssssssssss',
        $teacher_id,                // s: Assuming teacher_id is a string
        $teacher_image,             // s: String (file path or URL)
        $first_name,                // s: String
        $last_name,                 // s: String
        $gender,                    // s: String
        $email_address,             // s: String
        $primary_contact_number,    // s: String
        $qualification,             // s: String
        $work_experience,           // s: String
        $address,                   // s: String
        $permanent_address,         // s: String
        $date_of_birth,             // s: String (in YYYY-MM-DD format)
        $pan_number,                // s: String
        $class,                     // s: String
        $subject,                   // s: String
        $date_of_joining,           // s: String
        $language_known,            // s: String
        $status_of_teacher,         // s: String
        $marital_status,            // s: String
        $blood_group,               // s: String
        $father_name,               // s: String
        $mother_name,               // s: String
        $epf_no,                    // s: String
        $basic_salary,              // d: Assuming decimal
        $contract_type,             // s: String
        $date_of_leaving,           // s: String (optional; NULL if not applicable)
        $work_shift,                // s: String
        $work_location,             // s: String
        $medical_leaves,            // i: Integer
        $casual_leaves,             // i: Integer
        $maternity_leaves,          // i: Integer
        $sick_leaves,               // i: Integer
        $account_name,              // s: String
        $account_number,            // s: String
        $ifsc_code,                 // s: String
        $bank_name,                 // s: String
        $branch_name,               // s: String
        $route,                     // s: String
        $vehicle_number,            // s: String
        $pickup_point,              // s: String
        $hostel,                    // s: String
        $room_number,               // s: String
        $facebook,                  // s: String (optional; NULL if not applicable)
        $instagram,                 // s: String (optional; NULL if not applicable)
        $linkedin,                  // s: String (optional; NULL if not applicable)
        $twitter_url,               // s: String (optional; NULL if not applicable)
        $youtube,                   // s: String (optional; NULL if not applicable)
        $resume_file,               // s: String
        $letter_file,               // s: String
        $previous_school_name,      // s: String
        $previous_school_address,   // s: String
        $previous_school_contact_number, // s: String
        $other_info                 // s: String (optional; NULL if not applicable)
    );



    if (!$stmt->execute()) {
        echo "Error executing query: " . $stmt->error;
        exit;
    }

    header("Location: ../teachers.php");
    $stmt->close();
    $mysqli->close();
}
