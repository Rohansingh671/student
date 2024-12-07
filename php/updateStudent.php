<?php

require_once 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_GET['id'])) {
        echo "Student ID is missing.";
        exit;
    } else {
        $id = $_GET['id'];
    }

    // Required fields validation
    if (
        isset($_POST['academic_year']) && isset($_POST['admission_number']) && isset($_POST['admission_date']) &&
        isset($_POST['roll_number']) && isset($_POST['status']) && isset($_POST['first_name']) &&
        isset($_POST['last_name']) && isset($_POST['class']) && isset($_POST['section']) &&
        isset($_POST['gender']) && isset($_POST['dob']) &&
        isset($_POST['current_addressOfStudent']) && isset($_POST['permanent_addressOfStudent']) &&
        isset($_POST['districtOfStudent']) && isset($_POST['provinceOfStudent']) &&
        isset($_POST['previousSchoolName']) && isset($_POST['previousSchoolAddress']) &&
        isset($_POST['ifscNumber']) && isset($_POST['feesGroup'])
    ) {

        // Validate feesGroup to make sure it's not empty
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
        $transportationRoute = $_POST['transportationRoute'] ?? "";
        $vehicleNumber = $_POST['vehicleNumber'] ?? "";
        $pickUpPoint = $_POST['pickUpPoint'] ?? "";
        $hostel = $_POST['hostel'] ?? "";
        $hostelRoomNumber = $_POST['hostelRoomNumber'] ?? "";
        $allergiesOfStudent = $_POST['allergiesOfStudent'] ?? "";
        $medicationOfStudent = $_POST['medicationOfStudent'] ?? "";
        $blood_group = $_POST['blood_group'] ?? "";
        $caste = $_POST['caste'] ?? "";
        $house = $_POST['house'] ?? "";
        $religion = $_POST['religion'] ?? "";
        $mother_tongue = $_POST['mother_tongue'] ?? "";
        $languages_known = $_POST['languages_known'] ?? "";
        $father_occupation = $_POST['father_occupation'] ?? "";
        $mother_occupation = $_POST['mother_occupation'] ?? "";
        $guardian_occupation = $_POST['guardian_occupation'] ?? "";
        $guardian_relation = $_POST['guardian_relation'] ?? "";
        $guardian_address = $_POST['guardian_address'] ?? "";
        $otherInfo = $_POST['otherInfo'] ?? "";
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

    // Fetch existing data
    $stmt = $mysqli->prepare("SELECT imageOfStudent, imageOfFather, imageOfMother, imageOfGuardian, documentOfBirthCertificate, documentOfTransferCertificate FROM `addstudent` WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($existingImageOfStudent, $existingImageOfFather, $existingImageOfMother, $existingImageOfGuardian, $existingBirthCertificate, $existingTransferCertificate);
    $stmt->fetch();
    $stmt->close();

    // Function to handle image uploads
    function uploadImage($file, $folder, $maxFileSize)
    {
        if ($file['size'] > $maxFileSize) {
            echo "File is too large. Maximum file size is " . ($maxFileSize / (1024 * 1024)) . " MB.";
            return false;
        }
        $fileType = mime_content_type($file["tmp_name"]);
        $fileExtension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        if ($fileType !== 'image/jpeg' || !in_array($fileExtension, ['jpg', 'jpeg'])) {
            echo "Only JPG images are allowed.";
            return false;
        }
        $fileName = basename($file["name"]);
        $target_file = $folder . uniqid() . '_' . $fileName;
        return move_uploaded_file($file["tmp_name"], $target_file) ? substr($target_file, 3) : false;
    }

    // Image folder and settings
    $image_folder = '../studentDocuments/profilePictures/';
    if (!file_exists($image_folder)) mkdir($image_folder, 0755, true);
    $maxFileSize = 4 * 1024 * 1024; // 4MB limit

    // Upload images or preserve existing ones
    $imageOfStudent = !empty($_FILES["image"]["name"]) ? uploadImage($_FILES["image"], $image_folder, $maxFileSize) : $existingImageOfStudent;
    $imageOfFather = !empty($_FILES["father_image"]["name"]) ? uploadImage($_FILES["father_image"], $image_folder, $maxFileSize) : $existingImageOfFather;
    $imageOfMother = !empty($_FILES["mother_image"]["name"]) ? uploadImage($_FILES["mother_image"], $image_folder, $maxFileSize) : $existingImageOfMother;
    $imageOfGuardian = !empty($_FILES["guardian_image"]["name"]) ? uploadImage($_FILES["guardian_image"], $image_folder, $maxFileSize) : $existingImageOfGuardian;
    $birthCertificate = !empty($_FILES["birthCertificate"]["name"]) ? uploadImage($_FILES["birthCertificate"], $image_folder, $maxFileSize) : $existingBirthCertificate;
    $transferCertificate = !empty($_FILES["transferCertificate"]["name"]) ? uploadImage($_FILES["transferCertificate"], $image_folder, $maxFileSize) : $existingTransferCertificate;

    // Prepare SQL update statement
    // Prepared SQL statement for updating student details
$stmt = $mysqli->prepare("UPDATE `addstudent` SET
`imageOfStudent` = ?, `academicYear` = ?, `admissionNumber` = ?, `admissionDate` = ?, 
`rollNumber` = ?, `studentStatus` = ?, `fnameOfStudent` = ?, `lnameOfStudent` = ?, 
`class` = ?, `section` = ?, `gender` = ?, `dateOfBirth` = ?, 
`bloodGroup` = ?, `house` = ?, `religion` = ?, `feesGroup` = ?, 
`caste` = ?, `primaryContact` = ?, `emailOfstudent` = ?, `motherTongue` = ?, 
`languageKnown` = ?, `imageOfFather` = ?, `fatherName` = ?, 
`emailOfFather` = ?, `fatherContact` = ?, `fatherProfession` = ?, 
`imageOfMother` = ?, `motherName` = ?, `emailOfMother` = ?, 
`motherContact` = ?, `motherProfession` = ?, `guardianName` = ?, 
`guardianRelation` = ?, `guardianContact` = ?, `guardianEmail` = ?, 
`guardianOccupation` = ?, `guardianAddress` = ?, `imageOfGuardian` = ?, 
`currentAddressOfStudent` = ?, `permanentAddressOfStudent` = ?, 
`districtOfStudent` = ?, `provinceOfStudent` = ?, `transportRoute` = ?, 
`vehicleNumber` = ?, `pickUpPoint` = ?, `hostel` = ?, 
`hostelRoomNumber` = ?, `documentOfBirthCertificate` = ?, 
`documentOfTransferCertificate` = ?, `allergiesOfStudent` = ?, 
`medicationOfStudent` = ?, `previousSchoolName` = ?, 
`previousSchoolAddress` = ?, `bankName` = ?, `branchOfBank` = ?, 
`ifscNumber` = ?, `otherInfo` = ? 
WHERE `id` = ?");

// Bind parameters
$stmt->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
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
$otherInfo,
$id // Bind the ID for the WHERE clause
);

// Execute the statement
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: ../students.php");
} else {
echo "Record update failed: " . $stmt->error;
}

// Close the prepared statement
$stmt->close();
$mysqli->close();
}