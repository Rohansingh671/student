<?php
require_once 'databaseConnection.php';
$mysqli = db_connect();

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement
    $stmt = $mysqli->prepare("SELECT `ID`, `imageOfStudent`, `academicYear`, `admissionNumber`, `admissionDate`, `rollNumber`, `studentStatus`, 
        `fnameOfStudent`, `lnameOfStudent`, `class`, `section`, `gender`, `dateOfBirth`, `bloodGroup`, `house`, `religion`, `feesGroup`, 
        `caste`, `primaryContact`, `emailOfstudent`, `motherTongue`, `languageKnown`, `imageOfFather`, `fatherName`, 
        `emailOfFather`, `fatherContact`, `fatherProfession`, `imageOfMother`, `motherName`, `emailOfMother`, 
        `motherContact`, `motherProfession`, `guardianName`, `guardianRelation`, `guardianContact`, `guardianEmail`, 
        `guardianOccupation`, `guardianAddress`, `imageOfGuardian`, `currentAddressOfStudent`, `permanentAddressOfStudent`, 
        `districtOfStudent`, `provinceOfStudent`, `transportRoute`, `vehicleNumber`, `pickUpPoint`, `hostel`, `hostelRoomNumber`, 
        `documentOfBirthCertificate`, `documentOfTransferCertificate`, `allergiesOfStudent`, 
        `medicationOfStudent`, `previousSchoolName`, `previousSchoolAddress`, `bankName`, `branchOfBank`, `ifscNumber`, 
        `otherInfo` FROM `addstudent` WHERE ID = ?");

    // Check if the statement was prepared correctly
    if ($stmt === false) {
        echo "Error preparing statement: " . $mysqli->error;
        exit;
    }

    // Bind the 'id' parameter to the query
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();

    // Bind the results to individual variables
    $stmt->bind_result(
        $id, 
        $image_path,
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
        $feesGroup_name,
        $caste,
        $primary_contact,
        $email,
        $mother_tongue,
        $languages_known,
        $father_image_path,
        $father_name,
        $fatherEmail,
        $father_contact,
        $father_occupation,
        $mother_image_path,
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
        $guardian_image_path,
        $current_addressOfStudent,
        $permanent_addressOfStudent,
        $districtOfStudent,
        $provinceOfStudent,
        $transportationRoute,
        $vehicleNumber,
        $pickUpPoint,
        $hostel,
        $hostelRoomNumber,
        $birthCertificate_image_path,
        $transferCertificate_image_path,
        $allergiesOfStudent,
        $medicationOfStudent,
        $previousSchoolName,
        $previousSchoolAddress,
        $bankName,
        $branchOfBank,
        $ifscNumber,
        $otherInfo
    );
    $stmt->fetch();

    $stmt->close();
    db_close($mysqli);

} else {
    echo "Error: ID parameter is missing.";
    exit;
}
?>
