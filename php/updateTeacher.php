<?php
require_once 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_GET['id'])) {
        echo "Teacher ID is required.";
        exit;
    } else {
        $id = $_GET['id'];
    }

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

        // Retrieve existing file paths from the database
        $teacher_id = $_POST['teacher_id'];
        $mysqli = db_connect();
        if (!$mysqli) {
            echo "Database connection failed: " . $mysqli->connect_error;
            exit;
        }

        $query = "SELECT teacher_image, resume, joining_letter FROM addTeacher WHERE teacher_id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('s', $teacher_id);
        $stmt->execute();
        $stmt->bind_result($existing_image, $existing_resume, $existing_letter);
        $stmt->fetch();
        $stmt->close();

        // Image upload validation and processing
        if ($_FILES['teacher_image']['error'] == 0) {
            $target_dir = "uploads/teacher_images/";
            if (!is_dir($target_dir)) mkdir($target_dir, 0755, true);
            $teacher_image = basename($_FILES["teacher_image"]["name"]);
            $target_file = $target_dir . $teacher_image;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
                echo "Only JPG, JPEG, and PNG files are allowed for teacher image.";
                exit;
            }
            if (!move_uploaded_file($_FILES["teacher_image"]["tmp_name"], $target_file)) {
                echo "Error uploading the teacher image.";
                exit;
            }
        } else {
            $teacher_image = $existing_image;
        }

        // Resume upload validation and processing
        if ($_FILES['resume']['error'] == 0) {
            $resume_dir = "uploads/documents/";
            if (!is_dir($resume_dir)) mkdir($resume_dir, 0755, true);
            $resume_file = basename($_FILES["resume"]["name"]);
            $resume_target_file = $resume_dir . $resume_file;
            $resumeFileType = strtolower(pathinfo($resume_target_file, PATHINFO_EXTENSION));
            if ($resumeFileType != 'pdf') {
                echo "Only PDF files are allowed for resume.";
                exit;
            }
            if (!move_uploaded_file($_FILES["resume"]["tmp_name"], $resume_target_file)) {
                echo "Error uploading the resume.";
                exit;
            }
        } else {
            $resume_file = $existing_resume;
        }

        // Joining Letter upload validation and processing
        if ($_FILES['joining_letter']['error'] == 0) {
            $letter_dir = "uploads/documents/";
            if (!is_dir($letter_dir)) mkdir($letter_dir, 0755, true);
            $letter_file = basename($_FILES["joining_letter"]["name"]);
            $letter_target_file = $letter_dir . $letter_file;
            $letterFileType = strtolower(pathinfo($letter_target_file, PATHINFO_EXTENSION));
            if ($letterFileType != 'pdf') {
                echo "Only PDF files are allowed for the joining letter.";
                exit;
            }
            if (!move_uploaded_file($_FILES["joining_letter"]["tmp_name"], $letter_target_file)) {
                echo "Error uploading the joining letter.";
                exit;
            }
        } else {
            $letter_file = $existing_letter;
        }


        // Assigning form values to variables
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

        // Prepare the SQL Update query
        $stmt = $mysqli->prepare("UPDATE `addTeacher` SET `teacher_id`= ?,
            `teacher_image` = ?, `first_name` = ?, `last_name` = ?, `gender` = ?, 
            `email_address` = ?, `primary_contact_number` = ?, `qualification` = ?, 
            `work_experience` = ?, `address` = ?, `permanent_address` = ?, 
            `date_of_birth` = ?, `pan_number` = ?, `class` = ?, `subject` = ?, 
            `date_of_joining` = ?, `language_known` = ?, `status_of_teacher` = ?, 
            `marital_status` = ?, `blood_group` = ?, `father_name` = ?, 
            `mother_name` = ?, `epf_no` = ?, `basic_salary` = ?, 
            `contract_type` = ?, `date_of_leaving` = ?, `work_shift` = ?, 
            `work_location` = ?, `medical_leaves` = ?, `casual_leaves` = ?, 
            `maternity_leaves` = ?, `sick_leaves` = ?, `account_name` = ?, 
            `account_number` = ?, `ifsc_code` = ?, `bank_name` = ?, 
            `branch_name` = ?, `route` = ?, `vehicle_number` = ?, 
            `pickup_point` = ?, `hostel` = ?, `room_number` = ?, 
            `facebook` = ?, `instagram` = ?, `linkedin` = ?, `twitter_url` = ?, 
            `youtube` = ?, `resume` = ?, `joining_letter` = ?, 
            `previous_school_name` = ?, `previous_school_address` = ?, 
            `previous_school_contact_number` = ?, `other_info` = ?
            WHERE `ID` = ?");

        // Bind the parameters
        $stmt->bind_param(
            'ssssssssssssssssssssssssssssssssssssssssssssssssssssss',
            $teacher_id,
            $teacher_image,
            $first_name,
            $last_name,
            $gender,
            $email_address,
            $primary_contact_number,
            $qualification,
            $work_experience,
            $address,
            $permanent_address,
            $date_of_birth,
            $pan_number,
            $class,
            $subject,
            $date_of_joining,
            $language_known,
            $status_of_teacher,
            $marital_status,
            $blood_group,
            $father_name,
            $mother_name,
            $epf_no,
            $basic_salary,
            $contract_type,
            $date_of_leaving,
            $work_shift,
            $work_location,
            $medical_leaves,
            $casual_leaves,
            $maternity_leaves,
            $sick_leaves,
            $account_name,
            $account_number,
            $ifsc_code,
            $bank_name,
            $branch_name,
            $route,
            $vehicle_number,
            $pickup_point,
            $hostel,
            $room_number,
            $facebook,
            $instagram,
            $linkedin,
            $twitter_url,
            $youtube,
            $resume_file,
            $letter_file,
            $previous_school_name,
            $previous_school_address,
            $previous_school_contact_number,
            $other_info,
            $id
        );

        // Execute the update query
        if (!$stmt->execute() || $stmt->affected_rows == 0) {
            echo "Error updating record: " . $stmt->error;
        } else {
            header("Location: ../teachers.php");
        }

        // Close the statement and connection
        $stmt->close();
        $mysqli->close();
    } else {
        echo "Some required fields are missing.";
        exit;
    }
}
