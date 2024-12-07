<?php

require_once 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Required fields validation
    if (
        !empty($_POST['academic_year']) && !empty($_POST['admission_number']) && !empty($_POST['admission_date']) &&
        !empty($_POST['roll_number']) && !empty($_POST['status']) && !empty($_POST['first_name']) &&
        !empty($_POST['last_name']) && !empty($_POST['class']) && !empty($_POST['section']) &&
        !empty($_POST['gender']) && !empty($_POST['dob']) &&
        !empty($_POST['current_addressOfStudent']) && !empty($_POST['permanent_addressOfStudent']) &&
        !empty($_POST['districtOfStudent']) && !empty($_POST['provinceOfStudent']) &&
        !empty($_POST['previousSchoolName']) && !empty($_POST['previousSchoolAddress']) &&
        !empty($_POST['ifscNumber']) && !empty($_POST['feesGroup'])
    ) {
        
        if (isset($_POST['feesGroup']) && is_array($_POST['feesGroup'])) {
            $feesGroups = $_POST['feesGroup'];
            $feeGroupAll = implode(", ", $feesGroups);
        } else {
            echo "No group selected.";
            exit;
        }
        // Basic validations for name fields
        if (
            !preg_match("/^[a-zA-Z\s'-]+$/", $_POST['first_name']) ||
            !preg_match("/^[a-zA-Z\s'-]+$/", $_POST['last_name']) ||
            !preg_match("/^[a-zA-Z\s'-]+$/", $_POST['previousSchoolName'])
        ) {
            echo "Only letters, spaces, hyphens, and apostrophes are allowed in First name, Last name, and other name fields.";
            exit;
        } else {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];

            // Validate father, mother, and guardian names
            $father_name = !empty($_POST['father_name']) && preg_match("/^[a-zA-Z\s'-]+$/", $_POST['father_name']) ? $_POST['father_name'] : null;
            $mother_name = !empty($_POST['mother_name']) && preg_match("/^[a-zA-Z\s'-]+$/", $_POST['mother_name']) ? $_POST['mother_name'] : null;
            $guardian_name = !empty($_POST['guardian_name']) && preg_match("/^[a-zA-Z\s'-]+$/", $_POST['guardian_name']) ? $_POST['guardian_name'] : null;

            $previousSchoolName = $_POST['previousSchoolName'];
            $bankName = !empty($_POST['bankName']) && preg_match("/^[a-zA-Z\s'-]+$/", $_POST['bankName']) ? $_POST['bankName'] : null;
            $branchOfBank = !empty($_POST['branchOfBank']) && preg_match("/^[a-zA-Z\s'-]+$/", $_POST['branchOfBank']) ? $_POST['branchOfBank'] : null;
        }

        // IFSC Number validation - set to NULL if empty or invalid
        if (empty($_POST['ifscNumber']) || !preg_match("/^[0-9]+$/", $_POST['ifscNumber'])) {
            $ifscNumber = null;
        } else {
            $ifscNumber = $_POST['ifscNumber'];
        }

        // Contact number validation - set to NULL if empty or invalid
        $primary_contact = (!empty($_POST['primary_contact']) && preg_match("/^\d{10}$/", $_POST['primary_contact'])) ? $_POST['primary_contact'] : null;
        $father_contact = (!empty($_POST['father_contact']) && preg_match("/^\d{10}$/", $_POST['father_contact'])) ? $_POST['father_contact'] : null;
        $mother_contact = (!empty($_POST['mother_contact']) && preg_match("/^\d{10}$/", $_POST['mother_contact'])) ? $_POST['mother_contact'] : null;
        $guardian_contact = (!empty($_POST['guardian_contact']) && preg_match("/^\d{10}$/", $_POST['guardian_contact'])) ? $_POST['guardian_contact'] : null;

        // Check if any of the contact numbers provided were invalid
        if (
            ($_POST['primary_contact'] && !$primary_contact) ||
            ($_POST['father_contact'] && !$father_contact) ||
            ($_POST['mother_contact'] && !$mother_contact) ||
            ($_POST['guardian_contact'] && !$guardian_contact)
        ) {
            echo "All contact numbers must be exactly 10 digits if provided.";
            exit;
        }
        // Assigning basic values to variables
        $academic_year = $_POST['academic_year'];
        $admission_number = $_POST['admission_number'];
        $admission_date = $_POST['admission_date'];
        $roll_number = $_POST['roll_number'];
        $status = $_POST['status'];
        $class = $_POST['class'];
        $section = $_POST['section'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $current_addressOfStudent = $_POST['current_addressOfStudent'];
        $permanent_addressOfStudent = $_POST['permanent_addressOfStudent'];
        $districtOfStudent = $_POST['districtOfStudent'];
        $provinceOfStudent = $_POST['provinceOfStudent'];
        $previousSchoolAddress = $_POST['previousSchoolAddress'];
        $feesGroup = $_POST['feesGroup'];

        // Email validation for optional fields
        $email = isset($_POST['email']) &&
            filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : "";
        $fatherEmail = isset($_POST['father_email']) &&
            filter_var($_POST['father_email'], FILTER_VALIDATE_EMAIL) ? $_POST['father_email'] : "";
        $motherEmail = isset($_POST['mother_email']) &&
            filter_var($_POST['mother_email'], FILTER_VALIDATE_EMAIL) ? $_POST['mother_email'] : "";
        $guardianEmail = isset($_POST['guardian_email']) &&
            filter_var($_POST['guardian_email'], FILTER_VALIDATE_EMAIL) ? $_POST['guardian_email'] : "";

        // Optional fields handling
        $transportationRoute = !empty($_POST['transportationRoute']) ? $_POST['transportationRoute'] : null;
        $vehicleNumber = !empty($_POST['vehicleNumber']) ? $_POST['vehicleNumber'] : null;
        $pickUpPoint = !empty($_POST['pickUpPoint']) ? $_POST['pickUpPoint'] : null;
        $hostel = !empty($_POST['hostel']) ? $_POST['hostel'] : null;
        $hostelRoomNumber = !empty($_POST['hostelRoomNumber']) ? $_POST['hostelRoomNumber'] : null;
        $allergiesOfStudent = !empty($_POST['allergiesOfStudent']) ? $_POST['allergiesOfStudent'] : null;
        $medicationOfStudent = !empty($_POST['medicationOfStudent']) ? $_POST['medicationOfStudent'] : null;
        $blood_group = !empty($_POST['blood_group']) ? $_POST['blood_group'] : null;
        $caste = !empty($_POST['caste']) ? $_POST['caste'] : null;
        $house = !empty($_POST['house']) ? $_POST['house'] : null;
        $religion = !empty($_POST['religion']) ? $_POST['religion'] : null;
        $mother_tongue = !empty($_POST['mother_tongue']) ? $_POST['mother_tongue'] : null;
        $languages_known = !empty($_POST['languages_known']) ? $_POST['languages_known'] : null;
        $father_occupation = !empty($_POST['father_occupation']) ? $_POST['father_occupation'] : null;
        $mother_occupation = !empty($_POST['mother_occupation']) ? $_POST['mother_occupation'] : null;
        $guardian_occupation = !empty($_POST['guardian_occupation']) ? $_POST['guardian_occupation'] : null;
        $guardian_relation = !empty($_POST['guardian_relation']) ? $_POST['guardian_relation'] : null;
        $guardian_address = !empty($_POST['guardian_address']) ? $_POST['guardian_address'] : null;
        $otherInfo = !empty($_POST['otherInfo']) ? $_POST['otherInfo'] : null;
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

    // Prepared SQL statement for student details
    $stmt = $mysqli->prepare("INSERT INTO `addstudent`(`ID`, `imageOfStudent`, `academicYear`, 
    `admissionNumber`, `admissionDate`, `rollNumber`, `studentStatus`, `fnameOfStudent`, 
    `lnameOfStudent`, `class`, `section`, `gender`, `dateOfBirth`, `bloodGroup`, `house`, 
    `religion`, `feesGroup`, `caste`, `primaryContact`, `emailOfstudent`, `motherTongue`, 
    `languageKnown`, `imageOfFather`, `fatherName`, `emailOfFather`, `fatherContact`, 
    `fatherProfession`, `imageOfMother`, `motherName`, `emailOfMother`, `motherContact`, 
    `motherProfession`, `guardianName`, `guardianRelation`, `guardianContact`, 
    `guardianEmail`, `guardianOccupation`, `guardianAddress`, `imageOfGuardian`, `currentAddressOfStudent`, 
    `permanentAddressOfStudent`, `districtOfStudent`, `provinceOfStudent`, `transportRoute`, `vehicleNumber`, `pickUpPoint`, `hostel`, `hostelRoomNumber`, 
    `documentOfBirthCertificate`, `documentOfTransferCertificate`, `allergiesOfStudent`, 
    `medicationOfStudent`, `previousSchoolName`, `previousSchoolAddress`, `bankName`, `branchOfBank`, `ifscNumber`, `otherInfo`) 
    VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        echo "Error in SQL statement preparation: " . $mysqli->error;
        exit;
    }

    // Handle image uploads with validation for JPG format
    function uploadImage($file, $folder, $maxFileSize)
    {
        // Check file size
        if ($file['size'] > $maxFileSize) {
            echo "File is too large. Maximum file size is " . ($maxFileSize / (1024 * 1024)) . " MB.";
            return null;
        }

        // Validate MIME type and extension
        $fileType = mime_content_type($file["tmp_name"]);
        $fileExtension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

        if ($fileType !== 'image/jpeg' || $fileExtension !== 'jpg') {
            echo "Only JPG images are allowed.";
            return null;
        }

        // Proceed with uploading the file
        $fileName = basename($file["name"]);
        $target_file = $folder . uniqid() . '_' . $fileName;

        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return substr($target_file, 3);  // Remove first 3 chars (../) for DB storage
        }

        return null;
    }

    // Image folder and size settings
    $image_folder = '../studentDocuments/profilePictures/';
    if (!file_exists($image_folder)) {
        mkdir($image_folder, 0755, true);
    }
    $maxFileSize = 4 * 1024 * 1024; // 4MB limit

    // Validate and upload images
    $imageOfStudent = !empty($_FILES["image"]["name"]) ? uploadImage($_FILES["image"], $image_folder, $maxFileSize) : null;
    $imageOfFather = !empty($_FILES["father_image"]["name"]) ? uploadImage($_FILES["father_image"], $image_folder, $maxFileSize) : null;
    $imageOfMother = !empty($_FILES["mother_image"]["name"]) ? uploadImage($_FILES["mother_image"], $image_folder, $maxFileSize) : null;
    $imageOfGuardian = !empty($_FILES["guardian_image"]["name"]) ? uploadImage($_FILES["guardian_image"], $image_folder, $maxFileSize) : null;
    $birthCertificate = !empty($_FILES["birthCertificate"]["name"]) ? uploadImage($_FILES["birthCertificate"], $image_folder, $maxFileSize) : null;
    $transferCertificate = !empty($_FILES["transferCertificate"]["name"]) ? uploadImage($_FILES["transferCertificate"], $image_folder, $maxFileSize) : null;

    // Execute the prepared statement
    if ($stmt->bind_param(
        "sssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
        $imageOfStudent,
        $academic_year,
        $admission_number,
        $admission_date,
        $roll_number,
        $status,
        $first_name,
        $last_name,
        $class,
        $section,
        $gender,
        $dob,
        $blood_group,
        $house,
        $religion,
        $feeGroupAll,
        $caste,
        $primary_contact,
        $email,
        $mother_tongue,
        $languages_known,
        $imageOfFather,
        $father_name,
        $fatherEmail,
        $father_contact,
        $father_occupation,
        $imageOfMother,
        $mother_name,
        $motherEmail,
        $mother_contact,
        $mother_occupation,
        $guardian_name,
        $guardian_relation,
        $guardian_contact,
        $guardianEmail,
        $guardian_occupation,
        $guardian_address,
        $imageOfGuardian,
        $current_addressOfStudent,
        $permanent_addressOfStudent,
        $districtOfStudent,
        $provinceOfStudent,
        $transportationRoute,
        $vehicleNumber,
        $pickUpPoint,
        $hostel,
        $hostelRoomNumber,
        $birthCertificate,
        $transferCertificate,
        $allergiesOfStudent,
        $medicationOfStudent,
        $previousSchoolName,
        $previousSchoolAddress,
        $bankName,
        $branchOfBank,
        $ifscNumber,
        $otherInfo
    )) {
        $stmt->execute();
        $_SESSION['success_message'] = "Record inserted successfully.";

        // Redirect to the destination page
        header("Location: ../students.php");
        exit; // Make sure to exit after redirect
    } else {
        echo "Error binding parameters: " . $stmt->error;
    }

    // Closing the statement and connection
    $stmt->close();
    $mysqli->close();
}
