<?php
require_once 'databaseConnection.php';
$mysqli = db_connect();

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $mysqli->prepare("
    SELECT `ID`,`teacher_id`, `teacher_image`, `first_name`, `last_name`, `gender`, 
    `email_address`, `primary_contact_number`, `qualification`, `work_experience`, 
    `address`, `permanent_address`, `date_of_birth`, `pan_number`, `class`, 
    `subject`, `date_of_joining`, `language_known`, `status_of_teacher`, 
    `marital_status`, `blood_group`, `father_name`, `mother_name`, `epf_no`, 
    `basic_salary`, `contract_type`, `date_of_leaving`, `work_shift`, 
    `work_location`, `medical_leaves`, `casual_leaves`, `maternity_leaves`, 
    `sick_leaves`, `account_name`, `account_number`, `ifsc_code`, `bank_name`, 
    `branch_name`, `route`, `vehicle_number`, `pickup_point`, `hostel`, 
    `room_number`, `facebook`, `instagram`, `linkedin`, `twitter_url`, `youtube`, 
    `resume`, `joining_letter`, `previous_school_name`, `previous_school_address`, 
    `previous_school_contact_number`, `other_info` 
    FROM `addteacher` WHERE ID = ?
");

    // Check if the statement was prepared correctly
    if ($stmt === false) {
        echo "Error preparing statement: " . $mysqli->error;
        exit;
    }

    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->store_result();

    // Check if any data was found
    if ($stmt->num_rows === 0) {
        echo "No data found for the provided ID.";
        exit;
    }

    // Bind results to variables
    $stmt->bind_result(
        $id,
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
        $subject_name,
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
        $resume,
        $joining_letter,
        $previous_school_name,
        $previous_school_address,
        $previous_school_contact_number,
        $other_info
    );

    // Fetch the result into variables
    $stmt->fetch();

    $stmt->close();
    db_close($mysqli);
} else {
    echo "Error: ID parameter is missing.";
    exit;
}
