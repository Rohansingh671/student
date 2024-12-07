<?php
require_once 'databaseConnection.php';
$mysqli = db_connect();

// Prepare and execute the statement
$stmt = $mysqli->prepare("
    SELECT `ID`, `teacher_id`, `teacher_image`, `first_name`, `last_name`, `gender`, 
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
    FROM `addteacher`
");

$stmt->execute();
$stmt->store_result();

// Bind results to variables
$stmt->bind_result(
    $id,
    $teacher_id, $teacher_image, $first_name, $last_name, $gender, $email_address, 
    $primary_contact_number, $qualification, $work_experience, $address, 
    $permanent_address, $date_of_birth, $pan_number, $class, $subject, 
    $date_of_joining, $language_known, $status_of_teacher, $marital_status, 
    $blood_group, $father_name, $mother_name, $epf_no, $basic_salary, 
    $contract_type, $date_of_leaving, $work_shift, $work_location, 
    $medical_leaves, $casual_leaves, $maternity_leaves, $sick_leaves, 
    $account_name, $account_number, $ifsc_code, $bank_name, $branch_name, 
    $route, $vehicle_number, $pickup_point, $hostel, $room_number, $facebook, 
    $instagram, $linkedin, $twitter_url, $youtube, $resume, $joining_letter, 
    $previous_school_name, $previous_school_address, 
    $previous_school_contact_number, $other_info
);

// Create an empty array to store all rows
$teachers = array();

// Fetch data row by row
while ($stmt->fetch()) {
    $teacher = array(
        'id' => $id,
        'teacher_id' => $teacher_id,
        'teacher_image' => $teacher_image,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'gender' => $gender,
        'email_address' => $email_address,
        'primary_contact_number' => $primary_contact_number,
        'qualification' => $qualification,
        'work_experience' => $work_experience,
        'address' => $address,
        'permanent_address' => $permanent_address,
        'date_of_birth' => $date_of_birth,
        'pan_number' => $pan_number,
        'class' => $class,
        'subject' => $subject,
        'date_of_joining' => $date_of_joining,
        'language_known' => $language_known,
        'status_of_teacher' => $status_of_teacher,
        'marital_status' => $marital_status,
        'blood_group' => $blood_group,
        'father_name' => $father_name,
        'mother_name' => $mother_name,
        'epf_no' => $epf_no,
        'basic_salary' => $basic_salary,
        'contract_type' => $contract_type,
        'date_of_leaving' => $date_of_leaving,
        'work_shift' => $work_shift,
        'work_location' => $work_location,
        'medical_leaves' => $medical_leaves,
        'casual_leaves' => $casual_leaves,
        'maternity_leaves' => $maternity_leaves,
        'sick_leaves' => $sick_leaves,
        'account_name' => $account_name,
        'account_number' => $account_number,
        'ifsc_code' => $ifsc_code,
        'bank_name' => $bank_name,
        'branch_name' => $branch_name,
        'route' => $route,
        'vehicle_number' => $vehicle_number,
        'pickup_point' => $pickup_point,
        'hostel' => $hostel,
        'room_number' => $room_number,
        'facebook' => $facebook,
        'instagram' => $instagram,
        'linkedin' => $linkedin,
        'twitter_url' => $twitter_url,
        'youtube' => $youtube,
        'resume' => $resume,
        'joining_letter' => $joining_letter,
        'previous_school_name' => $previous_school_name,
        'previous_school_address' => $previous_school_address,
        'previous_school_contact_number' => $previous_school_contact_number,
        'other_info' => $other_info
    );

    // Add the teacher array to the $teachers array
    $teachers[] = $teacher;
}

$stmt->close();
db_close($mysqli);
?>
